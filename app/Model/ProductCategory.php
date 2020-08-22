<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'product_id',
        'category_id'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function category(){
        return $this->belongsTo(Categories::class);
    }


    public function setCategoryIdAttribute(?string $parentCategoryName) {
        $parentCategoryQuery = Categories::query()->where('name', $parentCategoryName);

        if ($parentCategoryQuery->count() > 0) {
            $parentObj  = $parentCategoryQuery->first();
            $this->attributes['category_id'] = $parentObj->id;
        }else {
            $this->attributes['category_id'] = null;
        }
    }

    public function setProductIdAttribute(?string $parentCategoryName) {
        $parentCategoryQuery = Product::query()->where('name', $parentCategoryName);

        if ($parentCategoryQuery->count() > 0) {
            $parentObj  = $parentCategoryQuery->first();
            $this->attributes['product_id'] = $parentObj->id;
        }else {
            $this->attributes['product_id'] = null;
        }
    }
}
