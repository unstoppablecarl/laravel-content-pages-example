<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $table = 'pages';

    protected $fillable = [
        'path',
        'content',
        'router_priority',
        'page_type',
    ];

    protected $casts = [
        'meta' => 'json'
    ];

    public function setPathAttribute($value){

        if(!$value){
            $value = '/';
        } else {
            $value = trim($value, '/');
        }

        $this->attributes['path'] = $value;
    }

}
