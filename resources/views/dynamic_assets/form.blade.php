<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>{{ isset($data) ? 'Edit' : 'Tambah' }} {{ $type }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8">

    <div class="bg-white p-6 rounded-lg shadow max-w-4xl w-full">
        <h2 class="text-2xl font-bold mb-4">{{ isset($data) ? 'Edit' : 'Tambah' }} {{ ucfirst(strtolower($type)) }}</h2>

        @if ($type === 'BANNER')
            @include('dynamic_assets.partials.form-banner')
        @elseif ($type === 'GALERY')
            @include('dynamic_assets.partials.form-galery')
        @elseif ($type === 'FACILITY')
            @include('dynamic_assets.partials.form-facility')
        @elseif ($type === 'PACKET')
            @include('dynamic_assets.partials.form-packet')
        @else
            <p class="text-red-500">Tipe tidak dikenali.</p>
        @endif
    </div>

</body>

</html>