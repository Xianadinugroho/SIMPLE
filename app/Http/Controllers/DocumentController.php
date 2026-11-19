<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentAccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Helpers\ActivityLogger;

// Endroid QR
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;

class DocumentController extends Controller
{
    // ============ UPLOAD DOKUMEN ============
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'         => 'required|string|max:255',
            'type'          => 'required|in:semester,passport_skills,toeic,tka,ijasah,transkrip_nilai,ukk,pkl',
            'document'      => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'student_id'    => 'required|exists:users,id',
            'semester'      => 'nullable|string',
            'tahun_ajaran'  => 'nullable|string',
            'description'   => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $student = User::find($request->student_id);
        if (!$student || !$student->isSiswa()) {
            return response()->json(['message' => 'User bukan siswa'], 400);
        }

        try {
            DB::beginTransaction();

            // Simpan file dokumen
            $file = $request->file('document');
            $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9.]/', '_', $file->getClientOriginalName());
            $filePath = $file->storeAs('documents', $fileName, 'public');

            // Siapkan folder QR
            $qrFileName = 'qr_' . time() . '.png';
            $qrFolder = storage_path('app/public/qr_codes');

            if (!file_exists($qrFolder)) {
                mkdir($qrFolder, 0777, true);
            }

            // ID dokumen berikutnya
            $documentId = Document::max('id') + 1;

            // QR CODE BERISI URL (untuk scan dari HP)
            $qrContent = config('app.url') . '/doc/' . $documentId;

            $qrCode = new QrCode(
                data: $qrContent,
                encoding: new Encoding('UTF-8'),
                errorCorrectionLevel: ErrorCorrectionLevel::High,
                size: 300,
                margin: 10
            );

            $writer = new PngWriter();
            $result = $writer->write($qrCode);
            $result->saveToFile($qrFolder . '/' . $qrFileName);

            // Simpan dokumen ke database
            $document = Document::create([
                'title'         => $request->title,
                'type'          => $request->type,
                'file_path'     => $filePath,
                'file_name'     => $fileName,
                'file_size'     => $file->getSize(),
                'file_mime'     => $file->getMimeType(),
                'semester'      => $request->semester,
                'tahun_ajaran'  => $request->tahun_ajaran,
                'description'   => $request->description,
                'qr_code_path'  => 'qr_codes/' . $qrFileName,
                'student_id'    => $request->student_id,
                'uploaded_by'   => auth()->id(),
                'status'        => 'pending',
            ]);

            // Set hak akses
            DocumentAccess::create([
                'document_id' => $document->id,
                'user_id'     => $student->id,
                'access_type' => 'view',
            ]);
            DocumentAccess::create([
                'document_id' => $document->id,
                'user_id'     => auth()->id(),
                'access_type' => 'edit',
            ]);

            DB::commit();

            // LOG AKTIVITAS UPLOAD
            ActivityLogger::log(
                'upload',
                'document',
                'Upload: ' . $document->title . ' untuk ' . $student->name
            );

