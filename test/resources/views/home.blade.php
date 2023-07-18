@extends('layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Beranda</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <!-- <div>
                                <button type="button" class="btn btn-success waves-effect waves-light edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Tambah</button>
                            </div> -->
                                </div>
                            </div>
                            @if(Auth::user()->status == 'mahasiswa')
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card border border-warning">
                                        <div class="card-body">
                                            <p class="text-muted"><strong>Status Kontainer</strong></p>
                                            @if ($studentactiveCount > 0)
                                            <p class="text-muted mb-0"><i
                                                    class=" text-success fs-18 align-middle me-2 rounded-circle shadow">
                                                    <span
                                                        class="badge bg-success">{{ $studentactiveCount }}</span></i>Kontainer
                                                Aktif</p>
                                            @endif
                                            @if ($studentinactiveCount > 0)
                                            <p class="text-muted mb-0"><i
                                                    class=" text-info fs-18 align-middle me-2 rounded-circle shadow"><span
                                                        class="badge bg-dark">{{ $studentinactiveCount }}</span></i>Kontainer
                                                tidak aktif
                                            </p>
                                            @endif
                                        </div>
                                        <div class="progress animated-progress bg-soft-primary rounded-bottom rounded-0"
                                            style="height: 6px;">
                                            <div class="progress-bar bg-success rounded-0" role="progressbar"
                                                style="width: {{ $activeCount > 0 ? $activeCount / ($activeCount + $inactiveCount) * 100 : 0 }}%"
                                                aria-valuenow="{{ $activeCount }}" aria-valuemin="0"
                                                aria-valuemax="{{ $activeCount + $inactiveCount }}"></div>
                                            <div class="progress-bar bg-dark rounded-0" role="progressbar"
                                                style="width: {{ $inactiveCount > 0 ? $inactiveCount / ($activeCount + $inactiveCount) * 100 : 0 }}%"
                                                aria-valuenow="{{ $inactiveCount }}" aria-valuemin="0"
                                                aria-valuemax="{{ $activeCount + $inactiveCount }}"></div>

                                        </div>
                                    </div>
                                    @endif

                                </div><!-- end col -->
                                @if(Auth::user()->status == 'administrator')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card border border-warning">
                                            <div class="card-body">
                                                <p class="text-muted"><strong>Status Kontainer</strong></p>
                                                @if ($activeCount > 0)
                                                <p class="text-muted mb-0"><i
                                                        class=" text-success fs-18 align-middle me-2 rounded-circle shadow">
                                                        <span
                                                            class="badge bg-success">{{ $activeCount }}</span></i>Kontainer
                                                    Aktif</p>
                                                @endif
                                                @if ($inactiveCount > 0)
                                                <p class="text-muted mb-0"><i
                                                        class=" text-info fs-18 align-middle me-2 rounded-circle shadow"><span
                                                            class="badge bg-dark">{{ $inactiveCount }}</span></i>Kontainer
                                                    tidak aktif
                                                </p>
                                                @endif
                                            </div>
                                            <div class="progress animated-progress bg-soft-primary rounded-bottom rounded-0"
                                                style="height: 6px;">
                                                <div class="progress-bar bg-success rounded-0" role="progressbar"
                                                    style="width: {{ $activeCount > 0 ? $activeCount / ($activeCount + $inactiveCount) * 100 : 0 }}%"
                                                    aria-valuenow="{{ $activeCount }}" aria-valuemin="0"
                                                    aria-valuemax="{{ $activeCount + $inactiveCount }}"></div>
                                                <div class="progress-bar bg-dark rounded-0" role="progressbar"
                                                    style="width: {{ $inactiveCount > 0 ? $inactiveCount / ($activeCount + $inactiveCount) * 100 : 0 }}%"
                                                    aria-valuenow="{{ $inactiveCount }}" aria-valuemin="0"
                                                    aria-valuemax="{{ $activeCount + $inactiveCount }}"></div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="card border border-warning">
                                            <div class="card-body">
                                                <p class="text-muted "><strong>Jumlah Template</strong></p>

                                                <p class="text-muted mb-0"><i
                                                        class="text-success fs-18 align-middle me-2 rounded-circle shadow">
                                                        <span
                                                            class="badge bg-success">{{ $templateCount }}</span></i>Template
                                                </p>
                                                <h5 class="fs-15 fw-semibold">Template</h5>
                                            </div>
                                            <div class="progress animated-progress bg-soft-primary rounded-bottom rounded-0"
                                                style="height: 6px;">
                                                <div class="progress-bar bg-success rounded-0" role="progressbar"
                                                    style="width: 100%" aria-valuenow="{{ $templateCount }}"
                                                    aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div><!-- end col -->

                                <table id="example" class="table " style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Kontainer</th>
                                            <th>Status</th>
                                            <th>Port</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($container as $container)
                                        @if($container->id_user == $users->id || $users->status == 'administrator')
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{ $container->nama_kontainer}}</div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">
                                                        @if ($container->bolehkan == 0)
                                                        Exited
                                                        @elseif ($container->bolehkan == 1)
                                                        Running
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1">{{ $container->port_kontainer}}</div>
                                                </div>
                                            </td>

                                            <!-- <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->id_user }}</div>
                                            </div>
                                        </td> -->
                                            @endif
                                            <!-- <td>
                      <div class="btn-group">
                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu dropdownmenu-secondary">
                                        <a class="dropdown-item"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</a>
                                                <a class="dropdown-item"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showEditModal">Edit</a>
                                                <form action="#"
                                                    method="POST">
                                                    <a type="submit" class="dropdown-item"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteRecordModal">Hapus</a>
                                                </form>
                                        </div>
                                        </div>
                                        </div>
                                    </td> -->
                                        </tr>
                                        @endforeach
                                    </tbody>
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

    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    @endsection