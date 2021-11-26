<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Link;
use App\Models\PagesCategory;
use App\Models\PagesSetting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\JsonLdMulti;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

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
        $setting = \App\Models\Setting::first();
        $logo = \App\Models\SiteImage::first();
        $image = asset($logo->image);
        $categories = Category::with(
            array(
                'blogs' => function($query){ $query->with('category')->where('is_active', '=', 1)->limit(4); }
            )
        )->get();
        $galleries = Gallery::where('is_active', '=', 1)->orderByDesc('created_at')->limit(2)->get();
        $sliders = Slider::where('is_active', '=', 1)->get();
        $blogs = Blog::with('category')->where('is_active', '=', 1)->limit(4)->get();
        $links = \App\Models\Link::where('is_active', '=', 1)->get();
        $imageLinks = \App\Models\imageLink::where('is_active', '=', 1)->get();
        SEOMeta::setTitle(__('word.home') . ' - ' .$setting["name_".session("lang")] );
        SEOMeta::setDescription($setting['description_'.session('lang')]);
        SEOMeta::setCanonical(Config::get('app.url'));

        OpenGraph::setTitle(__('word.home') . ' - ' .$setting["name_".session("lang")] );
        OpenGraph::setDescription($setting['description_'.session('lang')]);
        OpenGraph::setUrl(Config::get('app.url'));
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);
        
        JsonLd::setTitle(__('word.home') . ' - ' .$setting["name_".session("lang")] );
        JsonLd::setDescription($setting['description_'.session('lang')]);
        JsonLd::addImage($image);
        return view('frontend.index', compact('categories', 'sliders', 'links', 'blogs', 'galleries', 'imageLinks'));
    }
    public function news($slug)
    {
        $setting = \App\Models\Setting::first();
        $logo = \App\Models\SiteImage::first();
        $image = asset($logo->image);
        $category = Category::where('slug', '=', $slug)->first();
        $categories = Category::all();
        $blogs = Blog::where('category_id', '=', $category->id)->where('is_active', '=', 1)->paginate(9);
        SEOMeta::setTitle($category["name_".session("lang")].' - '.__('word.news'));
        SEOMeta::setDescription($setting['description_'.session('lang')]);
        SEOMeta::setCanonical(Config::get('app.url') . "/news/" . $category->slug);

        OpenGraph::setTitle($category["name_".session("lang")].' - '.__('word.news'));
        OpenGraph::setDescription($setting['description_'.session('lang')]);
        OpenGraph::setUrl(Config::get('app.url') . "/news/" . $category->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);
        
        JsonLd::setTitle($category["name_".session("lang")].' - '.__('word.news'));
        JsonLd::setDescription($setting['description_'.session('lang')]);
        JsonLd::addImage($image);
        return view('frontend.news', compact('blogs', 'category', 'categories'));
    }
    public function newsSingle($slug)
    {
        $blog = Blog::with('category')->where('slug', '=', $slug)->where('is_active', '=', 1)->first();
        $blogs = Blog::where('category_id', '=', $blog->category->id)->where('slug', '!=', $slug)->where('is_active', '=', 1)->inRandomOrder()->limit(5)->get();
        $links = Link::where('is_active', '=', 1)->get();
        $image = asset($blog->image);
        SEOMeta::setTitle($blog["title_".session("lang")].' - ' . $blog->category['name_'.session('lang')]);
        SEOMeta::setDescription(Str::limit(strip_tags($blog['content'.session('lang')]), 150));
        SEOMeta::setCanonical(Config::get('app.url') . "/news-single/" . $blog->slug);

        OpenGraph::setTitle($blog["title_".session("lang")].' - ' . $blog->category['name_'.session('lang')]);
        OpenGraph::setDescription(Str::limit(strip_tags($blog['content'.session('lang')]), 150));
        OpenGraph::setUrl(Config::get('app.url') . "/news-single/" . $blog->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);
        
        JsonLd::setTitle($blog["title_".session("lang")].' - ' . $blog->category['name_'.session('lang')]);
        JsonLd::setDescription(Str::limit(strip_tags($blog['content'.session('lang')]), 150));
        JsonLd::addImage($image);
        return view('frontend.news-single', compact('blogs', 'blog', 'links'));
    }
    public function gallery()
    {
        $setting = \App\Models\Setting::first();
        $logo = \App\Models\SiteImage::first();
        $image = asset($logo->image);
        $galleries = Gallery::where('is_active', '=', 1)->paginate(6);
        $links = Link::where('is_active', '=', 1)->get();
        SEOMeta::setTitle(__('word.gallery') . ' - ' .$setting["name_".session("lang")] );
        SEOMeta::setDescription($setting['description_'.session('lang')]);
        SEOMeta::setCanonical(Config::get('app.url') . '/gallery');

        OpenGraph::setTitle(__('word.gallery') . ' - ' .$setting["name_".session("lang")] );
        OpenGraph::setDescription($setting['description_'.session('lang')]);
        OpenGraph::setUrl(Config::get('app.url') . '/gallery');
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);
        
        JsonLd::setTitle(__('word.gallery') . ' - ' .$setting["name_".session("lang")] );
        JsonLd::setDescription($setting['description_'.session('lang')]);
        JsonLd::addImage($image);
        return view('frontend.gallery', compact('galleries', 'links'));
    }
    public function gallerySingle($slug)
    {
        $setting = \App\Models\Setting::first();
        $gallery = Gallery::with('images')->where('is_active', '=', 1)->where('slug', '=', $slug)->firstOrFail();
        $links = Link::where('is_active', '=', 1)->get();
        $image = asset($gallery['images'][0]['image']);
        SEOMeta::setTitle($gallery["title_".session("lang")].' - ' . __('word.gallery'));
        SEOMeta::setDescription($setting['description_'.session('lang')]);
        SEOMeta::setCanonical(Config::get('app.url') . "/gallery-single/" . $gallery->slug);

        OpenGraph::setTitle($gallery["title_".session("lang")].' - ' . __('word.gallery'));
        OpenGraph::setDescription($setting['description_'.session('lang')]);
        OpenGraph::setUrl(Config::get('app.url') . "/gallery-single/" . $gallery->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);
        
        JsonLd::setTitle($gallery["title_".session("lang")].' - ' . __('word.gallery'));
        JsonLd::setDescription($setting['description_'.session('lang')]);
        JsonLd::addImage($image);
        return view('frontend.gallery-single', compact('gallery', 'links'));
    }
    public function pagesSingle($slug)
    {
        $logo = \App\Models\SiteImage::first();
        $page = PagesSetting::with('category')->where('slug', '=', $slug)->where('is_active', '=', 1)->firstOrFail();
        // dd($page);
        $pages = PagesSetting::where('pagesCategory_id', '=', $page['category']['id'])->where('id', '!=', $page->id)->where('is_active', '=', 1)->get();
        $links = Link::where('is_active', '=', 1)->get();
        $image = asset($logo->image);
        SEOMeta::setTitle($page["title_".session("lang")].' - ' . $page->category['name_'.session('lang')]);
        SEOMeta::setDescription(Str::limit(strip_tags($page['content'.session('lang')]), 150));
        SEOMeta::setCanonical(Config::get('app.url') . "/pages-single/" . $page->slug);

        OpenGraph::setTitle($page["title_".session("lang")].' - ' . $page->category['name_'.session('lang')]);
        OpenGraph::setDescription(Str::limit(strip_tags($page['content'.session('lang')]), 150));
        OpenGraph::setUrl(Config::get('app.url') . "/pages-single/" . $page->slug);
        OpenGraph::addProperty('type', 'article');
        OpenGraph::addImage($image);
        
        JsonLd::setTitle($page["title_".session("lang")].' - ' . $page->category['name_'.session('lang')]);
        JsonLd::setDescription(Str::limit(strip_tags($page['content'.session('lang')]), 150));
        JsonLd::addImage($image);
        return view('frontend.page-single', compact('pages', 'page', 'links'));
    }
}