            return response()->json([
                'message'  => 'Dokumen berhasil diupload!',
                'document' => $document->load(['student']),
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Gagal upload: ' . $e->getMessage()
            ], 500);
        }
    }

    // ============ LIST DOKUMEN ============
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Document::with(['student', 'uploader', 'verifier']);

        // Siswa hanya lihat dokumen sendiri
        if ($user->isSiswa()) {
            $query->where('student_id', $user->id);
        }

        // Filter uploaded_by (dari dashboard guru)
        if ($request->filled('uploaded_by')) {
            $query->where('uploaded_by', $request->uploaded_by);
        }

        // ✅ Filter student_id (dari folder siswa di halaman kelas)
        if ($request->filled('student_id')) {
            // Proteksi ekstra: jika yang minta adalah siswa, pastikan hanya folder sendiri
            if ($user->isSiswa() && $request->student_id != $user->id) {
                return response()->json(['message' => 'Akses ditolak'], 403);
            }
            $query->where('student_id', $request->student_id);
        }

        // Filter type & status
        if ($request->filled('type')) $query->where('type', $request->type);
        if ($request->filled('status')) $query->where('status', $request->status);

        // Filter search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhereHas('student', function ($sub) use ($search) {
                      $sub->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('nis', 'LIKE', "%{$search}%");
                  });
            });
        }

        $documents = $query->orderBy('created_at', 'desc')->paginate(15);
        return response()->json($documents);
    }

    // ============ DETAIL DOKUMEN ============
    public function show($id)
    {
        $document = Document::with(['student', 'uploader', 'verifier'])->find($id);
        if (!$document) return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);

        $user = auth()->user();
        
        // ✅ Siswa hanya bisa lihat dokumen sendiri
        if ($user->isSiswa() && $document->student_id != $user->id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        return response()->json($document);
    }

    // ============ PUBLIC SHOW ============
    public function publicShow($id)
    {
        $document = Document::with(['student', 'uploader', 'verifier'])->find($id);
        if (!$document) return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);
        return response()->json($document);
    }

    // ============ VERIFIKASI DOKUMEN ============
    public function verify(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) {
            return response()->json(['message' => 'Hanya Kurikulum yang dapat verifikasi'], 403);
        }

        $validator = Validator::make($request->all(), [
            'status'             => 'required|in:verified,rejected',
            'verification_notes' => 'nullable|string',
        ]);

        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);

        $document = Document::find($id);
        if (!$document) return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);

        $document->update([
            'status'             => $request->status,
            'verified_by'        => $user->id,
            'verified_at'        => now(),
            'verification_notes' => $request->verification_notes,
        ]);

        // LOG AKTIVITAS VERIFIKASI
        ActivityLogger::log(
            'verify',
            'document',
            ucfirst($request->status) . ': ' . $document->title . ' (' . ($document->student->name ?? '-') . ')'
        );

        return response()->json([
            'message'  => 'Dokumen berhasil diverifikasi',
            'document' => $document->load(['student', 'verifier']),
        ]);
    }

    // ============ DOWNLOAD DOKUMEN ============
    public function download($id)
    {
        $document = Document::find($id);
        if (!$document) return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);

        $user = auth()->user();
        
        // ✅ Siswa hanya bisa download dokumen sendiri
        if ($user->isSiswa() && $document->student_id != $user->id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        if (!Storage::disk('public')->exists($document->file_path)) {
            return response()->json(['message' => 'File tidak ditemukan'], 404);
        }

        return Storage::disk('public')->download($document->file_path, $document->file_name);
    }

    // ============ HAPUS DOKUMEN ============
    public function destroy($id)
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) {
            return response()->json(['message' => 'Hanya Kurikulum yang dapat menghapus'], 403);
        }

        $document = Document::find($id);
        if (!$document) return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);

        $docTitle = $document->title;

        if (Storage::disk('public')->exists($document->file_path)) {
            Storage::disk('public')->delete($document->file_path);
        }
        if ($document->qr_code_path && Storage::disk('public')->exists($document->qr_code_path)) {
            Storage::disk('public')->delete($document->qr_code_path);
        }

        $document->delete();

        // LOG AKTIVITAS HAPUS
        ActivityLogger::log('delete', 'document', 'Hapus dokumen: ' . $docTitle);

        return response()->json(['message' => 'Dokumen berhasil dihapus']);
    }

    // ============ LIST SISWA ============
    public function students()
    {
        $students = User::where('role', 'siswa')
            ->select('id', 'name', 'nis', 'kelas')
            ->orderBy('name')
            ->get();
        return response()->json($students);
    }

    // ============ SCAN QR CODE ============
    public function scanQR(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'qr_data' => 'required|string',
        ]);

        if ($validator->fails()) return response()->json(['errors' => $validator->errors()], 422);

        $qrData = json_decode($request->qr_data, true);

        if (!$qrData || !isset($qrData['document_id'])) {
            return response()->json(['message' => 'QR Code tidak valid'], 400);
        }

        $document = Document::with(['student', 'uploader', 'verifier'])
            ->find($qrData['document_id']);

        if (!$document) return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);

        $user = auth()->user();
        if ($user->isSiswa() && $document->student_id != $user->id) {
            return response()->json(['message' => 'Akses ditolak'], 403);
        }

        return response()->json([
            'message'  => 'QR Code valid',
            'document' => $document,
            'qr_info'  => $qrData,
        ]);
    }

    // ============ STATISTIK ============
    public function statistics()
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) return response()->json(['message' => 'Hanya Kurikulum'], 403);

        $stats = [
            'total_documents' => Document::count(),
            'total_students'  => User::where('role', 'siswa')->count(),
            'total_teachers'  => User::where('role', 'guru')->count(),
            'pending_count'   => Document::where('status', 'pending')->count(),
            'verified_count'  => Document::where('status', 'verified')->count(),
            'rejected_count'  => Document::where('status', 'rejected')->count(),
            'by_type' => Document::selectRaw('type, COUNT(*) as total')->groupBy('type')->get(),
            'by_status' => Document::selectRaw('status, COUNT(*) as total')->groupBy('status')->get(),
        ];

        return response()->json($stats);
    }

    // ============ LIST DOKUMEN PENDING ============
    public function pending(Request $request)
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) return response()->json(['message' => 'Hanya Kurikulum'], 403);

        $query = Document::with(['student', 'uploader'])->where('status', 'pending');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'LIKE', "%{$search}%")
                  ->orWhereHas('student', function ($sub) use ($search) {
                      $sub->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('nis', 'LIKE', "%{$search}%");
                  });
            });
        }

        $documents = $query->orderBy('created_at', 'asc')->paginate(15);
        return response()->json($documents);
    }

    // ============ STATISTIK VERIFIKASI ============
    public function verificationStats()
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) return response()->json(['message' => 'Hanya Kurikulum'], 403);

        $stats = [
            'pending_count'  => Document::where('status', 'pending')->count(),
            'verified_today' => Document::where('status', 'verified')->whereDate('verified_at', today())->count(),
            'total_verified' => Document::where('status', 'verified')->count(),
            'total_rejected' => Document::where('status', 'rejected')->count(),
        ];

        return response()->json($stats);
    }

    // ============ EXPORT EXCEL ============
    public function exportExcel()
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) return response()->json(['message' => 'Hanya Kurikulum'], 403);

        // Log aktivitas export
        ActivityLogger::log('export', 'document', 'Export Excel data dokumen');

        return \Maatwebsite\Excel\Facades\Excel::download(
            new \App\Exports\DocumentsExport(),
            'dokumen_akademik_' . date('Y-m-d') . '.xlsx'
        );
    }

    // ============ LIST ACTIVITY LOGS ============
    public function activityLogs(Request $request)
    {
        $user = auth()->user();
        if (!$user->isKurikulum()) return response()->json(['message' => 'Hanya Kurikulum'], 403);

        $query = \App\Models\ActivityLog::with('user')->orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('action', 'LIKE', "%{$search}%")
                  ->orWhere('module', 'LIKE', "%{$search}%")
                  ->orWhere('description', 'LIKE', "%{$search}%")
                  ->orWhereHas('user', function ($sub) use ($search) {
                      $sub->where('name', 'LIKE', "%{$search}%");
                  });
            });
        }

        $logs = $query->paginate(20);
        return response()->json($logs);
    }
}