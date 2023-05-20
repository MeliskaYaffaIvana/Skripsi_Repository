<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Container;
use App\Models\User;
use Auth;

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
        $container = $request->input('container');

        foreach ($container as $container){
            Container::create([
                'nama_kontainer' => $container['nama_kontainer'],
                'id_template' =>$container['id_template'],
                'id_user' => Auth::id()
            ]);
        }
        // $container = new Container;
        // $container->id_user = Auth::id();
        // $container->id_template = $request->id_template;
        // $container->nama_kontainer = $request->nama_kontainer;
        // // $container->bolehkan = $request->bolehkan;
        // // $container->status_job = $request->status_job;
        // $container->save();
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
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $container = Container::where('id', $id)->first();
        $container->id_user = Auth::id();
        $container->id_template = $request->get('id_template');
        $container->nama_kontainer = $request->get('nama_kontainer');
        // $container->bolehkan = $request->get('bolehkan');
        // $container->status_job = $request->get('status_job');
        $container->save();
        return redirect()->route('Container.edit', $id)->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $container = Container::where('id', $id);
        $container->delete();
        return redirect()->route('Container.index')->with('succes', 'data berhasil dihapus');
    }
    public function toggleStatus(Request $request, $id)
{
    $container = Container::where('id', $id)->firstOrFail();
    $container->status = !$container->status;
    $container->save();

    return response()->json(['success' => true]);
}

}