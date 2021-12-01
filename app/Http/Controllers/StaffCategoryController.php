<?php

namespace App\Http\Controllers;

use App\Models\StaffCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffCategories = StaffCategory::paginate(10);
        // $staffCategories = 1;
        return view('admin.staffCategories.index', compact('staffCategories'));
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
            'name_uz' => 'required|max:255',
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
        ]);
        $data['slug'] = Str::slug($data['name_en'], '-');
        StaffCategory::create($data);

        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.catStaff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function show(StaffCategory $catStaff)
    {
        $staffCategory = $catStaff;
        return view('admin.staffCategories.edit', compact('staffCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(StaffCategory $catStaff)
    {
        $staffCategory = $catStaff;
        return view('admin.staffCategories.edit', compact('staffCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StaffCategory $catStaff)
    {
        $data = $request->validate([
            'name_uz' => 'required',
            'name_en' => 'required',
            'name_ru' => 'required',
        ]);
        $data['slug'] = Str::slug($data['name_en'], '-');
        $catStaff->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.catStaff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StaffCategory  $staffCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(StaffCategory $catStaff)
    {
        $catStaff->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.catPages.index');
    }
}
