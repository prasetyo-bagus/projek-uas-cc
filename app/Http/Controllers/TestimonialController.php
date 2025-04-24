<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        return view('review.kelolakomentar', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pesan' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
            'kota' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'nama' => $request->nama,
            'pesan' => $request->pesan,
            'rating' => $request->rating,
            'status' => 'pending',
            'kota' => $request->kota,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('testimonials', 'public');
        }

        Testimonial::create($data);

        return redirect()->back()->with('success', 'Terima kasih atas testimonial Anda. Testimonial Anda akan ditampilkan setelah disetujui oleh admin.');
    }

    public function updateStatus(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $testimonial->update([
            'status' => $request->status,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Status testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->foto && Storage::disk('public')->exists($testimonial->foto)) {
            Storage::disk('public')->delete($testimonial->foto);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial berhasil dihapus.');
    }

    public function getApprovedTestimonials()
    {
        $testimonials = Testimonial::approved()->orderBy('created_at', 'desc')->take(6)->get();
        return response()->json($testimonials);
    }
}
