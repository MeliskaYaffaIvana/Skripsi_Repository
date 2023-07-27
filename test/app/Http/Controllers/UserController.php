<?php

namespace App\Http\Controllers;
use App\Models\UserAdmin;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserAdmin::all();
        return view('user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $users = UserAdmin::all();
        return view('user', compact ('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validatedData = $request->validate([
            'nim' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'judul' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'password' => 'required|string|min:6',
            // sesuaikan validasi lainnya sesuai kebutuhan
        ]);
        // Simpan user baru ke dalam database
        UserAdmin::create([
            'nim' => $validatedData['nim'],
            'nama' => $validatedData['nama'],
            'judul' => $validatedData['judul'],
            'deskripsi' => $validatedData['deskripsi'],
            'password' => bcrypt($validatedData['password']),
            'status' => 'administrator', 
        ]);

        return redirect()->route('user.create')->with('success', 'User berhasil ditambahkan.');

    }
    public function __construct()
    {
        $this->middleware('auth');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}