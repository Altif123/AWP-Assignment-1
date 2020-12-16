<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    public function update(User $user)
    {
        $user->update($this->validateUser());
        return redirect()->route('profile.show');
    }

    public function destroy()
    {

    }
    protected function validateUser()
    {
        return request()->validate([
            'name' => [ ],
            'email' => [ ],
            'password' => [ ],
        ]);
    }
}
