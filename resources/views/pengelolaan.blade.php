@extends('layouts.app')

@section('title', 'Pengelolaan Jadwal')

@section('content')
<h1 class="text-2xl font-bold mb-1">Pengelolaan Jadwal</h1>

@foreach ($jadwal as $hari => $kegiatanHari)
    <section class="mb-8">
        <h2 class="font-semibold text-lg mb-3">
            {{ $hari }}
            <span class="text-sm font-normal text-slate-500">({{ count($kegiatanHari) }} kegiatan)</span>
        </h2>
        <div class="space-y-2">
            @foreach ($kegiatanHari as $jam => $kegiatan)
                @include('partials.kegiatan-card', ['jam' => $jam, 'kegiatan' => $kegiatan])
            @endforeach
        </div>
    </section>
@endforeach
@endsection