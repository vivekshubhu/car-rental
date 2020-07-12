<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsComponent extends Model
{
    //
    protected $guarded = [];

    public function pages()
    {
        return $this->belongsToMany('App\CmsPage', 'component_pages', 'page_id', 'component_id');
    }

    public function posts() {
        return $this->hasMany('App\CmsPost', 'component_name', 'name');
    }
}
