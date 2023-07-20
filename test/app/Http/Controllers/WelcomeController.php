<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Container;

class WelcomeController extends Controller
{
    public function index()
    {
        $users = User::All();
        // Ambil kontainer dengan kategori "frontend"
        $frontendContainers = Container::with('user', 'template.kategori')->whereHas('template.kategori', function ($query) {
            $query->where('kategori', 'frontend');
        })->get();
        
        return view('welcome', compact('users', 'frontendContainers'));
    }
}