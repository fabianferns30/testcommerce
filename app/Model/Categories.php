<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    /*--------Keeps tracks of deleted category---------*/
    use SoftDeletes;
    protected $fillable = [
        'parent_id',
        'depth',
        'name'
    ];

    public function setParentIdAttribute(?string $parentCategoryName) {
        $parentCategoryQuery = $this::query()->where('name', $parentCategoryName);

        if ($parentCategoryQuery->count() > 0) {
            $parentObj  = $parentCategoryQuery->first();
            $this->attributes['parent_id'] = $parentObj->id;
        }else {
            $this->attributes['parent_id'] = null;
        }
    }
}
