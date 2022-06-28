<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = ['name', 'price','description', 'location','id_category', 'id_seller', 'expiration_date','state'];

    public function imatges () {
        return $this->hasMany(imgs::class, 'id_item', 'id');
    }

    public function portrait () {
        return $this->hasOne(imgs::class, 'id_item', 'id');
    }

    public function category () {
        return $this->belongsTo(categories::class, 'id_category', 'id');
    }

    public function user () {
        return $this->belongsTo(user::class, 'id_seller', 'id');
    }
}
