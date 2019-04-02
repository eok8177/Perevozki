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
        $request->validate([
            'slug' => 'required|unique:pages|max:255',
        ]);

        $page = Page::create($request->all());
        $language = Language::where('status', '1')->get();

        foreach ($language as $lang) {

            $locale = $lang->locale;

            $page_translate = new PageTranslate();
            $page_translate->page_id = $page->id;
            $page_translate->locale = $locale;
            $page_translate->title = $request->$locale['title'];
            $page_translate->h1 = $request->$locale['h1'];
            $page_translate->description = $request->$locale['description'];
            $page_translate->meta_description = $request->$locale['meta_description'];
            $page_translate->meta_title = $request->$locale['meta_title'];
            $page_translate->meta_keywords = $request->$locale['meta_keywords'];
            $page_translate->og_title = $request->$locale['og_title'];
            $page_translate->og_description = $request->$locale['og_description'];
            $page_translate->save();
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
            $request->validate([
                'slug' => Rule::unique('pages')->ignore($page->id),
                'slug' => 'required|max:255',
            ]);

            $page->fill($request->all())->save();

            $language = Language::where('status', '1')->get();

        foreach ($language as $lang) {

            $locale = $lang->locale;

            $page_translate = PageTranslate::where('page_id', $page->id)->where('locale', $lang->locale)->first();
            if (!$page_translate) {
                $page_translate = new PageTranslate();
                $page_translate->page_id = $page->id;
            }
            $page_translate->locale = $locale;
            $page_translate->title = $request->$locale['title'];
            $page_translate->h1 = $request->$locale['h1'];
            $page_translate->description = $request->$locale['description'];
            $page_translate->meta_description = $request->$locale['meta_description'];
            $page_translate->meta_title = $request->$locale['meta_title'];
            $page_translate->meta_keywords = $request->$locale['meta_keywords'];
            $page_translate->og_title = $request->$locale['og_title'];
            $page_translate->og_description = $request->$locale['og_description'];
            $page_translate->save();
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
    public function destroy(Page $page)
    {
        $page->delete();
        return response()->json('success', 200);
    }

}
