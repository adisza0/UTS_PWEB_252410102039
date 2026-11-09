@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<h1 class="text-2xl font-bold">Halo, {{ $username }}!</h1>
<p class="text-slate-500 mb-6">Selamat hari {{ $hariIni }}. Selamat beraktivitas!</p>

<h2 class="font-semibold text-lg mb-3">Kegiatanmu di {{ $hariIni }} ini</h2>
<div class="border border-gray-400 p-2 text-left">
    @forelse ($kegiatanHariIni as $jam => $kegiatan)
        @include('partials.kegiatan-card', ['jam' => $jam, 'kegiatan' => $kegiatan])
    @empty
        <p class="text-slate-500">Tidak ada kegiatan hari ini.</p>
    @endforelse
</div>
@endsection