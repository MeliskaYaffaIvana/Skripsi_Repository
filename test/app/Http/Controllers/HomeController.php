<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Container;
use App\Models\User;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = auth()->user();
        $template = Template::all();        
        $container = Container::all();
        // Menghitung jumlah kontainer dengan status aktif
    $activeCount = Container::where('status', true)->count();

    // Menghitung jumlah kontainer dengan status tidak aktif
    $inactiveCount = Container::where('status', false)->count();
    $templateCount = Template::count();
        if(Auth::User()->level == 'administrator'){
            return view('home', compact('users', 'template', 'container'));
        }else{
        return view('home', compact('users', 'template', 'container', 'activeCount', 'inactiveCount', 'templateCount'));
    }
}
}