<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = "contact";
    protected $primaryKey = 'contact_id';
    public $timestamps = true;

    protected $fillable = [
        'name',  'email', 'phone', 'title', 'messeger'
    ];
}
