<?php

namespace App\Http\Controllers\Admin;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->get('search')) {
            $reviews = Review::where('name', 'like', '%'. $request->search . '%')
                ->orderBy('id', 'asc');

        } else {
            $reviews = Review::orderBy('id', 'desc');
        }
        return view('backend.reviews.index', [
            'reviews' => $reviews->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review = new Review;
        return view('backend.reviews.create', [
            'review'     => $review,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);

        $lang = Review::create($request->all());
        return redirect()
            ->route('admin.reviews.edit', $lang->id)
            ->with('success', 'Review add' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.reviews.show', [
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $review = Review::find($id);

        if ($review) {
            return view('backend.reviews.edit', [
                'review'   => $review,
            ]);
        }

        return redirect()->route('admin.reviews.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $review = Review::find($id);

        if ($review) {
            $this->validateForm($request);

            $review->fill($request->all())->save();

            return redirect()
                ->route('admin.reviews.edit', $review->id)
                ->with('success', 'Категория обновлена');
        }

        return redirect()->route('admin.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json('success', 200);
    }

    /**
     * Validate request form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {

        $this->validate($request, [
            'title'             => 'required|max:255',
            'text'             => 'required',
        ]);

    }

    public function status($id)
    {
        $review = Review::find($id);
        if(!$review)
            return response()->json(['error'=> 'not found any page'], 400);

        $review->status = 1 - $review->status;
        $review->save();

        return response()->json($review->status, 200);
    }
}
