<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Container;

class ProfileController extends Controller
{
    public function index()
    {
        $container = Container::all();
        $users = auth()->user();
        return view ('profile', compact('users', 'container'));
    }
    public function indexPanduan()
    {
        
        return view ('panduan');
    }
}