<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Page;
use App\PageTranslate;
use App\Language;

class PageController extends Controller
{
    public function index()
    {
        $lang = Language::where('status', 1)->where('status', 1)->first();

        $pages = Page::with('contents')->where('status', 1)->orderBy('id', 'asc')->get();

        if(!$pages)
            return response()->json(['error'=> 'not found any page'], 400);

        $res = [];

        foreach ($pages as $key => $page) {
            $res[$key]['slug'] = $page->slug;
            $res[$key]['title'] = $page->translate($lang->locale)->first()->title;
        }

        return response()->json($res, 200);
    }

    public function page($slug)
    {
        $page = Page::with('contents')->where('slug', $slug)->first();

        if(!$page)
            return response()->json(['error'=> 'not found'], 400);

        $lang = Language::where('status', 1)->where('status', 1)->first();

        $content = $page->translate($lang->locale)->first();

        if(!$content)
            return response()->json(['error'=> 'translate not found'], 400);

        return response()->json($content, 200);
    }

}