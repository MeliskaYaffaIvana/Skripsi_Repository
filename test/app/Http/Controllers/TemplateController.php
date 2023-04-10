<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Template;

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
        $template->id_kat = $request->id_kat;
        $template->tipe_template = $request->tipe_template;
        $template->versi = $request->versi;
        $template->status_template = $request->status_template;
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
    public function edit($id_template)
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
    public function update(Request $request, $id_template)
    {
        $template = Template::where('id_template', $id_template)->first();
        $template->id_kat = $request->get('id_kat');
        $template->tipe_template = $request->get('tipe_template');
        $template->versi = $request->get('versi');
        $template->status_template = $request->get('status_template');
        $template->save();
          return redirect()->route('Template.edit', $id_template)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_template)
    {
        $template = Template::where('id_template', $id_template);
        $template->delete();
        return redirect()->route('Template.index')->with('Success', 'data berhasi dihapus');
    }
}

