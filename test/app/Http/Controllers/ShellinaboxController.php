<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Container;

class ShellinaboxController extends Controller
{
    public function show($id)
    {
        // Ambil data kontainer berdasarkan ID
        $container = Container::findOrFail($id);

        // Tampilkan view untuk menampilkan shellinabox
        return view('shellinabox', compact('container'));
    }
}
