<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslate extends Model
{
    protected $table = 'category_translations';

    protected $fillable = ['title','h1','description', 'meta_description', 'meta_title', 'meta_keywords', 'og_title', 'og_description'];
}
