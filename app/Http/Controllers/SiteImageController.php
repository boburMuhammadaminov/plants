<?php

namespace App\Http\Controllers;

use App\Models\SiteImage;
use Illuminate\Http\Request;

class SiteImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = SiteImage::paginate(10);
        // dd($images);
        return view('admin.siteImages.index', compact('images'));
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
            'name_uz' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
        ]);
        $request->validate([
            'name_uz' => 'required|max:255',
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg',
        ]);

        if(!file_exists('uploads/images')){
            mkdir('uploads/images', 0777, true);
        }
        $imageName = md5(rand(1000, 9999).microtime()).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image') ->move(public_path('/uploads/images/'), $imageName);
        $data['image'] = 'uploads/images/'.$imageName;

        SiteImage::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.siteImages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteImage  $siteImage
     * @return \Illuminate\Http\Response
     */
    public function show(SiteImage $siteImage)
    {
        $image = $siteImage;
        return view('admin.siteImages.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteImage  $siteImage
     * @return \Illuminate\Http\Response
     */
    public function edit(SiteImage $siteImage)
    {
        $image = $siteImage;
        return view('admin.siteImages.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteImage  $siteImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteImage $siteImage)
    {
        $image = $siteImage;
        $data = $request->validate([
            'name_uz' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
        ]);

        if($request->hasFile('image')){
            unlink($image->image);
            $imageName = md5(rand(1000, 9999).microtime()).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image') ->move(public_path('/uploads/images/'), $imageName);
            $data['image'] = 'uploads/images/'.$imageName;
        }
        $image->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.siteImages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteImage  $siteImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SiteImage $siteImage)
    {
        unlink($siteImage->image);
        $siteImage->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.siteImages.index');
    }
}
