<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
     protected $table = "delivery";
    protected $primaryKey = 'delivery_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
    ];
     public function orders()
    {
        return $this->hasMany(Order::class, 'id');
    }

}