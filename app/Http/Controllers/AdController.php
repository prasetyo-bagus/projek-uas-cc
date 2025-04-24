<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use Illuminate\Support\Facades\Http;

class AdController extends Controller
{
    public function create()
    {
        return view('homepage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pesan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'g-recaptcha-response' => 'required'
        ]);

        // Verifikasi reCAPTCHA
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        $body = $response->json();

        if (!($body['success'] ?? false)) {
            return back()->withErrors(['captcha' => 'Verifikasi CAPTCHA gagal, coba lagi.'])->withInput();
        }

        // Simpan testimoni
        Ad::create([
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas testimoni Anda!');
    }
}
