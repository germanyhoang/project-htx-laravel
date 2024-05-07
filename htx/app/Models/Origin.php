<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origin extends Model
{
    protected $table = "origin";
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        '	address'
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'id');
    }
}
