<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use App\PageTranslate;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

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
        $page = new Page;
        return view('backend.pages.create', [
            'page'     => $page->forAdmin()['page'],
            'contents' => $page->forAdmin()['contents'],
            'language' => Language::where('status', '1')->get()
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
        $page = Page::create($request->all());
        $language = Language::where('status', '1')->get();

        foreach ($language as $lang) {

            $locale = $lang->locale;

            $page_transile = new PageTranslate();
            $page_transile->page_id = $page->id;
            $page_transile->locale = $locale;
            $page_transile->title = $request->$locale['title'];
            $page_transile->h1 = $request->$locale['h1'];
            $page_transile->description = $request->$locale['description'];
            $page_transile->meta_description = $request->$locale['meta_description'];
            $page_transile->meta_title = $request->$locale['meta_title'];
            $page_transile->meta_keywords = $request->$locale['meta_keywords'];
            $page_transile->og_title = $request->$locale['og_title'];
            $page_transile->og_description = $request->$locale['og_description'];
            $page_transile->save();
        }


        return redirect()
            ->route('admin.pages.edit', $page->id)->with('success', 'Page add' );
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
        $page = Page::find($id)->forAdmin();
        // dd($page);

        if ($page) {
            return view('backend.pages.edit', [
                'page'     => $page['page'],
                'contents' => $page['contents'],
                'language' => Language::where('status', '1')->get()
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
        $page = Page::find($id);

        if ($page) {
            $this->validateForm($request, $page);

            $page->fill($request->all())->save();

            $language = Language::where('status', '1')->get();

        foreach ($language as $lang) {

            $locale = $lang->locale;

            $page_transile = PageTranslate::where('page_id', $page->id)->where('locale', $lang->locale)->first();
            $page_transile->locale = $locale;
            $page_transile->title = $request->$locale['title'];
            $page_transile->h1 = $request->$locale['h1'];
            $page_transile->description = $request->$locale['description'];
            $page_transile->meta_description = $request->$locale['meta_description'];
            $page_transile->meta_title = $request->$locale['meta_title'];
            $page_transile->meta_keywords = $request->$locale['meta_keywords'];
            $page_transile->og_title = $request->$locale['og_title'];
            $page_transile->og_description = $request->$locale['og_description'];
            $page_transile->save();
        }

            return redirect()
                ->route('admin.pages.edit', $page->id)
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
    protected function validateForm(Request $request, $page)
    {

        $this->validate($request, [
            'slug' => Rule::unique('pages')->ignore($page->id),
            'slug' => 'required|max:255',
        ]);
    }
}
