<?php

namespace App\Http\Controllers;

use App\Models\DynamicAsset;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $banner = DynamicAsset::where('type', 'BANNER')->latest()->first();
        $galleries = DynamicAsset::where('type', 'GALERY')->latest()->get();
        $facilities = DynamicAsset::where('type', 'FACILITY')->latest()->get();

        return view('homepage', compact('banner', 'galleries', 'facilities'));
    }
}