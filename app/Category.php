<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $table = 'categories';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'created_at'
    ];

    public function products() {
        return $this->hasMany('App\Product');
    }
}
