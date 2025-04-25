<?php

namespace App\Http\Controllers;

use App\Models\DynamicAsset;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data banner
        // $banner = DynamicAsset::where('type', 'BANNER')->where('is_active', true)->latest()->first();
        $banners = DynamicAsset::where('type', 'BANNER')->latest()->take(3)->get();      

        // Ambil data galeri
        $galleries = DynamicAsset::where('type', 'GALERY')->where('is_active', true)->latest()->take(4)->get();

        // Ambil data fasilitas
        $facilities = DynamicAsset::where('type', 'FACILITY')->where('is_active', true)->latest()->take(3)->get();  

        // Ambil data blog (misalnya 5 blog terbaru)
        $blogs = Blog::latest()->take(6)->get();

        // Kembalikan data ke view
    }

    /**
     * Menampilkan halaman galeri
     */
    public function gallery()
    {
        // Ambil semua galeri
        $galleries = DynamicAsset::where('type', 'GALERY')->where('is_active', true)->latest()->paginate(12);

        return view('gallery', compact('galleries'));
    }

    /**
     * Menampilkan halaman fasilitas
     */
    public function facilities()
    {
        // Ambil semua fasilitas
        $facilities = DynamicAsset::where('type', 'FACILITY')->where('is_active', true)->latest()->paginate(9);

        return view('facilities', compact('facilities'));
    }
}
