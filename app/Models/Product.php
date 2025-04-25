<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','price','brand_id','slag'];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
