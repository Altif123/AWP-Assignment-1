<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable = ['dish_name', 'description', 'allergy', 'price','category','image'];


    public function favorites()
    {

        return $this->belongsToMany(User::class, 'favorite_user');
    }

}
