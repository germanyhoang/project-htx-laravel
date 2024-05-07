<?php

namespace App\Models;

use App\Models\Origin;
use App\Models\Category;
use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = "room";
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'image',  'price', 'description',
        'status'
    ];
        public function roomDetail()
    {
        return $this->hasMany(OrderDetail::class, 'id');
    }
}
