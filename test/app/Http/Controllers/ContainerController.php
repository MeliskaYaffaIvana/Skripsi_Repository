<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Template;
use App\Models\Container;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $container = Container::with('template')->get();
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
                $lastPortTI = Container::where('port_kontainer', 'LIKE', $portPrefix . '%')->max('port_kontainer');
                $counterTI = intval(substr($lastPortTI, -3)) + 1;
                $portSuffix = str_pad($counterTI, 3, '0', STR_PAD_LEFT);
            } elseif ($digit6 == '6') {
                $prodi = 'SIB';
                $nimDigit = substr($nim, 0, 2);
                $portPrefix = intval($nimDigit) + 16;

                // Mendapatkan nilai counter terakhir untuk SIB
                $lastPortSIB = Container::where('port_kontainer', 'LIKE', $portPrefix . '%')->max('port_kontainer');
                $counterSIB = intval(substr($lastPortSIB, -3)) + 1;
                $portSuffix = str_pad($counterSIB, 3, '0', STR_PAD_LEFT);
            }

            // Mengisi kolom port di tabel kontainer dengan format port
            $port = intval($portPrefix . $portSuffix);
            
            // Process the env_kontainer data based on the template category
            $template = Template::find($containerData['id_template']);
            $templateCategory = $template->kategori->id;
            
            $env_kontainer = null;

        if ($templateCategory === 'KT001') {
            // Check if any of the username, password, or rootpass is provided
            if ($containerData['username'] || $containerData['password'] || $containerData['rootpass'] || $containerData['dbname']) {
                // Populate $env_kontainer with the provided data
                $env_kontainer = [
                    'username' => $containerData['username'],
                    'password' => $containerData['password'],
                    'rootpass' => $containerData['rootpass'],
                    'dbname' => $containerData['dbname'],
                ];
            }
        }

        // Continue with the existing code...

        $container = [
            'nama_kontainer' => $containerData['nama_kontainer'],
            'id_template' => $containerData['id_template'],
            'id_user' => Auth::id(),
            'port_kontainer' => $port,
            'env_kontainer' => $env_kontainer ? json_encode($env_kontainer) : null, // Encode the array if not null, otherwise set to null
        ];

            Container::create($container);
        }
        }
        
        if (session()->has('error')) {
        $errorMessage = session('error');
        return redirect()->route('Container.create')->withErrors(['error' => $errorMessage])->withInput();
    } else {
        $successMessage = 'Data berhasil ditambahkan';
        return redirect()->route('Container.create')->with('success', $successMessage);
    }
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
    // Mengambil data container berdasarkan ID
    $container = Container::findOrFail($id);

    // Memeriksa apakah kontainer memiliki status "enable"
    if ($container->status == true) {
        return redirect()->route('Container.index')->with('error', 'Kontainer dengan status enable tidak dapat dihapus.');
    }
    
    // Simpan ID container yang dihapus 
    $deletedContainerId = $container->id;

    

    // Lakukan proses penghapusan container
    $container->delete();

    // Kirim ID yang dihapus ke API server
    $response = Http::post('http://10.0.0.21:8000/api/delete_kontainer/', [
        'deleted_container_id' => $deletedContainerId,
    ]);
     

    // Periksa kode status respons API server jika diperlukan

    return redirect()->route('Container.index')->with('success', 'Data berhasil dihapus.');
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

        return redirect()->back();
    }
public function getContainersByCategory()
{
    // Query untuk mendapatkan data kontainer per kategori dengan inner join
    $query = "
        SELECT
            kategori.kategori AS category,
            container.id as id,
            container.port_kontainer as port_kontainer,
            users.nim AS nim
        FROM
            container
            INNER JOIN template ON container.id_template = template.id
            INNER JOIN kategori ON template.id_kategori = kategori.id
            INNER JOIN users ON container.id_user = users.id
        WHERE
            kategori.kategori IN ('frontend', 'backend')  -- Hanya mengambil kategori frontend dan backend
        ORDER BY
            kategori.kategori, container.id
    ";

    // Eksekusi query menggunakan DB facade
    $containers = DB::select($query);

    // Format data kontainer per kategori ke dalam bentuk array
    $data = [];
    foreach ($containers as $container) {
        $category = $container->category;
        $name = $container->id;
        $port = $container->port_kontainer;
        $nim = $container->nim;

        if (!isset($data[$category])) {
            $data[$category] = [];
        }

        $data[$category][] = [
            'id' => $name,
            'port'=>$port,
            'nim' => $nim
        ];
    }

    return response()->json($data);
    }
    
    public function getContainerId($id)
    {
        try {
            $container = Container::findOrFail($id);
            $containerId = $container->id;
            return response()->json(['containerId' => $containerId]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Container not found'], 404);
        }
    }
    public function showContainerStatus()
    {
        $activeCount = Container::where('status', true)->count();
        $inactiveCount = Container::where('status', false)->count();

        return view('container.status', compact('activeCount', 'inactiveCount'));
    }

    #iframe
    public function terminal(Request $request, $containerId)
    {
        // Cari kontainer berdasarkan ID yang diterima dari URL
        $container = Container::where('id', $containerId)->first();
        // Dapatkan default shell dari template yang terkait
        $defaultShell = urlencode($container->template->default_shell);

        if (!$container) {
            return redirect()->back()->with('error', 'Kontainer tidak ditemukan');
        }

        // Encode semua spasi pada bagian URL mulai dari "docker exec" hingga "default shell"
        $url = str_replace(' ', '%20', 'docker exec -it ' . $container->id . ' ' . $defaultShell);

        // Tampilkan halaman blade dengan iframe menggunakan URL yang telah disiapkan
        return view('wetty', compact('url'));
    }
    public function izinUser(Request $request, $containerId)
{
    // Cari kontainer berdasarkan ID yang diterima dari URL
    $container = Container::with('user', 'template')->find($containerId);

    if (!$container) {
        return redirect()->back()->with('error', 'Kontainer tidak ditemukan');
    }

    // Dapatkan NIM user dan kategori kontainer dari relasi
    $nimUser = $container->user->nim;
    
    // Access the template and its relationship to get the kategori
    $kategoriKontainer = $container->template->kategori->kategori;
    
    // Kirim data ke server menggunakan REST API
    $response = Http::post('http://10.0.0.20:8080/api/izin_user/', [
        'container_id' => $containerId,
        'nim_user' => $nimUser,
        'kategori_kontainer' => $kategoriKontainer,
    ]);

    // Uncomment this line if needed for debugging, but remember to remove it before the redirect

    // Jika server mengirim respon, Anda dapat melakukan tindakan selanjutnya berdasarkan respon tersebut
    $responseData = $response->json();

    // ...

    // Redirect kembali ke halaman terminal atau lakukan tindakan lain yang diperlukan
    return redirect()->back();
}

}