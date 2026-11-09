@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-2xl shadow p-8 mt-10">
    <h1 class="text-2xl font-bold text-center text-indigo-600">PlanDay</h1>
    <p class="text-center text-slate-500 mb-6">Selamat datang! Silakan masuk untuk melanjutkan.</p>

    <form action="{{ route('login.proses') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="username" class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="username" id="username" value="{{ old('username') }}"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400"
                placeholder="Contoh: Aat">
            @error('username')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="semester" class="block text-sm font-medium mb-1">Semester</label>
            <select name="semester" id="semester"
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                <option value="">Pilih semester</option>
                @for ($i = 1; $i <= 14; $i++)
                    <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>Semester {{ $i }}</option>
                @endfor
            </select>
            @error('semester')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded-lg hover:bg-indigo-700">
            Masuk
        </button>
    </form>
</div>
@endsection