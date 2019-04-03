<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTranslate extends Model
{
    protected $table = 'post_translations';

    protected $fillable = ['title','h1','description', 'meta_description', 'meta_title', 'meta_keywords', 'og_title', 'og_description'];
}
