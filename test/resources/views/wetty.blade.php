@extends('layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">
                            Membuat Request Container
                        </h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <!-- Gunakan CSS untuk mengatur ukuran card dan iframe -->
                                    <div class="iframe-container" style="width: 50%; height: 300px; border: 2px solid black;">
                                        <iframe src="{{ $url }}" style="width: 100%; height: 100%; border: none;"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end content wrapper -->
</div><!-- end main panel -->
@endsection
