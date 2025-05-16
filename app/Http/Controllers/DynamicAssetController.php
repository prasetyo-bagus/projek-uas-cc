<?php

namespace App\Http\Controllers;

use App\Models\DynamicAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DynamicAssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = DynamicAsset::all();
        return view('dynamic_assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Mengambil query parameter 'type', default ke BANNER
        $type = strtoupper($request->query('type', 'BANNER')); // Default ke BANNER

        // Validasi jika tipe tidak valid
        if (!in_array($type, ['BANNER', 'GALERY', 'FACILITY', 'PACKET', 'SPONSOR', 'LAYANAN'])) {
            abort(404); // Tampilkan error 404 jika tipe tidak valid
        }
        
        // Kirimkan data tipe ke view
        return view('dynamic_assets.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi dasar untuk semua tipe
        $baseValidation = [
            'type' => 'required|in:BANNER,GALERY,FACILITY,PACKET,SPONSOR,LAYANAN',
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:255',
            'detail' => 'nullable|string',
            'is_active' => 'required|boolean',
        ];
        
        // Validasi tambahan berdasarkan tipe
        if ($request->type === 'PACKET') {
            $baseValidation = array_merge($baseValidation, [
                'capacity' => 'nullable|string|max:255',
                'duration' => 'nullable|string|max:255',
                'weekday_price' => 'nullable|string|max:255',
                'weekend_price' => 'nullable|string|max:255',
            ]);
        } elseif ($request->type === 'LAYANAN') {
            $baseValidation = array_merge($baseValidation, [
                'category' => 'required|string|in:Pertanian,Peternakan,Perkebunan',
                'icon' => 'required|string|max:50',
                'item_titles' => 'required|array',
                'item_titles.*' => 'required|string|max:255',
                'item_descriptions' => 'required|array',
                'item_descriptions.*' => 'required|string',
            ]);
        }
        
        // Validasi data request
        $validated = $request->validate($baseValidation);

        // Menyimpan gambar dan mendapatkan path
        $imagePath = $request->file('image')->store('dynamic_assets/' . date('Y/m'), 'public');

        // Data dasar untuk semua tipe
        $data = [
            'type' => $request->type,
            'title' => $request->title,
            'image' => $imagePath,
            'description' => $request->description,
            'detail' => $request->detail,
            'is_active' => $request->is_active,
        ];
        
        // Tambahkan data spesifik berdasarkan tipe
        if ($request->type === 'PACKET') {
            $data = array_merge($data, [
                'capacity' => $request->capacity,
                'duration' => $request->duration,
                'weekday_price' => $request->weekday_price,
                'weekend_price' => $request->weekend_price,
            ]);
        } elseif ($request->type === 'LAYANAN') {
            // Buat array service_items dari data form
            $serviceItems = [];
            for ($i = 0; $i < count($request->item_titles); $i++) {
                $serviceItems[] = [
                    'title' => $request->item_titles[$i],
                    'description' => $request->item_descriptions[$i]
                ];
            }
            
            $data = array_merge($data, [
                'category' => $request->category,
                'icon' => $request->icon,
                'service_items' => json_encode($serviceItems),
            ]);
        }

        // Membuat entitas baru di database
        DynamicAsset::create($data);

        // Redirect setelah sukses
        return redirect()->route('dynamic-assets.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Menampilkan data berdasarkan ID
        $dynamicAsset = DynamicAsset::findOrFail($id);
        return view('dynamic_assets.show', compact('dynamicAsset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DynamicAsset $dynamicAsset)
    {
        // Mengambil tipe dari asset yang akan diedit
        $type = $dynamicAsset->type;
        return view('dynamic_assets.edit', [
            'dynamicAsset' => $dynamicAsset
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DynamicAsset $dynamicAsset)
    {
        // Validasi dasar untuk semua tipe
        $baseValidation = [
            'type' => 'required|in:BANNER,GALERY,FACILITY,PACKET,SPONSOR,LAYANAN',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'description' => 'nullable|string|max:255',
            'detail' => 'nullable|string',
            'is_active' => 'required|boolean',
        ];
        
        // Validasi tambahan berdasarkan tipe
        if ($request->type === 'PACKET') {
            $baseValidation = array_merge($baseValidation, [
                'capacity' => 'nullable|string|max:255',
                'duration' => 'nullable|string|max:255',
                'weekday_price' => 'nullable|string|max:255',
                'weekend_price' => 'nullable|string|max:255',
            ]);
        } elseif ($request->type === 'LAYANAN') {
            $baseValidation = array_merge($baseValidation, [
                'category' => 'required|string|in:Pertanian,Peternakan,Perkebunan',
                'icon' => 'required|string|max:50',
                'item_titles' => 'required|array',
                'item_titles.*' => 'required|string|max:255',
                'item_descriptions' => 'required|array',
                'item_descriptions.*' => 'required|string',
            ]);
        }
        
        // Validasi data yang akan diupdate
        $validated = $request->validate($baseValidation);

        // Menyimpan data dasar yang ada di request
        $data = $request->only(['type', 'title', 'description', 'detail', 'is_active']);
        
        // Tambahkan data spesifik berdasarkan tipe
        if ($request->type === 'PACKET') {
            $data = array_merge($data, $request->only(['capacity', 'duration', 'weekday_price', 'weekend_price']));
        } elseif ($request->type === 'LAYANAN') {
            // Buat array service_items dari data form
            $serviceItems = [];
            for ($i = 0; $i < count($request->item_titles); $i++) {
                $serviceItems[] = [
                    'title' => $request->item_titles[$i],
                    'description' => $request->item_descriptions[$i]
                ];
            }
            
            $data = array_merge($data, [
                'category' => $request->category,
                'icon' => $request->icon,
                'service_items' => json_encode($serviceItems),
            ]);
        }

        // Jika ada gambar yang diupload, proses penggantian gambar
        if ($request->hasFile('image')) {
            if ($dynamicAsset->image && Storage::disk('public')->exists($dynamicAsset->image)) {
                Storage::disk('public')->delete($dynamicAsset->image); // Hapus gambar lama
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('dynamic_assets/' . date('Y/m'), 'public');
        }

        // Update entitas yang ada di database
        $dynamicAsset->update($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dynamic-assets.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dynamicAsset = DynamicAsset::findOrFail($id);

        // Hapus gambar jika ada
        if ($dynamicAsset->image && Storage::disk('public')->exists($dynamicAsset->image)) {
            Storage::disk('public')->delete($dynamicAsset->image);
        }

        // Hapus data dari database
        $dynamicAsset->delete();

        return redirect()->route('dynamic-assets.index')->with('success', 'Data berhasil dihapus.');
    }

    /**
     * Toggle status aktif/nonaktif dari asset
     */
    public function toggleStatus(string $id)
    {
        $dynamicAsset = DynamicAsset::findOrFail($id);
        $dynamicAsset->is_active = !$dynamicAsset->is_active;
        $dynamicAsset->save();

        $statusText = $dynamicAsset->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->back()->with('success', "Data berhasil $statusText.");
    }
}