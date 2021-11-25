<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Link;
use App\Models\Slider;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // activation
    public function activation(Request $request, $id)
    {
        $inactive = [
            'is_active' => 0,
        ];
        $active = [
            'is_active' => 1,
        ];
        $modelName = '\\App\\Models\\' . ucfirst($request->type);
        if ($request->type) {
            $model = $modelName::findOrFail($id);
            if ($model->is_active == true) {
                $model->update($inactive);
                session()->flash('message', "Faol emas !");
            } else {
                $model->update($active);
                session()->flash('message', "Faol !");
            }
        }
        return back();
    }
    public function contactSend(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:255',
            'sms'=>'required',
        ]);
    }
    //Language
    public function lang($lang)
    {
        session()->put('lang',$lang);
        return back();
    }
    public function home()
    {
        $categories = Category::with(
            array(
                'blogs' => function($query){ $query->with('category')->where('is_active', '=', 1)->limit(4); }
            )
        )->get();
        $galleries = Gallery::where('is_active', '=', 1)->orderByDesc('created_at')->limit(2)->get();
        $sliders = Slider::where('is_active', '=', 1)->get();
        $blogs = Blog::with('category')->where('is_active', '=', 1)->limit(4)->get();
        $links = \App\Models\Link::where('is_active', '=', 1)->get();
        return view('frontend.index', compact('categories', 'sliders', 'links', 'blogs', 'galleries'));
    }
    public function news($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        $categories = Category::all();
        $blogs = Blog::where('category_id', '=', $category->id)->where('is_active', '=', 1)->paginate(9);
        return view('frontend.news', compact('blogs', 'category', 'categories'));
    }
    public function newsSingle($slug)
    {
        $blog = Blog::with('category')->where('slug', '=', $slug)->where('is_active', '=', 1)->first();
        $blogs = Blog::where('category_id', '=', $blog->category->id)->where('slug', '!=', $slug)->where('is_active', '=', 1)->inRandomOrder()->limit(5)->get();
        $links = Link::where('is_active', '=', 1)->get();
        return view('frontend.news-single', compact('blogs', 'blog', 'links'));
    }
    public function gallery()
    {
        $galleries = Gallery::where('is_active', '=', 1)->paginate(6);
        $links = Link::where('is_active', '=', 1)->get();
        return view('frontend.gallery', compact('galleries', 'links'));
    }
    public function gallerySingle($slug)
    {
        $gallery = Gallery::where('is_active', '=', 1)->where('slug', '=', $slug)->firstOrFail();
        $links = Link::where('is_active', '=', 1)->get();
        // dd($gallery);
        return view('frontend.gallery-single', compact('gallery', 'links'));
    }
}
