<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    protected $fillable = ['slug','status','image'];

    protected $casts = ['j_data' => 'array'];

    public function langs($status = 1)
    {
        return Language::where('status', $status)->get();
    }

    public function forAdmin()
    {
        $page = [];
        $page['page'] = $this;
        foreach ($this->langs() as $item) {
            $trans = $this->translate($item->locale)->first();
            if ($trans) {
                $page['contents'][$item->locale] = $trans;
            } else {
                $page['contents'][$item->locale] = new PageTranslate;
            }
        }
        return $page;
    }

    public function contents()
    {
        return $this->hasMany('App\PageTranslate');
    }

    public function translate($locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        return $this->hasOne(PageTranslate::class)->where('locale', $locale);
    }

}
