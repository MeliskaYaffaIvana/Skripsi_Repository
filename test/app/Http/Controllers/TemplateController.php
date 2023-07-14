<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Template;
use App\Models\Container;
use App\Models\User;
use Auth;

class TemplateController extends Controller
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
        $template = Template::all();  
        return view('Template.index', compact ('users', 'kategori','template'));
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
        $template = Template::all();
        return view('Template.index', compact ('users', 'kategori','template'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = new Template;
        $template->id_kategori = $request->id_kategori;
        $template->id_user = Auth::id();
        $template->nama_template = $request->nama_template;
        $template->versi = $request->versi;
        $template->link_template = $request->link_template;
        $template->default_dir = $request->default_dir;
        $template->port = $request->port;
        // $template->bolehkan = $request->bolehkan;
        // $template->status_job = $request->status_job;
        $template->save();
         return redirect()->route('Template.create')->with('success', 'Data berhasil ditambahkan');
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
        $template = Template::all();
        return view('Template.index', compact ('users', 'kategori','template'));
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
        // dd($request);
        $template = Template::where('id', $id)->first();
        $template->id_kategori = $request->get('id_kategori');
        $template->id_user = Auth::id();
        $template->nama_template = $request->get('nama_template');
        $template->versi = $request->get('versi');
        $template->link_template = $request->get('link_template');
        $template->default_dir = $request->get('default_dir');
        $template->port = $request->get('port');
        // $template->bolehkan = $request->get('bolehkan');
        // $template->status_job = $request->get('status_job');
        
        $template->save();
          return redirect()->route('Template.edit', $id)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    // Mengambil data template berdasarkan ID
    $template = Template::findOrFail($id);

    // Simpan ID template yang dihapus dan atribut link_template
    $deletedTemplateId = $template->id;
    $deletedTemplateLink = $template->link_template;

    // Memeriksa apakah template digunakan oleh container
    $isUsedInContainer = Container::where('id_template', $template->id)->exists();

    // Jika template digunakan oleh container, tampilkan pesan error
    if ($isUsedInContainer) {
        return redirect()->route('Template.index')->with('error', 'Template tidak dapat dihapus karena digunakan oleh Kontainer.');
    }

    // Lakukan proses penghapusan template
    $template->delete();

    // Kirim ID dan atribut link_template yang dihapus ke API server
    $response = Http::post('http://10.0.0.21:8181/api/delete_template/', [
        'deleted_template_id' => $deletedTemplateId,
        'deleted_template_link' => $deletedTemplateLink
    ]);

    // Periksa kode status respons API server jika diperlukan

    return redirect()->route('Template.index')->with('success', 'Data berhasil dihapus.');
}

    // ...
    public function updateBolehkan(Request $request, $id)
    {
        $template = Template::findOrFail($id);
        $template->bolehkan = $request->bolehkan;
        $template->save();

        return redirect()->back();
    }

}