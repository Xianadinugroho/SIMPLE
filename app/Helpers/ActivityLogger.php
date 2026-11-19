<?php

namespace App\Helpers;

use App\Models\ActivityLog;

class ActivityLogger
{
    /**
     * @param string $action      (login, logout, upload, verify, delete, create, update, export)
     * @param string $module      (auth, document, user)
     * @param string $description Keterangan
     * @param array  $data        Data tambahan (opsional)
     * @param int    $userId      (opsional) Pass ID manual jika auth belum aktif (seperti saat login)
     */
    public static function log($action, $module, $description = null, $data = null, $userId = null)
    {
        // Jika userId tidak diberikan, ambil dari auth()
        // Jika auth() kosong, jangan simpan log (biar tidak error)
        $finalUserId = $userId ?? auth()->id();

        if (!$finalUserId) {
            return; // Skip kalau tidak ada user (misal guest)
        }

        ActivityLog::create([
            'user_id'     => $finalUserId,
            'action'      => $action,
            'module'      => $module,
            'description' => $description,
            'data'        => $data ? json_encode($data) : null,
            'ip_address'  => request()->ip(),
            'user_agent'  => request()->userAgent(),
        ]);
    }
}