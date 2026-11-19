<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ActivityLogger; // ← TAMBAHKAN INI

class UserController extends Controller
{
    // ============ LIST USER ============
    public function index(Request $request)
    {
        $user = auth()->user();
        
        if (!$user->isKurikulum()) {
            return response()->json(['message' => 'Hanya Kurikulum'], 403);
        }

        $query = User::query();

        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        if ($request->filled('kelas')) {
            $query->where('kelas', $request->kelas);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('nis', 'LIKE', "%{$search}%")
                  ->orWhere('nip', 'LIKE', "%{$search}%");
            });
        }

        $users = $query->orderBy('role')->orderBy('name')->paginate(15);

        return response()->json($users);
    }

    // ============ TAMBAH USER ============
    public function store(Request $request)
    {
        $user = auth()->user();
        
        if (!$user->isKurikulum()) {
            return response()->json(['message' => 'Hanya Kurikulum'], 403);
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email',
            'password'      => 'required|string|min:6',
            'role'          => 'required|in:guru,siswa',
            'nip'           => 'nullable|string|max:50',
            'nis'           => 'nullable|string|max:50',
            'kelas'         => 'nullable|string|max:50',
            'program_studi' => 'nullable|string|max:100',
            'position'      => 'nullable|in:guru_biasa,wali_kelas,kapro,pokja,pkl',
            'phone'         => 'nullable|string|max:20',
            'address'       => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->role === 'siswa') {
            if (empty($request->nis)) {
                return response()->json(['message' => 'NIS wajib untuk siswa'], 422);
            }
            if (empty($request->kelas)) {
                return response()->json(['message' => 'Kelas wajib untuk siswa'], 422);
            }
        }

        if ($request->role === 'guru' && empty($request->nip)) {
            return response()->json(['message' => 'NIP wajib untuk guru'], 422);
        }

        $newUser = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'role'          => $request->role,
            'nip'           => $request->nip,
            'nis'           => $request->nis,
            'kelas'         => $request->kelas,
            'program_studi' => $request->program_studi,
            'position'      => $request->position,
            'phone'         => $request->phone,
            'address'       => $request->address,
        ]);

        // ✅ LOG AKTIVITAS TAMBAH USER
        ActivityLogger::log(
            'create',
            'user',
            'Tambah user: ' . $newUser->name . ' (' . $newUser->role . ')'
        );

        return response()->json([
            'message' => 'Akun berhasil dibuat',
            'user'    => $newUser,
        ], 201);
    }

   // ============ DETAIL USER ============
public function show($id)
{
    $authUser = auth()->user();

    $targetUser = User::find($id);

    if (!$targetUser) {
        return response()->json([
            'message' => 'User tidak ditemukan'
        ], 404);
    }

    // KURIKULUM BOLEH MELIHAT SEMUA USER
    $allowed = $authUser->isKurikulum();

    // SISWA HANYA BOLEH MELIHAT DATA DIRINYA SENDIRI
    if ($authUser->isSiswa() &&
        $authUser->id == $targetUser->id) {
        $allowed = true;
    }

    // GURU HANYA BOLEH MELIHAT SISWA DI KELASNYA
    if ($authUser->isGuru() &&
        $targetUser->role === 'siswa') {

        $allowed = $targetUser->classRoom()
            ->where('teacher_id', $authUser->id)
            ->exists();
    }

    if (!$allowed) {
        return response()->json([
            'message' => 'Anda tidak memiliki izin mengakses data ini'
        ], 403);
    }

    // KIRIM DATA MINIMAL YANG DIPERLUKAN
    return response()->json([
        'id' => $targetUser->id,
        'name' => $targetUser->name,
        'nis' => $targetUser->nis,
        'kelas' => $targetUser->kelas,
        'class_id' => $targetUser->class_id
    ]);
}

    // ============ UPDATE USER ============
    public function update(Request $request, $id)
    {
        $user = auth()->user();
        
        if (!$user->isKurikulum()) {
            return response()->json(['message' => 'Hanya Kurikulum'], 403);
        }

        $targetUser = User::find($id);

        if (!$targetUser) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'sometimes|string|max:255',
            'email'         => 'sometimes|email|unique:users,email,' . $id,
            'password'      => 'sometimes|string|min:6',
            'nip'           => 'nullable|string|max:50',
            'nis'           => 'nullable|string|max:50',
            'kelas'         => 'nullable|string|max:50',
            'program_studi' => 'nullable|string|max:100',
            'position'      => 'nullable|in:guru_biasa,wali_kelas,kapro,pokja,pkl',
            'phone'         => 'nullable|string|max:20',
            'address'       => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only([
            'name', 'email', 'nip', 'nis', 'kelas',
            'program_studi', 'position', 'phone', 'address'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $targetUser->update($data);

        // ✅ LOG AKTIVITAS UPDATE USER
        ActivityLogger::log(
            'update',
            'user',
            'Update user: ' . $targetUser->name . ' (' . $targetUser->role . ')'
        );

        return response()->json([
            'message' => 'User berhasil diupdate',
            'user'    => $targetUser,
        ]);
    }

    // ============ HAPUS USER ============
    public function destroy($id)
    {
        $user = auth()->user();
        
        if (!$user->isKurikulum()) {
            return response()->json(['message' => 'Hanya Kurikulum'], 403);
        }

        if ($user->id == $id) {
            return response()->json(['message' => 'Tidak bisa menghapus akun sendiri'], 400);
        }

        $targetUser = User::find($id);

        if (!$targetUser) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $userName = $targetUser->name;
        $userRole = $targetUser->role;

        $targetUser->delete();

        // ✅ LOG AKTIVITAS HAPUS USER
        ActivityLogger::log(
            'delete',
            'user',
            'Hapus user: ' . $userName . ' (' . $userRole . ')'
        );

        return response()->json(['message' => 'User berhasil dihapus']);
    }
}