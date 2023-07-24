@extends('layout')

@section('content')
<style>
/* Ganti lebar dan tinggi gambar sesuai yang Anda inginkan */
.gambar {
    display: block;
    max-width: 200px;
    height: auto;
    margin-top: 10px;
}
</style>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            <li>Membuat Request Container
                        </h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">

                                    <ol>
                                        <li>Masuk ke menu kontainer</li><img
                                            src="{{ asset('assets') }}/images/panduan/menu.png" alt=""
                                            height="250"><br><br>
                                        <li>Klik button tambah</li>
                                        <img src="{{ asset('assets') }}/images/panduan/tambah.png" alt=""
                                            height="50"><br><br>
                                        <li>Pada tampilan modal akan muncul 2 radio button,Dapat memilih untuk
                                            menggunakan database atau tidak. Kemudian untuk frontend digabung
                                            atau dipisah. Sesuaikan dengan kebutuhan aplikasi anda
                                        </li>
                                        <img src="{{ asset('assets') }}/images/panduan/modal.png" alt=""
                                            height="250"><br><br>
                                        <li>Jika menggunakan database, setelah radion button diklik akan muncul
                                            form untuk mengisi nama kontainer, pilih template sesuai database
                                            dari aplikasi anda.
                                            Misalnya website yang akan anda miliki menggunakan
                                            database mysql, maka dapat memilih template dengan nama
                                            mysql-8-0-33 (jangan lupa untuk memilih versi yang sesui dengan
                                            database anda) kemudian input berserta username, password dan root
                                            password.
                                        </li>
                                        <img src="{{ asset('assets') }}/images/panduan/database.png" alt=""
                                            height="250"><br><br>
                                        <li>Pada bagian frontend dan backend akan muncul form untuk mengisi nama
                                            kontainer dan pilih template sesuai dependensi yang digunakan oleh
                                            aplikasi anada. Misalnya website yang akan anda miliki menggunakan
                                            framework laravel, maka dapat memilih template dengan nama laravel
                                            serta sesuaikan juga dengan versinya
                                        </li>
                                        <img src="{{ asset('assets') }}/images/panduan/frontend.png" alt=""
                                            height="250"><br><br>
                                        <li>Kemudian klik button Mengajukan</li>
                                        <li>Tunggu sampai status kontainer enable atau icon turn on/of pada
                                            kolom aksi berwarna hijau</li>
                                        <img src="{{ asset('assets') }}/images/panduan/enable.png" alt=""
                                            height="250"><br><br>

                                    </ol>
                                </div>
                            </div>

                            </td>
                            </tr>
                        </div>
                        <!-- end card
                    </div>
                    <!-- end col -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->

        @endsection