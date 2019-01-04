<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'blogTitle',
        'categoryId',
        'blogContent',
        'authorId',
        'bannerFile',
    ];

    public function categoryRelation(){
        return $this->belongsTo('App\Category', 'categoryId');
    }

    public function authorRelation(){
        return $this->belongsTo('App\User', 'authorId');
    }
}
