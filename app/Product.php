<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;

    protected $fillable = [
      'name',
      'price',
      'photo',
      'description',
      'category_id',
      'created_at'
    ];

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
