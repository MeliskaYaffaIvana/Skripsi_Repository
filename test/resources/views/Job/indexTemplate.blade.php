@extends('layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Pekerjaan Template </h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Template</th>
                                        <th>Kategori</th>
                                        <th>Versi</th>
                                        <th>Status Job</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($template as $template)
                                    <tr>
                                        <?php $no++; ?>
                                        <td>{{ $no }}</td>
                                        <td>{{ $template->nama_template}}</td>
                                        @foreach($kategori as $kat)
                                        @if($kat->id ==$template->id_kategori)
                                        <td>{{ $kat->kategori}}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $template->versi }}</td>
                                        <td>
                                            @if ($template->status_job ==0)
                                            Masuk Antrian
                                            @elseif ($template->status_job ==1)
                                            Dalam Proses
                                            @elseif ($template->status_job ==2)
                                            Selesai
                                            @else
                                            Failed
                                            @endif</td>
                                        <td>{{ $template->tgl_dibuat }}</td>
                                        <td>{{ $template->tgl_selesai }}</td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div><!-- end card -->
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
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>

@endsection