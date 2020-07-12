<?php

namespace App\Http\Controllers;

use App\CmsPage;
use Illuminate\Http\Request;

class viewController extends Controller
{
    //
    public function index($slug = "home") {
        // dd($slug);
        $routeUrl = implode(' ',explode('-', $slug));
        $page = CmsPage::where('name', $routeUrl)->first();
        // dd($page);
        $components = $page->components;
        if(isset($slug) && $slug=="home") {
            return view('frontend.index',compact('components'));
        }
        if($slug == 'listings') {
            return view('frontend.pages.listings', compact("components"));
        }
        if($slug == 'testimonials') {
            return view('frontend.pages.testimonials', compact("components"));
        }
        if($slug == 'about') {
            return view('frontend.pages.about', compact("components"));
        }
        if($slug == 'blog') {
            return view('frontend.pages.blog', compact("components"));
        }
        if($slug == 'blog-details') {
            return view('frontend.pages.blog-details', compact("components"));
        }
        if($slug == 'contact') {
            // dd($components);
            return view('frontend.pages.contact', compact("components"));
        }
    }
}
