<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;
    protected $table = 'favorite_user';

    public function favorites()
    {

        return $this->belongsToMany(User::class, 'favorite_user', 'menu_id')->withTimestamps();
    }
}
