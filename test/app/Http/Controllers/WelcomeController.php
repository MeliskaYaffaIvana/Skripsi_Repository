<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Container;

class WelcomeController extends Controller
{
    public function index()
    {
        $users = User::where('status', 'mahasiswa')->get();
        
        foreach ($users as $user) {
            $userContainers = Container::where('id_user', $user->id)->get();
            $hasFrontendContainer = false;

            if ($userContainers->count() > 0) {
                foreach ($userContainers as $container) {
                    $kategori = $container->template->kategori->kategori;

                    if ($kategori === 'frontend') {
                        $hasFrontendContainer = true;
                        break;
                    }
                }
            }

            $user->hasFrontendContainer = $hasFrontendContainer;
        }
        
        return view('welcome', compact('users'));
    }
}