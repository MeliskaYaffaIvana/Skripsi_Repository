<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Template;
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
        $template = Template::where('id', $id);
        $template->delete();
        return redirect()->route('Template.index')->with('Success', 'data berhasi dihapus');
    }
}

