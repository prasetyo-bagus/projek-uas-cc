<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\DynamicAsset;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard Admin
     */
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
        $sponsors = DynamicAsset::where('type', 'SPONSOR')->count();
        
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
            'sponsors',
            'recentBlogs',
            'recentAssets'
        ));
    }

    /**
     * Dashboard SuperAdmin
     */
    public function superadminDashboard()
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
        $sponsors = DynamicAsset::where('type', 'SPONSOR')->count();
        
        // Blog terbaru
        $recentBlogs = Blog::latest()->take(5)->get();
        
        // Asset terbaru
        $recentAssets = DynamicAsset::latest()->take(5)->get();
        
        return view('superadmin', compact(
            'totalBlogs', 
            'publishedBlogs', 
            'draftBlogs', 
            'featuredBlogs',
            'blogCategories',
            'totalAssets',
            'banners',
            'galleries',
            'facilities',
            'sponsors',
            'recentBlogs',
            'recentAssets'
        ));
    }
}
