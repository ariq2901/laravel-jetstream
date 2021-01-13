<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";
    use HasFactory;
    protected $fillable = ['category_id', 'product_title', 'product_slug', 'product_price', 'product_image'];
    protected $columns = ['id'];

    public function scopeExlude($query, $value = [])
    {
        return $query->select(array_diff($this->columns, (array) $value));
    }
}
