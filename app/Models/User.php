<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

protected $fillable = [
    'name', 'email', 'password', 'role', 'nip', 'nis', 'kelas',
    'program_studi', 'position', 'avatar', 'phone', 'address'
];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relationships
    public function documents()
    {
        return $this->hasMany(Document::class, 'student_id');
    }

    public function uploadedDocuments()
    {
        return $this->hasMany(Document::class, 'uploaded_by');
    }

    public function verifiedDocuments()
    {
        return $this->hasMany(Document::class, 'verified_by');
    }

    public function documentAccess()
    {
        return $this->hasMany(DocumentAccess::class);
    }

    // Role Check
    public function isKurikulum()
    {
        return $this->role === 'kurikulum';
    }

    public function isGuru()
    {
        return $this->role === 'guru';
    }

    public function isSiswa()
    {
        return $this->role === 'siswa';
    }

    // Accessor
    public function getRoleLabelAttribute()
    {
        return match($this->role) {
            'kurikulum' => 'Kurikulum',
            'guru' => 'Guru',
            'siswa' => 'Siswa',
            default => $this->role
        };
    }

    public function getAvatarUrlAttribute()
    {
        return $this->avatar 
            ? asset('storage/avatars/' . $this->avatar) 
            : asset('images/default-avatar.png');
    }
    
 
}