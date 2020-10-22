<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = 'menu';

    protected $fillable = ['dish_name', 'description', 'allergy', 'price'];

    public function favorites(){

        return $this ->belongsToMany(User::class,'favorite_user');
    }

    public function indexPath()
    {
        return "/menu/";
    }
    public function showPath()
    {
        return route('menu.show');
    }

    public function editMenuPath()
    {
        return $this -> id . '/edit';
    }
    public function deleteMenuPath()
    {
        return $this -> id . '/delete';
    }
    public function createMenuPath()
    {
        return 'menu/create';

    }
}
