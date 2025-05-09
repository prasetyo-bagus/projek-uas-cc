<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi: pastikan file adalah gambar dan ukurannya < 2MB
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ambil file dari request
        $file = $request->file('file');

        // Buat nama unik
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Simpan ke storage/app/public/uploads
        $path = $file->storeAs('uploads', $filename, 'public');

        // Buat URL akses
        $url = asset('storage/' . $path);

        // Kembalikan URL-nya dalam JSON
        return response()->json(['url' => $url]);
    }
}