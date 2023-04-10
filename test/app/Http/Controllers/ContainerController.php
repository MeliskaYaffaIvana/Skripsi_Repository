<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Container;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = auth()->user();
        $template = Template::all();        
        $container = Container::all();
        return view('Container.index', compact('users', 'template', 'container'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = auth()->user();
        $template = Template::all();        
        $container = Container::all();
        return view('Container.index', compact('users', 'template', 'container'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $container = new Container;
        $container->judul = $request->judul;
        $container->deskripsi = $request->deskripsi;
        $container->frontend = $request->fronted;
        $container->backend = $request->backend;
        $container->database = $request->database;
        $container->id_user = $request->id_user;
        $container->save();
        return redirect()->route('Container.create')->with('success', 'Data berhasil ditambahkan');
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
    public function edit($id_container)
    {
        $users = auth()->user();
        $template = Template::all();        
        $container = Container::all();
        return view('Container.index', compact('users', 'template', 'container'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_container)
    {
        $container = Container::where('id_container', $id_container)->first();
        $container->judul = $request->get('judul');
        $container->deskripsi = $request->get('deskripsi');
        $container->frontend = $request->get('frontend');
        $container->backend = $request->get('backend');
        $container->database = $request->get('database');
        $container->id_user = $request->get('id_user');
        $container->save();
        return redirect()->route('Container.edit', $id_container)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_container)
    {
        $container = COntainer::where('id_container', $id_container);
        $container->delete();
        return redirect()->route('Container.index')->with('succes', 'data berhasil dihapus');
    }
}
