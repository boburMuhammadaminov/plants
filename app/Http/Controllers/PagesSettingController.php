<?php

namespace App\Http\Controllers;

use App\Models\PagesCategory;
use App\Models\PagesSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = PagesSetting::all();
        return view('admin.pages.index', compact('pages'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PagesCategory::all();
        return view('admin.pages.create', compact('categories'));
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
            'title_uz'=>'required',
            'title_en'=>'required',
            'title_ru'=>'required',
            'content_uz'=>'required',
            'content_en'=>'required',
            'content_ru'=>'required',
            'pagesCategory_id'=>'required',
        ]);
        $data['slug'] = Str::slug($data['title_en'], '-');
        PagesSetting::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.page.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PagesSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PagesSetting $page)
    {
        return view('admin.pages.show', compact('page'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PagesSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PagesSetting $page)
    {
        $categories = PagesCategory::all();
        return view('admin.pages.edit', compact('page', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PagesSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PagesSetting $page)
    {
        $data = $request->validate([
            'title_uz'=>'required',
            'title_en'=>'required',
            'title_ru'=>'required',
            'content_uz'=>'required',
            'content_en'=>'required',
            'content_ru'=>'required',
            'pagesCategory_id'=>'required',
        ]);
        $data['slug'] = Str::slug($data['title_en'], '-');
        $page->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.page.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PagesSetting  $pagesSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PagesSetting $page)
    {
        $page->delete();
        session()->flash('message', 'Muvaffaqiyatli O\'chirildi!');
        return redirect()->route('admin.page.index');
    }
}
