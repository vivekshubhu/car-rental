<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use App\CmsComponent;

class CmsPage extends Model
{
    //
    protected $guarded = [];

    public function components()
    {
        return $this->belongsToMany('App\CmsComponent', 'component_pages', 'page_id', 'component_id');
    }
}
