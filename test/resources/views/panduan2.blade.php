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
                        <h4 class="card-title mb-0 flex-grow-1">Upload Source code Product tugas akhir menggunakan FTP
                        </h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">

                                    <ol> Source code Product tugas akhir menggunakan FTP
                                        <ul>
                                            <li>Buka windows explorer. Masukkan alamat ftp://10.0.0.20/ dibagian
                                                address dan klik enter
                                            </li>
                                            <img src="{{ asset('assets') }}/images/panduan/ftp.png" alt=""
                                                height="100"><br><br>
                                            <li>Masukkan kredensial untuk nama pengguna dan sandi untuk dapat masuk
                                                keserver ftp (sama dengan username dan password saat login ke)
                                                website</li>
                                            <img src="{{ asset('assets') }}/images/panduan/crenden.png" alt=""
                                                height="250"><br><br>
                                            <li>Akan muncul 3 folder database, backend dan frontend. Upload source
                                                code pada folder sesuai container yang direquest sebelumnya.
                                            </li>
                                            <img src="{{ asset('assets') }}/images/panduan/folder.png" alt=""
                                                height="100"><br><br>
                                            <img src="{{ asset('assets') }}/images/panduan/upload.png" alt=""
                                                height="100">
                                            <li>Khusus untuk database harus menggunakan app pihak ketiga untuk
                                                import kedatabase. Dapat menggunakan navicat, dbeaver
                                                tableplus.Connect ke database menggunakan host 10.0.0.21. Untuk port,
                                                username, dan password sesuai dengan container yang sudah dibuat sebelumnya
                                            </li>
                                            <img src="{{ asset('assets') }}/images/panduan/connect.png" alt=""
                                                height="250"><br><br>
                                            <li>Setelah connect kedalam database, import file sql 
                                            </li>
                                            <img src="{{ asset('assets') }}/images/panduan/import.png" alt=""
                                                height="250"><br><br>
                                            <li>Untuk konfigurasi yang diperlukan dalam menjalankan aplikasi dapat
                                                dilakukan dengan setting didalam terminal. Dapat click icon shell dikolom action container
                                            </li>
                                            <img src="{{ asset('assets') }}/images/panduan/icon.png" alt=""
                                                height="250"><br><br>
                                                <li>Lakukan konfigurasi
                                            </li>
                                            <img src="{{ asset('assets') }}/images/panduan/shel.png" alt=""
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