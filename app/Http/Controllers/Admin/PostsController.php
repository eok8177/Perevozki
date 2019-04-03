<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\PostTranslate;
use App\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->get('search')) {
            $posts = Post::where('name', 'like', '%'. $request->search . '%')
                ->orderBy('id', 'asc');

        } else {
            $posts = Post::orderBy('id', 'desc');
        }
        return view('backend.posts.index', [
            'posts' => $posts->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post;
        return view('backend.posts.create', [
            'post'     => $post->forAdmin()['post'],
            'contents' => $post->forAdmin()['contents'],
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
            'slug' => 'required|unique:pages|max:255',
        ]);

        $post = Post::create($request->all());
        $post->categories()->attach($request->category);
        $language = Language::where('status', '1')->get();

        foreach ($language as $lang) {

            $locale = $lang->locale;

            $post_translate = new PostTranslate();
            $post_translate->post_id = $post->id;
            $post_translate->locale = $locale;
            $post_translate->title = $request->$locale['title'];
            $post_translate->h1 = $request->$locale['h1'];
            $post_translate->description = $request->$locale['description'];
            $post_translate->meta_description = $request->$locale['meta_description'];
            $post_translate->meta_title = $request->$locale['meta_title'];
            $post_translate->meta_keywords = $request->$locale['meta_keywords'];
            $post_translate->og_title = $request->$locale['og_title'];
            $post_translate->og_description = $request->$locale['og_description'];
            $post_translate->save();
        }


        return redirect()
            ->route('admin.posts.edit', $post->id)->with('success', 'Post add' );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.posts.show', [
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
        $post = Post::find($id)->forAdmin();

        if ($post) {
            return view('backend.posts.edit', [
                'post'     => $post['post'],
                'contents' => $post['contents'],
                'language' => Language::where('status', '1')->get()
            ]);
        }

        return redirect()->route('admin.posts.index');
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
        $post = Post::find($id);

        if ($post) {
            $request->validate([
                'slug' => Rule::unique('categories')->ignore($post->id),
                'slug' => 'required|max:255',
            ]);

            $post->fill($request->all())->save();
            $post->categories()->sync($request->category);

            $language = Language::where('status', '1')->get();

            foreach ($language as $lang) {

                $locale = $lang->locale;

                $post_translate = PostTranslate::where('post_id', $post->id)->where('locale', $lang->locale)->first();
                if (!$post_translate) {
                    $post_translate = new PostTranslate();
                    $post_translate->post_id = $post->id;
                }
                $post_translate->locale = $locale;
                $post_translate->title = $request->$locale['title'];
                $post_translate->h1 = $request->$locale['h1'];
                $post_translate->description = $request->$locale['description'];
                $post_translate->meta_description = $request->$locale['meta_description'];
                $post_translate->meta_title = $request->$locale['meta_title'];
                $post_translate->meta_keywords = $request->$locale['meta_keywords'];
                $post_translate->og_title = $request->$locale['og_title'];
                $post_translate->og_description = $request->$locale['og_description'];
                $post_translate->save();
            }

            return redirect()
                ->route('admin.posts.edit', $post->id)
                ->with('success', 'Post update');
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json('success', 200);
    }
}