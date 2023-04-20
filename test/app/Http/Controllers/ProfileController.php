<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        $users = auth()->user();
        return view ('profile', compact('users'));
    }
}
