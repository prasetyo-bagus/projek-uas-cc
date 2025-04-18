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
        $banner = DynamicAsset::where('type', 'BANNER')->latest()->first();

        // Ambil data blog (misalnya 5 blog terbaru)
        $blogs = Blog::latest()->take(6)->get();

        // Kembalikan data ke view
        return view('homepage', compact('banner', 'blogs'));
    }
}
