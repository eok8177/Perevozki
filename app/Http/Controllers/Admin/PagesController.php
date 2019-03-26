<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->get('search')) {
            $pages = Page::where('name', 'like', '%'. $request->search . '%')
                ->orderBy('id', 'asc');

        } else {
            $pages = Page::orderBy('id', 'desc');
        }
        return view('backend.pages.index', [
            'pages' => $pages->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.create', [
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

        $category = Page::create($request->all());

        return redirect()
            ->route('admin.pages.edit', $category->id)
            ->with('success', 'Категория создана' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.pages.show', [
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
        $category = Page::find($id);

        if ($category) {
            return view('backend.pages.edit', [
                'category'   => $category,
            ]);
        }

        return redirect()->route('admin.pages.index');
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
        $category = Page::find($id);

        if ($category) {
            $this->validateForm($request);

            $category->fill($request->all())->save();

            return redirect()
                ->route('admin.pages.edit', $category->id)
                ->with('success', 'Page update');
        }

        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        return redirect()->route('admin.pages.index');
    }

    /**
     * Validate request form.
     *
     * @param Request $request
     */
    protected function validateForm(Request $request)
    {

        $this->validate($request, [
            'name'             => 'required|max:255',
            'slug'             => 'required|max:255',
        ]);

    }
}
