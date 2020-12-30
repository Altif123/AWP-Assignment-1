<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable = ['dish_name', 'description', 'allergy', 'price', 'category', 'image'];


    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorite_user');
    }

    public function orders()
    {

        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function filterQuery($column, $operator, $option)
    {
        return Menu::where($column, $operator, $option)->get();
    }
}
