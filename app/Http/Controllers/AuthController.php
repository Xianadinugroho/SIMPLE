<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ActivityLogger;

class AuthController extends Controller
{
    // ========== API LOGIN ==========
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Email atau password salah!'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        // ✅ LOG AKTIVITAS LOGIN
        ActivityLogger::log(
            'login',
            'auth',
            'User login: ' . $user->email . ' (' . $user->role . ')',
            null,
            $user->id
        );

        $redirects = [
            'kurikulum' => '/dashboard/kurikulum',
            'guru'      => '/dashboard/guru',
            'siswa'     => '/dashboard/siswa',
        ];

        return response()->json([
            'message' => 'Login berhasil!',
            'token'   => $token,
            'user'    => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => $user->role,
                'redirect_to' => $redirects[$user->role] ?? '/dashboard'
            ]
        ]);
    }

    // ========== GET CURRENT USER (INI YANG HILANG!) ==========
    public function me(Request $request)
    {
        $user = $request->user();

        // Tambahkan data class_id & info kelas jika ada
        return response()->json([
            'id'    => $user->id,
            'name'  => $user->name,
            'email' => $user->email,
            'role'  => $user->role,
            'nip'   => $user->nip,
            'nis'   => $user->nis,
            'kelas' => $user->kelas,
            'program_studi' => $user->program_studi,
            'position' => $user->position,
            'kelas' => $user->kelas,
        
        ]);
    }

    // ========== LOGOUT ==========
    public function logout(Request $request)
    {
        // Log aktivitas logout
        if ($request->user()) {
            ActivityLogger::log(
                'logout',
                'auth',
                'User logout: ' . $request->user()->email,
                null,
                $request->user()->id
            );
        }

        Auth::logout();

        if ($request->user()) {
            $request->user()->currentAccessToken()->delete();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}