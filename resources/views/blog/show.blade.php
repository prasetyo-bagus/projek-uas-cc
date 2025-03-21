<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Blog</title>

    <style>
        .attachment__caption {
            display: none;
        }

        .attachment a {
            pointer-events: none;
            text-decoration: none;
        }
    </style>

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-[800px] min-h-screen bg-white shadow-lg rounded-lg p-6 flex flex-col">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $blog->title }}</h2>

        <div class="prose prose-lg max-w-none" style="text-align: justify;">
            {{-- {!! $blog->body !!} --}}
            {!! str_replace('<img', '<img class="mx-auto block"', $blog->body) !!}
        </div>

        <div class="mt-auto">
            <a href="{{ route('blogs.index') }}"
                class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition block text-center">
                ← Kembali
            </a>
        </div>
    </div>

</body>

</html>