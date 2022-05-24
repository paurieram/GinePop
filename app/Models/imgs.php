<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imgs extends Model
{
    use HasFactory;
    protected $table = 'imgs';
    protected $fillable = ['url', 'id_item'];
}
