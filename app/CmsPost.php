<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CmsPost extends Model
{
    //
    protected $guarded = [];

    public function file() {
        return $this->hasOne('App\CmsFile', 'table_id', 'id')->where('table_name', 'cms_posts');
    }

}
