<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs = Staff::paginate(20);
        return view('admin.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
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
            'phone' => 'required',
            'email' => 'required|email',
            'position_uz' => 'required|max:255',
            'position_en' => 'required|max:255',
            'position_ru' => 'required|max:255',
            'reception_uz' => 'required|max:255',
            'reception_en' => 'required|max:255',
            'reception_ru' => 'required|max:255',
            'biography_uz' => 'required',
            'biography_en' => 'required',
            'biography_ru' => 'required',
            'charges_uz' => 'required',
            'charges_en' => 'required',
            'charges_ru' => 'required',
        ]);

        if(!file_exists('uploads/staff/')){
            mkdir('uploads/staff/', 0777, true);
        }
        $imageName = md5(rand(1000, 9999).microtime()).'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image') ->move(public_path('/uploads/staff/'), $imageName); 
        $data['image'] = 'uploads/staff/'.$imageName;
        Staff::create($data);
        session()->flash('message', 'Muvafaqqiyatli yaratildi!');
        return redirect()->route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        return view('admin.staff.show', compact('staff'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $data = $request->validate([
            'name_uz' => 'required|max:255',
            'name_en' => 'required|max:255',
            'name_ru' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'position_uz' => 'required|max:255',
            'position_en' => 'required|max:255',
            'position_ru' => 'required|max:255',
            'reception_uz' => 'required|max:255',
            'reception_en' => 'required|max:255',
            'reception_ru' => 'required|max:255',
            'biography_uz' => 'required',
            'biography_en' => 'required',
            'biography_ru' => 'required',
            'charges_uz' => 'required',
            'charges_en' => 'required',
            'charges_ru' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $imageName = md5(rand(1000, 9999).microtime()).'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image') ->move(public_path('/uploads/staff/'), $imageName); 
            $data['image'] = 'uploads/staff/'.$imageName;
        }
        $staff->update($data);
        session()->flash('message', 'Muvafaqqiyatli tahrirlandi!');
        return redirect()->route('admin.staff.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        unlink($staff->image);
        $staff->delete();
        session()->flash('message', 'Muvafaqqiyatli O\'chirildi!');
        return redirect()->route('admin.staff.index');
    }
}
