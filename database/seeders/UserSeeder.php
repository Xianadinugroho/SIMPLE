<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // 1. Kurikulum
        User::create([
            'name' => 'Dr. Ahmad S.Pd., M.Pd.',
            'email' => 'kurikulum@simpel.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'kurikulum',
            'phone' => '081234567890',
            'address' => 'Jl. Pendidikan No. 1, Jakarta'
        ]);

        // 2. Guru - Wali Kelas
        User::create([
            'name' => 'Budi Santoso, S.Pd.',
            'email' => 'guru1@simpel.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'guru',
            'nip' => '198501012010011001',
            'position' => 'wali_kelas',
            'program_studi' => 'Rekayasa Perangkat Lunak',
            'phone' => '081234567891',
            'address' => 'Jl. Guru No. 2, Jakarta'
        ]);

        // 3. Guru - Kapro
        User::create([
            'name' => 'Dr. Siti Rahayu, M.Kom.',
            'email' => 'kapro@simpel.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'guru',
            'nip' => '197805152005012002',
            'position' => 'kapro',
            'program_studi' => 'Rekayasa Perangkat Lunak',
            'phone' => '081234567892',
            'address' => 'Jl. Kapro No. 3, Jakarta'
        ]);

        // 4. Guru - Pokja
        User::create([
            'name' => 'Dewi Kartika, S.Kom.',
            'email' => 'pokja@simpel.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'guru',
            'nip' => '198610102015032003',
            'position' => 'pokja',
            'program_studi' => 'Rekayasa Perangkat Lunak',
            'phone' => '081234567893',
            'address' => 'Jl. Pokja No. 4, Jakarta'
        ]);

        // 5. Guru - PKL
        User::create([
            'name' => 'Eko Prasetyo, S.T.',
            'email' => 'pkl@simpel.sch.id',
            'password' => Hash::make('password123'),
            'role' => 'guru',
            'nip' => '198903202018042004',
            'position' => 'pkl',
            'program_studi' => 'Rekayasa Perangkat Lunak',
            'phone' => '081234567894',
            'address' => 'Jl. PKL No. 5, Jakarta'
        ]);

        // 6-10. Siswa
        $students = [
            [
                'name' => 'Ahmad Fauzi',
                'email' => 'ahmad.fauzi@simpel.sch.id',
                'nis' => '2024001',
                'kelas' => '12 RPL 1',
                'program_studi' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'name' => 'Siti Nurjanah',
                'email' => 'siti.nurjanah@simpel.sch.id',
                'nis' => '2024002',
                'kelas' => '12 RPL 1',
                'program_studi' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'name' => 'Budi Santoso',
                'email' => 'budi.santoso@simpel.sch.id',
                'nis' => '2024003',
                'kelas' => '12 RPL 2',
                'program_studi' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi.lestari@simpel.sch.id',
                'nis' => '2024004',
                'kelas' => '12 RPL 2',
                'program_studi' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'name' => 'Rudi Hermawan',
                'email' => 'rudi.hermawan@simpel.sch.id',
                'nis' => '2024005',
                'kelas' => '12 RPL 3',
                'program_studi' => 'Rekayasa Perangkat Lunak'
            ]
        ];

        foreach ($students as $student) {
            User::create([
                'name' => $student['name'],
                'email' => $student['email'],
                'password' => Hash::make('password123'),
                'role' => 'siswa',
                'nis' => $student['nis'],
                'kelas' => $student['kelas'],
                'program_studi' => $student['program_studi'],
                'phone' => '081234567895',
                'address' => 'Jl. Siswa No. ' . rand(1, 10) . ', Jakarta'
            ]);
        }
    }
}