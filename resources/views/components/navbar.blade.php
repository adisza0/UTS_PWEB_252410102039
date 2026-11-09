@props(['username', 'semester' => '', 'active' => ''])

@php
    $link = fn ($name) => route($name, ['username' => $username, 'semester' => $semester]);
    $cls = fn ($name) => $active === $name
        ? 'bg-indigo-700 text-white'
        : 'text-indigo-100 hover:bg-indigo-500';
@endphp

<nav class="bg-indigo-600 shadow">
    <div class="max-w-5xl mx-auto px-4 py-3 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <span class="text-white font-bold text-xl">PlanDay</span>

        <div class="flex flex-wrap items-center gap-2 text-sm">
            <a href="{{ $link('dashboard') }}" class="px-3 py-2 rounded-lg {{ $cls('dashboard') }}">Dashboard</a>
            <a href="{{ $link('pengelolaan') }}" class="px-3 py-2 rounded-lg {{ $cls('pengelolaan') }}">Pengelolaan</a>
            <a href="{{ $link('profile') }}" class="px-3 py-2 rounded-lg {{ $cls('profile') }}">Profile</a>
        </div>
    </div>
</nav>