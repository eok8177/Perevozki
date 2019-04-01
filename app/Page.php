<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['slug','status'];

    public function contents()
    {
        $res = [];
        foreach ($this->hasMany('App\PageTranslate')->get() as $item) {
            $res[$item->locale] = $item;
        }
        return $res;
    }

    public function translate($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(PageTranslate::class)->where('locale', $locale);
    }

}
