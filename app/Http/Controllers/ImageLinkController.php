<?php

namespace App\Http\Controllers;

use App\Models\ImageLink;
use Illuminate\Http\Request;

class ImageLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imageLinks = ImageLink::paginate(20);
        return view('admin.imageLinks.index', compact('imageLinks'));
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
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'link' => 'required|max:255',
            'image' => 'required',
        ]);
        if(!file_exists('uploads/imageLinks')){
            mkdir('uploads/imageLinks', 0777, true);
        }
        $image = $request->file('image');
        $imageName = md5(rand(1000, 9999).microtime()).'.'.$image->getClientOriginalExtension();
        $image ->move(public_path('/uploads/imageLinks/'), $imageName);
        $data['image'] = 'uploads/imageLinks/'.$imageName;

        ImageLink::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.imageLinks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageLink  $imageLink
     * @return \Illuminate\Http\Response
     */
    public function show(ImageLink $imageLink)
    {
        return view('admin.imageLinks.show', compact('imageLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageLink  $imageLink
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageLink $imageLink)
    {
        return view('admin.imageLinks.edit', compact('imageLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ImageLink  $imageLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageLink $imageLink)
    {
        $data = $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'link' => 'required|max:255',
        ]);
        if($request->hasFile('image')) {
            unlink($imageLink->image);
            $image = $request->file('image');
            $imageName = md5(rand(1000, 9999).microtime()).'.'.$image->getClientOriginalExtension();
            $image ->move(public_path('/uploads/imageLinks/'), $imageName);
            $data['image'] = 'uploads/imageLinks/'.$imageName;
        }
        $imageLink->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.imageLinks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageLink  $imageLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageLink $imageLink)
    {
        unlink($imageLink->image);
        $imageLink->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.imageLinks.index');
    }
}
