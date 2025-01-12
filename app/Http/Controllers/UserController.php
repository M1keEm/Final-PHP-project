<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required'|'string'|'min:3'|'max:20',
            'email' => 'required|email',
            'password' => 'required|string|min:7|max:20',
        ]);
        return 'Hello from our controller';
    }
}
