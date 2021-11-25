<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::with('images')->paginate(10);
        return view('admin.images.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
        ]);
        $request->validate(['images' => 'required']);
        $data['slug'] = Str::slug($data['title_en'], '-');
        $gallery = Gallery::create($data);
        if(!file_exists('uploads/images')){
            mkdir('uploads/images', 0777, true);
        }
        foreach ($request->file('images') as $image) {
            $imageName = md5(rand(1000, 9999).microtime()).'.'.$image->getClientOriginalExtension();
            $image ->move(public_path('/uploads/images/'), $imageName);
            $imgData['image'] = 'uploads/images/'.$imageName;
            $imgData['gallery_id'] = $gallery['id'];
            Image::create($imgData);
        }

        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $galleries = Gallery::with('images')->findOrfail($gallery->id);
        return view('admin.images.show', compact('galleries'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $gallery = Gallery::with('images')->findOrfail($gallery->id);
        return view('admin.images.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
        ]);


        if($request->hasFile('images')){
            foreach ($request->file('images') as $image) {
                $imageName = md5(rand(1000, 9999).microtime()).'.'.$image->getClientOriginalExtension();
                $image ->move(public_path('/uploads/images/'), $imageName);
                $imgData['image'] = 'uploads/images/'.$imageName;
                $imgData['gallery_id'] = $gallery['id'];
                Image::create($imgData);
            }
        }
        $gallery->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery = Gallery::with('images')->findOrFail($gallery->id);
        foreach ($gallery->images as $image) {
            unlink($image->image);
        }
        $gallery->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.galleries.index');
    }
}
