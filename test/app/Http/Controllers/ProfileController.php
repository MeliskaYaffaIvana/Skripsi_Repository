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
    public function indexPanduan1()
    {
        
        return view ('panduan1');
    }
    public function indexPanduan2()
    {
        
        return view ('panduan2');
    }
    public function indexPanduan3()
    {
        
        return view ('panduan3');
    }
}