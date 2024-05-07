<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomdetail extends Model
{
    use HasFactory;

    protected $table = "roomdetail";
    protected $primaryKey = 'id';
public $timestamps = false;

protected $fillable = [
   'order_id ',  'room_id ', 'price',
];
public function room(){
   return $this->belongsTo(Product::class, 'room_id');
}

public function order(){
   return $this->belongsTo(Order::class, 'order_id');
}
}
