<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function jadwalHarian(): array
    {
        return [
            'Senin' => [
                '07:50 - 09:40' => 'Kelas UI/UX Design C',
                '11:30 - 13:20' => 'Kelas Pemrograman Berbasis Web C',
                '14:20 - 16:00' => 'Kelas Pendidikan Agama Islam 10',
                '19:00 - 20:00' => 'Rapat Progress Pemilu HIMATIF 2026',
                '20:00 - 23:00' => 'UTS Praktikum PWEB',
            ],
            'Selasa' => [
                '07:00 - 08:40' => 'Kelas DDKI A',
                '10:40 - 12:20' => 'Kelas Administrasi Sistem A',
                '14:20 - 16:00' => 'Kelas PIB 33',
                '16:00 - 17:00' => 'Menyusul Sosialisasi Pemilu HIMATIF 2026',
                '19:00 - 21:00' => 'Project Akhir Embedded System',
                '21:00 - 23:50' => 'Tugas Bahasa Inggris',
            ],
            'Rabu' => [
                '08:50 - 10.30' => 'Kelas TKTI F',
                '10:40 - 12:20' => 'Kelas Bahasa Inggris F',
                '16:00 - 17:50' => 'Kelas MKWU A',
                '19:00 - 21:00' => 'Tugas LKM 10 PIB',
            ],
            'Kamis' => [
                '08:50 - 10:30' => 'Kelas PKB F',
                '10:40 - 17:00' => 'Project Akhir Embedded System',
                '19:00 - 20:00' => 'Rapat Koordinasi Pemilu HIMATIF 2026',
                '20:00 - 23:00' => 'Menyelesaikan tugas-tugas kuliah',
            ],
            'Jumat' => [
                '08:00 - 10:00' => 'Menyelesaikan tugas-tugas kuliah',
                '12:30 - 15:10' => 'Kelas Praktikum PWEB C',
                '15:10 - 21:00' => 'Project Akhir Embedded System',
            ],
            'Sabtu' => [
                '07:00 - 10:00' => 'Menyelesaikan tugas-tugas kuliah',
                '12:00 - 23:00' => 'Menyelesaikan jobdesk proker',
            ],
            'Minggu' => [
                'Sudah cukup aktivitasmu. Beristirahatlah!',
            ]
        ];
    }

    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'semester' => 'required|integer|between:1,14',
        ], [
            'username.required' => 'Nama panggilan wajib diisi.',
            'username.min'      => 'Nama panggilan minimal 3 karakter.',
            'semester.required' => 'Semester wajib dipilih.',
            'semester.between'  => 'Semester tidak valid.',
        ]);

        return redirect()->route('dashboard', [
            'username' => ucfirst($request->username),
            'semester' => $request->semester,
        ]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');
        $semester = $request->query('semester');
        if (!$username || !$semester) {
            return redirect()->route('login');
        }

        $jadwal = $this->jadwalHarian();
        $hariIni = ucfirst(now()->locale('id')->dayName);
        $kegiatanHariIni = $jadwal[$hariIni] ?? [];

        return view('dashboard', [
            'username'        => $username,
            'semester'        => $semester,
            'active'          => 'dashboard',
            'hariIni'         => $hariIni,
            'kegiatanHariIni' => $kegiatanHariIni,
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');
        $semester = $request->query('semester');
        if (!$username || !$semester) {
            return redirect()->route('login');
        }

        return view('pengelolaan', [
            'username' => $username,
            'semester' => $semester,
            'active'   => 'pengelolaan',
            'jadwal'   => $this->jadwalHarian(),
        ]);
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');
        $semester = $request->query('semester');
        if (!$username || !$semester) {
            return redirect()->route('login');
        }

        $profile = [
            'Nama'     => $username,
            'Semester' => $semester,
        ];

        return view('profile', [
            'username' => $username,
            'semester' => $semester,
            'active'   => 'profile',
            'foto'     => 'images/foto.png',
            'profile'  => $profile,
        ]);
    }

    public function logout()
    {
        return redirect()->route('login');
    }
}