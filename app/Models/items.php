<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['name', 'price','description', 'location','id_category', 'id_seller'];
}
