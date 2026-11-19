<?php

namespace App\Exports;

use App\Models\Document;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Carbon\Carbon;

class DocumentsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    public function collection(): Collection
    {
        return Document::with(['student', 'uploader', 'verifier'])
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Judul Dokumen',
            'Tipe',
            'Nama Siswa',
            'NIS',
            'Kelas',
            'Semester',
            'Tahun Ajaran',
            'Status',
            'Uploader',
            'Verifikator',
            'Tanggal Upload',
            'Tanggal Verifikasi',
        ];
    }

    public function map($doc): array
    {
        static $no = 0;
        $no++;

        $typeLabels = [
            'semester' => 'Dokumen Semester',
            'passport_skills' => 'Passport Skills',
            'toeic' => 'Sertifikat TOEIC',
            'tka' => 'Sertifikat TKA',
            'ijasah' => 'Ijasah',
            'transkrip_nilai' => 'Transkrip Nilai',
            'ukk' => 'Sertifikat UKK',
            'pkl' => 'Sertifikasi PKL',
        ];

        $statusLabels = [
            'pending' => 'Menunggu Verifikasi',
            'verified' => 'Terverifikasi',
            'rejected' => 'Ditolak',
        ];

        // ═══════════════════════════════════════════
        // FIX: Cek format tanggal biar tidak error
        // ═══════════════════════════════════════════
        $createdAt = '-';
        if (!empty($doc->created_at)) {
            try {
                $createdAt = Carbon::parse($doc->created_at)->format('d/m/Y H:i');
            } catch (\Exception $e) {
                $createdAt = (string) $doc->created_at;
            }
        }

        $verifiedAt = '-';
        if (!empty($doc->verified_at)) {
            try {
                $verifiedAt = Carbon::parse($doc->verified_at)->format('d/m/Y H:i');
            } catch (\Exception $e) {
                $verifiedAt = (string) $doc->verified_at;
            }
        }

        return [
            $no,
            $doc->title ?? '-',
            $typeLabels[$doc->type] ?? $doc->type,
            $doc->student->name ?? '-',
            $doc->student->nis ?? '-',
            $doc->student->kelas ?? '-',
            $doc->semester ?? '-',
            $doc->tahun_ajaran ?? '-',
            $statusLabels[$doc->status] ?? $doc->status,
            $doc->uploader->name ?? '-',
            $doc->verifier->name ?? '-',
            $createdAt,      // ← pakai variabel yang sudah aman
            $verifiedAt,     // ← pakai variabel yang sudah aman
        ];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true, 'size' => 12]],
        ];
    }
}