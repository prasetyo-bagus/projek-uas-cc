<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\DynamicAsset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama website.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Ambil data banner
        $banners = DynamicAsset::where('type', 'BANNER')
            ->where('is_active', true)
            ->latest()
            // ->take(3)
            ->get();

        // Ambil data untuk sponsors
        $sponsors = DynamicAsset::where('type', 'SPONSOR')
            ->where('is_active', true)
            ->latest()
            ->get();

        // Ambil data paket wisata
        $packets = DynamicAsset::where('type', 'PACKET')
            ->where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        // Ambil data fasilitas
        $facilities = DynamicAsset::where('type', 'FACILITY')
            ->where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        // Ambil data galeri
        $galleries = DynamicAsset::where('type', 'GALERY')
            ->where('is_active', true)
            ->latest()
            ->take(8)
            ->get();

        // Ambil data blog terbaru
        $blogs = Blog::where('status', 'PUBLISH')
            ->latest()
            ->take(6)
            ->get();

        return view('homepage', compact('banners', 'sponsors', 'packets', 'facilities', 'galleries', 'blogs'));
    }

    /**
     * Menampilkan halaman galeri.
     *
     * @return \Illuminate\View\View
     */
    public function gallery()
    {
        $galleries = DynamicAsset::where('type', 'GALERY')
            ->where('is_active', true)
            ->latest()
            ->paginate(12);

        return view('gallery', compact('galleries'));
    }

    /**
     * Menampilkan halaman fasilitas.
     *
     * @return \Illuminate\View\View
     */
    public function facilities()
    {
        $facilities = DynamicAsset::where('type', 'FACILITY')
            ->where('is_active', true)
            ->latest()
            ->paginate(9);

        return view('facilities', compact('facilities'));
    }

    /**
     * Menampilkan halaman paket wisata.
     *
     * @return \Illuminate\View\View
     */
    public function packets()
    {
        $packets = DynamicAsset::where('type', 'PACKET')
            ->where('is_active', true)
            ->latest()
            ->paginate(3);

        return view('packets', compact('packets'));
    }

    /**
     * Menampilkan halaman about us.
     *
     * @return \Illuminate\View\View
     */
    public function aboutUs()
    {
        $sponsors = DynamicAsset::where('type', 'SPONSOR')
            ->where('is_active', true)
            ->latest()
            ->get();

        return view('about-us', compact('sponsors'));
    }

    /**
     * Menampilkan halaman services.
     *
     * @return \Illuminate\View\View
     */
    public function services()
    {
        $packets = DynamicAsset::where('type', 'PACKET')
            ->where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        return view('services', compact('packets'));
    }
}
