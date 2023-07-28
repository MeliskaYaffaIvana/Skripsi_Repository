@extends('layout')

@section('content')
<style>
    .back-button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #546c9c;
  color: #fff;
  text-decoration: none;
  border-radius: 5px;
}
</style>

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Akses Kontainer
                        </h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <a href="{{ url()->previous() }}" class="back-button">Kembali</a><br><br><br>
                                     <iframe src="http://10.0.0.21:8181/?command={{ $url }}" style="width: 360%; height: 500px; border: 2px solid black;"></iframe>
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
