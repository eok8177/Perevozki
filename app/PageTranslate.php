<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageTranslate extends Model
{
    protected $table = 'page_translations';

    protected $fillable = ['title','h1','description', 'meta_description', 'meta_title', 'meta_keywords', 'og_title', 'og_description'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'j_data' => 'array'
    ];
}
