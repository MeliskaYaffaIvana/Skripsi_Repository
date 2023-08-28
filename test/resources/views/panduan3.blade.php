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
                        <h4 class="card-title mb-0 flex-grow-1">Running Aplikasi</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">

                                    <ol>
                                        <li>Dapat dijalankan dengan klik judul skripsi dihalaman daftar
                                            produk</li>
                                            <img src="{{ asset('assets') }}/images/panduan/list.png" alt=""
                                                height="250"><br><br>
                                        <li>Contoh aplikasi yang dijalankan
                                        </li>
                                        <img src="{{ asset('assets') }}/images/panduan/run.png" alt=""
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