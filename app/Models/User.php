<?php

namespace App\Models;

use Creativeorange\Gravatar\Facades\Gravatar;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFavorites(){

        return $this->belongsToMany(Menu::class, 'favorite_user');
    }
    public function getAvatarUrlAttribute(){
        return Gravatar::get($this->email);

    }

    public function Roles(){

        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role){

        $this->roles()->sync($role,false);
    }

    public function permissions(){

        return $this-> roles->map->permissions->flatten()->pluck('name')->unique();

    }
}
