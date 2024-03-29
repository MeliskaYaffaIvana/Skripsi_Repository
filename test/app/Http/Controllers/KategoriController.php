<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Template;


class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $kategori = Kategori::all();
        return view('Kategori.index', compact ('users', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $kategori = Kategori::all();
        return view('Kategori.index', compact ('users', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = new Kategori;
        $kategori->kategori = $request->kategori;
        $kategori->save();
        return redirect()->route('Kategori.create')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = auth()->user();
        $kategori = Kategori::all();
        return view('Kategori.index', compact ('users', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kategori = Kategori::where('id', $id)->first();
        $kategori->kategori = $request->get('kategori');
        $kategori->save();
        return redirect()->route('Kategori.edit', $id)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Mengambil data kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        
        // Memeriksa apakah kategori digunakan oleh template
        $isUsedInTemplate = Template::where('id_kategori', $kategori->id)->exists();

        // Jika kategori digunakan oleh template, tampilkan pesan error
        if ($isUsedInTemplate) {
            return redirect()->route('Kategori.index')->with('error', 'Kategori tidak dapat dihapus karena digunakan oleh template.');
        }

        // Jika kategori tidak digunakan oleh template, lanjutkan proses penghapusan
        $kategori->delete();

        return redirect()->route('Kategori.index')->with('success', 'Data berhasil dihapus.');
    }
    // ...

}