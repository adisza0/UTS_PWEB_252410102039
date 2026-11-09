@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<div class="flex flex-col items-center mb-8">
    <img src="{{ asset($foto) }}"
         class="w-28 h-28 rounded-full object-cover ring-4 ring-indigo-100 shadow">
</div>

    <dl class="divide-y">
        @foreach ($profile as $label => $nilai)
            <div class="py-3 flex justify-between">
                <dt class="text-slate-500">{{ $label }}</dt>
                <dd class="font-medium">{{ $nilai }}</dd>
            </div>
        @endforeach
    </dl>

    <div class="mt-6 text-center">
        <a href="{{ route('logout') }}" class="inline-block bg-indigo-600 text-white px-6 py-2 hover:bg-indigo-700">
            Logout
        </a>
    </div>
</div>
@endsection