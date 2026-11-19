<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // ============================================
    // DASHBOARD KURIKULUM
    // ============================================
    public function kurikulum()
    {
        return response()->json([
            'message'         => 'Dashboard Kurikulum',
            'total_documents' => Document::count(),
            'total_students'  => User::where('role', 'siswa')->count(),
            'total_teachers'  => User::where('role', 'guru')->count(),
            'pending_count'   => Document::where('status', 'pending')->count(),
            'verified_count'  => Document::where('status', 'verified')->count(),
            'rejected_count'  => Document::where('status', 'rejected')->count(),
            'by_type' => Document::selectRaw('type, COUNT(*) as total')
                ->groupBy('type')
                ->get(),
            'by_status' => Document::selectRaw('status, COUNT(*) as total')
                ->groupBy('status')
                ->get(),
        ]);
    }

    // ============================================
    // DASHBOARD GURU (Hanya Dokumen Milik Sendiri)
    // ============================================
    public function guru()
    {
        $user = auth()->user();

        // Ambil dokumen milik guru yang sedang login
        $myDocs = Document::where('uploaded_by', $user->id);

        return response()->json([
            'message'         => 'Dashboard Guru',
            'total_uploads'   => (clone $myDocs)->count(),
            'pending_count'   => (clone $myDocs)->where('status', 'pending')->count(),
            'verified_count'  => (clone $myDocs)->where('status', 'verified')->count(),
            'rejected_count'  => (clone $myDocs)->where('status', 'rejected')->count(),
            'by_type' => (clone $myDocs)->selectRaw('type, COUNT(*) as total')
                ->groupBy('type')
                ->get(),
            'by_status' => (clone $myDocs)->selectRaw('status, COUNT(*) as total')
                ->groupBy('status')
                ->get(),
        ]);
    }

    // ============================================
    // DASHBOARD SISWA (Hanya Dokumen Milik Sendiri)
    // ============================================
    public function siswa()
    {
        $user = auth()->user();

        // Ambil dokumen milik siswa yang sedang login
        $myDocs = Document::where('student_id', $user->id);

        return response()->json([
            'message'         => 'Dashboard Siswa',
            'total_documents' => (clone $myDocs)->count(),
            'verified_count'  => (clone $myDocs)->where('status', 'verified')->count(),
            'pending_count'   => (clone $myDocs)->where('status', 'pending')->count(),
            'rejected_count'  => (clone $myDocs)->where('status', 'rejected')->count(),
            'by_type' => (clone $myDocs)->selectRaw('type, COUNT(*) as total')
                ->groupBy('type')
                ->get(),
        ]);
    }
}