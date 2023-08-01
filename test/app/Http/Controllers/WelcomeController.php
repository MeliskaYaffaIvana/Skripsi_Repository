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
              $portKontainer = null;

            if ($userContainers->count() > 0) {
                foreach ($userContainers as $container) {
                    $kategori = $container->template->kategori->kategori;

                    if ($kategori === 'frontend') {
                        $hasFrontendContainer = true;
                         $portKontainer = $container->port_kontainer;
                        break;
                    }
                }
            }

            $user->hasFrontendContainer = $hasFrontendContainer;
            $user->portKontainer = $portKontainer;
        }
        
        return view('welcome', compact('users'));
    }
}