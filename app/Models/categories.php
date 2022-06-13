<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name','image'];
    
    public function items () {
        return $this->hasMany(items::class, 'id_category', 'id');
    }

}