<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'SKU',
        'price'
    ];


    public function category(){
        return $this->hasMany(ProductCategory::class, 'product_id', 'id');
    }
}
