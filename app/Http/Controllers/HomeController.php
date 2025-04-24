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
        return view('homepage', compact('banners', 'blogs', 'galleries', 'facilities'));
    }
    public function adminDashboard()
    {
        // Statistik blog
        $totalBlogs = Blog::count();
        $publishedBlogs = Blog::where('status', 'PUBLISH')->count();
        $draftBlogs = Blog::where('status', 'DRAF')->count();
        $featuredBlogs = Blog::where('is_featured', true)->count();
        
        // Kategori blog
        $blogCategories = [
            'BERITA' => Blog::where('category', 'BERITA')->count(),
            'ACARA' => Blog::where('category', 'ACARA')->count(),
            'DESTINASI' => Blog::where('category', 'DESTINASI')->count(),
            'PANDUAN_WISATA' => Blog::where('category', 'PANDUAN_WISATA')->count(),
            'KULINER' => Blog::where('category', 'KULINER')->count(),
            'PROMO' => Blog::where('category', 'PROMO')->count(),
            'FASILITAS' => Blog::where('category', 'FASILITAS')->count(),
        ];
        
        // Statistik asset
        $totalAssets = DynamicAsset::count();
        $banners = DynamicAsset::where('type', 'BANNER')->count();
        $galleries = DynamicAsset::where('type', 'GALERY')->count();
        $facilities = DynamicAsset::where('type', 'FACILITY')->count();
        
        // Blog terbaru
        $recentBlogs = Blog::latest()->take(5)->get();
        
        // Asset terbaru
        $recentAssets = DynamicAsset::latest()->take(5)->get();
        
        return view('dashboard', compact(
            'totalBlogs', 
            'publishedBlogs', 
            'draftBlogs', 
            'featuredBlogs',
            'blogCategories',
            'totalAssets',
            'banners',
            'galleries',
            'facilities',
            'recentBlogs',
            'recentAssets'
        ));
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