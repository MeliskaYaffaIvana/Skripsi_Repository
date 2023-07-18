@extends('layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Pekerjaan Kontainer</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kontainer</th>
                                        <th>Nim Mahasiswa</th>
                                        <th>Template</th>
                                        <th>Port</th>
                                        <th>Status Job</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Selesai</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 0; ?>
                                    @foreach($container as $container)
                                    <tr>
                                        <?php $no++; ?>
                                        <td>{{ $no }}</td>
                                        <td>{{ $container->nama_kontainer}}</td>
                                        @foreach($users as $user)
                                        @if($user->id ==$container->id_user)
                                        <td>{{ $user->nim}}</td>
                                        @endif
                                        @endforeach
                                        @foreach($template as $temp)
                                        @if($temp->id ==$container->id_template)
                                        <td>{{ $temp->nama_template}}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $container->port_kontainer}}</td>
                                        <td>
                                            @if ($container->status_job ==0)
                                            Masuk Antrian
                                            @elseif ($container->status_job ==1)
                                            Dalam Proses
                                            @elseif ($container->status_job ==2)
                                            Selesai
                                            @else
                                            Failed
                                            @endif</td>
                                        <td>{{ $container->tgl_dibuat}}</td>
                                        <td>{{ $container->tgl_selesai}}</td>
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