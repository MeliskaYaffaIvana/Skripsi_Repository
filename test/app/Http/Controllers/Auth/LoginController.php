<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
public function login(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $nim = $request->input('nim');
        $password = $request->input('password');

        // Memeriksa apakah NIM sudah terdaftar dalam tabel "users"
        $user = User::where('nim', $nim)->first();

        if (!$user) {
            // Memeriksa ke API untuk memeriksa keberadaan NIM
            $response = Http::get('http://tugasakhir.jti.polinema.ac.id/v2/public/api/mahasiswa-common/proposal-summary?nim=' . $nim);

            if ($response->successful()) {
                $responseData = $response->json();

                // Memastikan elemen 'nim_pengusul' ada di dalam respons
                if (isset($responseData['payload']['nim_pengusul']) && $responseData['payload']['nim_pengusul'] === $nim) {
                    
                    // Jika NIM ada di API, menyimpan data pengguna ke database
                    // if ($responseData['data']['nim_pengusul'] === $nim) {
                        $user = new User();
                        $user->nim = $nim;
                        $user->nama = $responseData['payload']['nim_pengusul'];
                        $user->judul = $responseData['payload']['judul_proposal'];
                        $user->deskripsi = $responseData['payload']['deskripsi'];
                        $user->status = 'mahasiswa'; // Set status pengguna sebagai "mahasiswa"
                        $user->password = password_hash($nim, PASSWORD_BCRYPT);
                        $digit6 = substr($nim, 5, 1);

                        if ($digit6 == '2') {
                            $user->prodi = 'TI';
                        } elseif ($digit6 == '6') {
                            $user->prodi = 'SIB';
                        }
                        // Simpan data pengguna ke database
                        $user->save();
                    // } else {
                    //     // Jika NIM tidak cocok dengan 'nim_pengusul' dalam respons API
                    //     return redirect()->back()->withInput()->withErrors(['nim' => 'NIM tidak terdaftar']);
                    // }
                } else {
                    // NIM tidak ada di API, tampilkan pesan error atau lakukan tindakan yang sesuai
                    return redirect()->back()->withInput()->withErrors(['nim' => 'NIM tidak terdaftarrrrrrr']);
                }
            } else {
                // Panggilan ke API mengalami kesalahan, tangani sesuai kebutuhan
                return redirect()->back()->withInput()->withErrors(['api' => 'Terjadi kesalahan saat memanggil API']);
            }
        }

        // Lanjutkan logika login seperti biasa setelah memeriksa NIM
        if (Auth::attempt(['nim' => $nim, 'password' => $password])) {
            // Login berhasil
            return redirect()->intended('home');
        } else {
            // Login gagal
            return redirect()->back()->withInput()->withErrors(['nim' => 'NIM atau password salah']);
        }
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'nim';
    }
}