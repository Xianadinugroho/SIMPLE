<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'type', 'description', 'file_path', 'file_name',
        'file_size', 'file_mime', 'semester', 'tahun_ajaran',
        'qr_code_path', 'student_id', 'uploaded_by', 'verified_by',
        'status', 'verified_at', 'verification_notes'
    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function access()
    {
        return $this->hasMany(DocumentAccess::class);
    }

    // Accessors
    public function getTypeLabelAttribute()
    {
        return match($this->type) {
            'semester' => 'Dokumen Semester',
            'passport_skills' => 'Passport Skills',
            'toeic' => 'Sertifikat TOEIC',
            'tka' => 'Sertifikat TKA',
            'ijasah' => 'Ijasah',
            'transkrip_nilai' => 'Transkrip Nilai',
            'ukk' => 'Sertifikat UKK',
            'pkl' => 'Sertifikasi PKL',
            default => $this->type
        };
    }

    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            'pending' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'rejected' => 'Ditolak',
            default => $this->status
        };
    }

    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'pending' => 'warning',
            'verified' => 'success',
            'rejected' => 'danger',
            default => 'secondary'
        };
    }

    public function getQrDataAttribute()
    {
        return json_encode([
            'document_id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'type_label' => $this->type_label,
            'student_name' => $this->student->name ?? 'Unknown',
            'nis' => $this->student->nis ?? 'Unknown',
            'kelas' => $this->student->kelas ?? 'Unknown',
            'semester' => $this->semester,
            'tahun_ajaran' => $this->tahun_ajaran,
            'status' => $this->status,
            'status_label' => $this->status_label,
        ]);
    }
}