<?php

namespace App\Http\Controllers;

use App\Models\Vidoe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VidoeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos = Vidoe::paginate(10);
        return view('admin.videos.index', compact('videos'));
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
    public function getThumbnail($video)
    {

        if (Str::substr($video, 0, 17) == 'https://youtu.be/') {
            return Str::substr($video, 17,28);
        }else{
            parse_str( parse_url( $video, PHP_URL_QUERY ), $my_array_of_vars );
            return $my_array_of_vars['v']; 
        }
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
            'video' => 'required',
        ]);
        $data['thumbnail'] = "https://img.youtube.com/vi/".$this->getThumbnail($data['video'])."/maxresdefault.jpg";
        Vidoe::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidoe  $vidoe
     * @return \Illuminate\Http\Response
     */
    public function show(Vidoe $video)
    {
        return view('admin.videos.show', compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidoe  $vidoe
     * @return \Illuminate\Http\Response
     */
    public function edit(Vidoe $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vidoe  $vidoe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vidoe $video)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'title_ru' => 'required',
            'video' => 'required',
        ]);
        $data['thumbnail'] = "https://img.youtube.com/vi/".$this->getThumbnail($data['video'])."/maxresdefault.jpg";
        $video->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidoe  $vidoe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vidoe $video)
    {
        $video->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.videos.index');
    }
}
