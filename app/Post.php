<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = ['slug', 'status', 'image', 'type'];

    public function langs($status = 1)
    {
        return Language::where('status', $status)->get();
    }

    public function forAdmin()
    {
        $post = [];
        $post['post'] = $this;
        foreach ($this->langs() as $item) {
            $trans = $this->translate($item->locale);
            if ($trans) {
                $post['contents'][$item->locale] = $trans;
            } else {
                $post['contents'][$item->locale] = new PostTranslate;
            }
        }

        return $post;
    }

    public function contents()
    {
        return $this->hasMany('App\PostTranslate');
    }

    public function translate($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(PostTranslate::class)->where('locale', $locale);
    }

    public function getCategoriesForSelectAttribute()
    {
        return Category::pluck('slug', 'id')->toArray();
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
