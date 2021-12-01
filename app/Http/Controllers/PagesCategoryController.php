<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PagesCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PagesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $pagesCategories = PagesCategory::paginate(10);
        return view('admin.pagesCategories.index', compact('pagesCategories'));
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
        $data['slug'] = Str::slug($data['name_en'], '-');
        PagesCategory::create($data);

        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.catPages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PagesCategory  $catPage
     * @return \Illuminate\Http\Response
     */
    public function show(PagesCategory $catPage)
    {
        $pagesCategory = $catPage;
        return view('admin.pagesCategories.edit', compact('pagesCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PagesCategory  $catPage
     * @return \Illuminate\Http\Response
     */
    public function edit(PagesCategory $catPage)
    {
        $pagesCategory = $catPage;
        return view('admin.pagesCategories.edit', compact('pagesCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PagesCategory  $catPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PagesCategory $catPage)
    {
        $data = $request->validate([
            'name_uz' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
        ]);
        $data['slug'] = Str::slug($data['name_en'], '-');
        $catPage->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.catPages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PagesCategory  $catPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(PagesCategory $catPage)
    {
        $catPage->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.catPages.index');
    }
}
