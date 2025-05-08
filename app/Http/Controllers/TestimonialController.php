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

    public function showAll(Request $request)
    {
        $rating = $request->rating;
        $query = Testimonial::where('status', 'approved')
                       ->orderBy('created_at', 'desc');
        
        // Filter berdasarkan rating jika parameter rating ada
        if ($rating && in_array($rating, ['1', '2', '3', '4', '5'])) {
            $query->where('rating', $rating);
        }
        
        $testimonials = $query->paginate(12)->withQueryString();
        
        return view('review.testimonipage', compact('testimonials', 'rating'));
    }

    public function exportToCSV(Request $request)
    {
        $query = Testimonial::orderBy('created_at', 'desc');
        
        // Filter berdasarkan status jika parameter status ada
        if ($request->has('status') && in_array($request->status, ['pending', 'approved', 'rejected'])) {
            $query->where('status', $request->status);
        }
        
        $testimonials = $query->get();
        
        $filename = 'testimonials';
        if ($request->has('status')) {
            $filename .= '-' . $request->status;
        }
        $filename .= '-' . date('Y-m-d');
        
        // Format berdasarkan parameter
        $format = $request->get('format', 'csv');
        if ($format === 'excel') {
            $filename .= '.xls';
            $headers = [
                'Content-Type' => 'application/vnd.ms-excel',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
        } else {
            $filename .= '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            ];
        }
        
        $callback = function() use ($testimonials, $format) {
            $file = fopen('php://output', 'w');
            
            // Gunakan tab sebagai pemisah untuk format Excel
            $delimiter = $format === 'excel' ? "\t" : ',';
            
            // Header
            fputcsv($file, [
                'No',
                'Nama',
                'Kota',
                'Pesan',
                'Rating',
                'Status',
                'Tanggal'
            ], $delimiter);
            
            // Data
            foreach($testimonials as $index => $testimonial) {
                fputcsv($file, [
                    $index + 1,
                    $testimonial->nama,
                    $testimonial->kota ?? 'Tidak disebutkan',
                    $testimonial->pesan,
                    $testimonial->rating,
                    ucfirst($testimonial->status),
                    $testimonial->created_at->format('d M Y H:i')
                ], $delimiter);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}
