<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Container;
use App\Models\User;
use Auth;
use DB;

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
        $containers = $request->input('container');

    foreach ($containers as $containerData) {
        $user = User::find(Auth::id()); // Get the associated user

        if ($user) {
            $nim = $user->nim;
            $digit6 = substr($nim, 5, 1);

            $prodi = '';
            $portPrefix = 0;
            $portSuffix = 0;

            if ($digit6 == '2') {
                $prodi = 'TI';
                $nimDigit = substr($nim, 0, 2);
                $portPrefix = intval($nimDigit) - 9;

                // Mendapatkan nilai counter terakhir untuk TI
                $lastPortTI = Container::where('port', 'LIKE', $portPrefix . '%')->max('port');
                $counterTI = intval(substr($lastPortTI, -3)) + 1;
                $portSuffix = str_pad($counterTI, 3, '0', STR_PAD_LEFT);
            } elseif ($digit6 == '6') {
                $prodi = 'SIB';
                $nimDigit = substr($nim, 0, 2);
                $portPrefix = intval($nimDigit) + 16;

                // Mendapatkan nilai counter terakhir untuk SIB
                $lastPortSIB = Container::where('port_kontainer', 'LIKE', $portPrefix . '%')->max('port');
                $counterSIB = intval(substr($lastPortSIB, -3)) + 1;
                $portSuffix = str_pad($counterSIB, 3, '0', STR_PAD_LEFT);
            }

            // Mengisi kolom port di tabel kontainer dengan format port
            $port = intval($portPrefix . $portSuffix);

            $container = [
                'nama_kontainer' => $containerData['nama_kontainer'],
                'id_template' =>$containerData['id_template'],
                'id_user' => Auth::id(),
                'port_kontainer' => $port
            ];

            Container::create($container);
        }
        }
        
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
    public function toggleBolehkan(Request $request, $id)
    {
        $container = Container::where('id', $id)->firstOrFail();
        $container->bolehkan = !$container->bolehkan;
        $container->save();

        return response()->json(['success' => true]);
    }
    public function updateBolehkan(Request $request, $id)
{
    $container = Container::findOrFail($id);
    $container->bolehkan = $request->bolehkan;
    $container->save();

    return redirect()->back()->with('status', 'Nilai Bolehkan berhasil diperbarui.');
}

}