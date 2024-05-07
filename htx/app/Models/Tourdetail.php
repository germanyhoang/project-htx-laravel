<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourdetail extends Model
{
    use HasFactory;

    protected $table = "tourdetail";
    protected $primaryKey = 'id';
public $timestamps = false;

protected $fillable = [
   'order_id ',  'tour_id ', 'price',
];
public function tour(){
   return $this->belongsTo(Product::class, 'tour_id');
}

public function order(){
   return $this->belongsTo(Order::class, 'order_id');
}
}
