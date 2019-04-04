<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['parent_id', 'slug', 'status', 'image', 'type'];

    public function langs($status = 1)
    {
        return Language::where('status', $status)->get();
    }

    public function forAdmin()
    {
        $category = [];
        $category['category'] = $this;
        foreach ($this->langs() as $item) {
            $trans = $this->translate($item->locale)->first();
            if ($trans) {
                $category['contents'][$item->locale] = $trans;
            } else {
                $category['contents'][$item->locale] = new CategoryTranslate;
            }
        }
        return $category;
    }

    public function contents()
    {
        return $this->hasMany('App\CategoryTranslate');
    }

    public function translate($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(CategoryTranslate::class)->where('locale', $locale);
    }

    public function getCategoriesForSelectAttribute()
    {
        return array_merge(['0' => 'Not Parent'],Category::pluck('slug', 'id')->toArray());
    }
}
