<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\PostTranslate;
use App\Language;

class PostController extends Controller
{
    public function index()
    {
        $lang = Language::where('status', 1)->first();

        $posts = Post::with('contents')->where('status', 1)->orderBy('id', 'asc')->get();

        if(!$posts)
            return response()->json(['error'=> 'not found any post'], 400);

        $res = [];

        foreach ($posts as $key => $post) {
            $prew = $post->translate($lang->locale)->first()->description;
            $res[$key]['slug'] = $post->slug;
            $res[$key]['title'] = $post->translate($lang->locale)->first()->title;
            $res[$key]['image'] = $post->image;
            $res[$key]['text'] = preg_replace('/\s+?(\S+)?$/', '', substr($prew, 0, 401));
        }

        return response()->json($res, 200);
    }

    public function post($slug)
    {
        $post = Post::with('contents')->where('slug', $slug)->first();

        if(!$post)
            return response()->json(['error'=> 'not found'], 400);

        $lang = Language::where('status', 1)->where('status', 1)->first();

        $content = $post->translate($lang->locale)->first();

        if(!$content)
            return response()->json(['error'=> 'translate not found'], 400);

        $res = $content->toArray();
        $res['image'] = $post->image;

        return response()->json($res, 200);
    }

}
