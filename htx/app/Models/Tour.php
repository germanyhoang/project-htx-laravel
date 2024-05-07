<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    rotected $table = "tour";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'image',  'price', 'description',
        'status','room_id'
    ];
        public function tourDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id');
    }
}
