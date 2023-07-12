<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Container;
use App\Models\User;

class JobContainerController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        $template = Template::all();        
        $container = Container::all();
        return view('Job.indexContainer', compact('users', 'template', 'container'));
    }
}