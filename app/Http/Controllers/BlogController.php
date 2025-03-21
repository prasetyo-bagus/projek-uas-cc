<?php

namespace App\Http\Controllers;

use Storage;
use App\Models\Blog;
use App\Models\BlogImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // get all blog
        $blogs = Blog::paginate(6);
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
        'url'           => 'required|string|max:255|unique:blogs,url',
        'category'      => 'required|in:BERITA,ACARA,PROMO,KULINER,DESTINASI,PANDUAN_WISATA,FASILITAS',
        'body'          => 'required',
        'picture'       => 'required|image|mimes:jpeg,jpg,png|max:10048',
        'status'        => 'required|in:PUBLISH,DRAFT',
    ]);

    $picture = $request->file('picture');
    $picturePath = $picture->store('blogs', 'public');

    // Debugging:
    // dd($request->body);

    $pictureName = basename($picturePath);

    // Simpan ke database
    Blog::create([
        'user_id'   => Auth::id(),
        'title'     => $request->title,
        'category'  => $request->category,
        'body'      => $request->body,
        'url'       => Str::slug($request->url),
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
    // public function edit(Blog $blog)
    // {
    //     return view('blog.edit', compact('blog'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Blog $blog)
    // {
    //     $request->validate([
    //         'title'   => 'required|string|max:255',
    //         'body'    => 'required',
    //         'picture' => 'nullable|image|mimes:jpeg,jpg,png|max:1048',
    //         'status'  => 'required|in:PUBLISH,DRAF',
    //     ]);

    //     // Update slug jika title berubah
    //     $slug = Str::slug($request->title);

    //     // Update data blog
    //     $blog->update([
    //         'title'   => $request->title,
    //         'body'    => $request->body,
    //         'url'     => $slug,
    //         'status'  => $request->status,
    //     ]);

    //     // Update gambar jika ada perubahan
    //     if ($request->hasFile('picture')) {
    //         $blog->update([
    //             'picture' => $request->file('picture')->store('blog_pictures', 'public'),
    //         ]);
    //     }

    //     return redirect()->route('blogs.index')->with(['success' => 'Data Berhasil Diperbarui!']);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(Blog $blog)
    {
        // foreach ($blog->images as $image) {
        //     Storage::disk('public')->delete($image->image_path);
        //     $image->delete();
        // }
    
        // $blog->delete();
        // return redirect()->route('blogs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
