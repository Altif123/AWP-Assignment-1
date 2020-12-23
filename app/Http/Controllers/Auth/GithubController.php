<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;


class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {

        $gitUser = Socialite::driver('github')->user();
        try {
            $user = User::query()
                ->where('email', $gitUser->getEmail())
                ->where('github_id', $gitUser->getId())
                ->firstOrFail();

        } catch (ModelNotFoundException $exception) {

            $user = User::create([
                'name' => $gitUser->getName(),
                'email' => $gitUser->getEmail(),
                'password' => Hash::make(Str::random(20)),
                'github_id' => $gitUser->getId()
            ]);
        }
        Auth::login($user);
        return redirect(route('home'));
    }
}
