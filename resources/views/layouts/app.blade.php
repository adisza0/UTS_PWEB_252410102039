<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | PlanDay</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col">
        
    @isset($username)
        <x-navbar :username="$username" :semester="$semester ?? ''" :active="$active ?? ''" />
    @endisset

    <main class="flex-1 w-full max-w-5xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <x-footer />

</body>
</html>