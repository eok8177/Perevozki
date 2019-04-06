<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\CategoryTranslate;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;


class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->get('search')) {
            $categories = Category::where('name', 'like', '%'. $request->search . '%')
                ->orderBy('id', 'asc');

        } else {
            $categories = Category::orderBy('id', 'desc');
        }
        return view('backend.categories.index', [
            'categories' => $categories->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category;
        return view('backend.categories.create', [
            'category'     => $category->forAdmin()['category'],
            'contents' => $category->forAdmin()['contents'],
            'language' => Language::where('status', '1')->get(),
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
        // dd($request->all());
        $request->validate([
            'slug' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create($request->all());
        $language = Language::where('status', '1')->get();

        foreach ($language as $lang) {

            $locale = $lang->locale;

            $category_translate = new CategoryTranslate();
            $category_translate->category_id = $category->id;
            $category_translate->locale = $locale;
            $category_translate->title = $request->$locale['title'];
            $category_translate->h1 = $request->$locale['h1'];
            $category_translate->description = $request->$locale['description'];
            $category_translate->meta_description = $request->$locale['meta_description'];
            $category_translate->meta_title = $request->$locale['meta_title'];
            $category_translate->meta_keywords = $request->$locale['meta_keywords'];
            $category_translate->og_title = $request->$locale['og_title'];
            $category_translate->og_description = $request->$locale['og_description'];
            $category_translate->save();
        }


        return redirect()
            ->route('admin.categories.edit', $category->id)->with('success', 'Category add' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.categories.show', [
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
        $category = Category::find($id)->forAdmin();
        // dd($category);

        if ($category) {
            return view('backend.categories.edit', [
                'category'     => $category['category'],
                'contents' => $category['contents'],
                'language' => Language::where('status', '1')->get()
            ]);
        }

        return redirect()->route('admin.categories.index');
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
        $category = Category::find($id);

        if ($category) {
            $request->validate([
                'slug' => Rule::unique('categories')->ignore($category->id),
                'slug' => 'required|max:255',
            ]);

            $category->fill($request->all())->save();

            $language = Language::where('status', '1')->get();

            foreach ($language as $lang) {

                $locale = $lang->locale;

                $category_translate = CategoryTranslate::where('category_id', $category->id)->where('locale', $lang->locale)->first();
                if (!$category_translate) {
                    $category_translate = new CategoryTranslate();
                    $category_translate->category_id = $category->id;
                }
                $category_translate->locale = $locale;
                $category_translate->title = $request->$locale['title'];
                $category_translate->h1 = $request->$locale['h1'];
                $category_translate->description = $request->$locale['description'];
                $category_translate->meta_description = $request->$locale['meta_description'];
                $category_translate->meta_title = $request->$locale['meta_title'];
                $category_translate->meta_keywords = $request->$locale['meta_keywords'];
                $category_translate->og_title = $request->$locale['og_title'];
                $category_translate->og_description = $request->$locale['og_description'];
                $category_translate->save();
            }

            return redirect()
                ->route('admin.categories.edit', $category->id)
                ->with('success', 'Category update');
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json('success', 200);
    }

}
