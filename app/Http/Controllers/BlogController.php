<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all blog
        $blogs = Blog::paginate(2);
        // render view with blog
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'title'         => 'required|string|max:255',
        'url'           => 'nullable|string|max:255|unique:blogs,url',
        'category'      => 'required|in:BERITA,ACARA,PROMO,KULINER,DESTINASI,PANDUAN_WISATA,FASILITAS',
        'body'          => 'required',
        'picture'       => 'required|image|mimes:jpeg,jpg,png|max:10048',
        'status'        => 'required|in:PUBLISH,DRAFT',
    ]);

    // Buat slug dari url jika diisi, jika tidak, buat dari title
    $slug = $request->url ? Str::slug($request->url) : Str::slug($request->title);

    // Pastikan slug unik
    $originalSlug = $slug;
    $count = 1;
    while (Blog::where('url', $slug)->exists()) {
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    $picture = $request->file('picture');
    $picturePath = $picture->store('blogs', 'public');

    $pictureName = basename($picturePath);

    // Simpan ke database
    Blog::create([
        'user_id'   => Auth::id(),
        'title'     => $request->title,
        'category'  => $request->category,
        'body'      => $request->body,
        'url'       => $slug,
        'picture'   => $pictureName,
        'status'    => $request->status,
    ]);

    return redirect()->route('blogs.index')->with('success', 'Blog berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show($url)
    {
        $blog = Blog::where('url', $url)->firstOrFail();
        return view('blog.show', compact('blog'));
    }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    public function edit(Blog $blog)
    {
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'url'           => 'required|string|max:255|unique:blogs,url,' . $blog->id,
            'category'      => 'required',
            'body'          => 'required',
            'status'        => 'required|in:PUBLISH,DRAFT',
            'picture'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $slug = $request->url ? Str::slug($request->url) : Str::slug($request->title);

        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('url', $slug)->where('id', '!=', $blog->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $data = [
            'title'   => $request->title,
            'body'    => $request->body,
            'url'     => $slug,
            'status'  => $request->status,
        ];

        // Cek apakah ada file gambar baru
        if ($request->hasFile('picture')) {
            // dd(Storage::disk('public')->exists('blogs/' . $blog->picture));
            // Hapus gambar lama jika ada
            if ($blog->picture && Storage::disk('public')->exists('blogs/' . $blog->picture)) {
                Storage::disk('public')->delete('blogs/' . $blog->picture);
            }
            // Simpan gambar baru
            $picturePath = $request->file('picture')->store('blogs', 'public');
            $data['picture'] = basename($picturePath); // Simpan hanya nama file
        }
        // Update data blog
        $blog->update($data);

        return redirect()->route('blogs.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Blog $blog)
    {
    if ($blog->picture) {
        Storage::disk('public')->delete('blogs/' . $blog->picture);
    }

    $blog->delete();

    return redirect()->route('blogs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
