<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShellInABoxController extends Controller
{
    public function getContainerId($id)
    {
        $container = Container::where('id', $id)->first(); // Mengambil data kontainer berdasarkan ID

        if ($container) {
            $containerId = $container->id; // Ganti 'id_kontainer' dengan kolom yang berisi ID kontainer pada tabel Container

            return response()->json(['containerId' => $containerId]);
        } else {
            return response()->json(['error' => 'Container not found'], 404);
        }
    }
}