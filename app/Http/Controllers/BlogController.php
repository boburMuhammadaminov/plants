<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::paginate(20);
        return view('admin.blogs.index', compact('blogs', 'categories'));
    }
    public function getTime()
    {
        return Carbon::now()->timezone('Asia/Tashkent')->format('d-m-Y-h-i-s');

    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'content_uz' => 'required',
            'content_en' => 'required',
            'content_ru' => 'required',
            'category_id' => 'required',
            'image' => 'required|image'
        ]);
        if (!file_exists('uploads/blogs')) {
            mkdir('uploads/blogs', 0777, true);
        }
        $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('/uploads/blogs/'), $imageName);
        $data['image'] = 'uploads/blogs/' . $imageName;
        $data['user_id'] = 1;
        $data['slug'] = Str::slug($data['title_en'].' '.$this->getTime(), '-');
        Blog::create($data);
        session()->flash('message', 'Muvaffaqiyatli yaratildi!');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $blog = Blog::where('id', $blog->id)->with('category')->first();
        return view('admin.blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title_uz' => 'required|max:255',
            'title_en' => 'required|max:255',
            'title_ru' => 'required|max:255',
            'content_uz' => 'required',
            'content_en' => 'required',
            'content_ru' => 'required',
            'category_id' => 'required'
        ]);
        if ($request->hasFile('image')) {
            unlink($blog->image);
            $imageName = md5(rand(1000, 9999) . microtime()) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('/uploads/blogs/'), $imageName);
            $data['image'] = 'uploads/blogs/' . $imageName;
        }
        $blog->update($data);
        session()->flash('message', 'Muvaffaqiyatli tahrirlandi!');
        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        unlink($blog->image);
        $blog->delete();
        session()->flash('message', 'Muvaffaqiyatli o\'chirildi!');
        return redirect()->route('admin.blogs.index');
    }
}
