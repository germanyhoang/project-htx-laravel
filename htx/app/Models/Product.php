<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "product";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'image',  'price', 'sale_price', 'description', 'origin_id',
        'status', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function origin()
    {
        return $this->belongsTo(Origin::class, 'origin_id');
    }
        public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id');
    }
}