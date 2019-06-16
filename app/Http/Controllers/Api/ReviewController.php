<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Review;
use App\ReviewTranslate;
use App\Language;

class ReviewController extends Controller
{
    public function index()
    {
        // $lang = Language::where('status', 1)->first();

        $reviews = Review::where('status', 1)->orderBy('id', 'desc')->get();

        if(!$reviews)
            return response()->json(['error'=> 'not found any review'], 400);

        $res = [];
        foreach ($reviews->toArray() as $key => $item) {
            $res[$key] = $item;
            $res[$key]['date'] = date('d.m.Y', strtotime($item['created_at']));
            if (!$item['image']) {
                $res[$key]['image'] = '/img/avatar.png';
            }
        }

        return response()->json($res, 200);
    }

    public function top()
    {
        // $lang = Language::where('status', 1)->first();

        $reviews = Review::where('status', 1)
            ->orderBy('rating', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(3)->get();

        if(!$reviews)
            return response()->json(['error'=> 'not found any review'], 400);

        $res = [];
        foreach ($reviews->toArray() as $key => $item) {
            $res[$key] = $item;
            $res[$key]['date'] = date('d.m.Y', strtotime($item['created_at']));
            if (!$item['image']) {
                $res[$key]['image'] = '/img/avatar.png';
            }
            $res[$key]['text'] = strip_tags($res[$key]['text']);
        }

        return response()->json($res, 200);
    }

    public function addReview(Request $request)
    {
        $review = Review::create($request->all());
        $review->status = 0;
        $review->text = strip_tags($review->text);
        $review->save();

        return response()->json('Created', 200);
    }


}
