<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'product_id';
    public function categories(){
       return $this->hasMany(Categories::class,'category_id','category_id');
    }
}
