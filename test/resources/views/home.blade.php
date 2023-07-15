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
                                                        class="badge bg-dark">{{ $activeCount }}</span></i>Kontainer
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
                                            <p class="text-muted "><strong>Jumlah Template</strong>
                                                < /p>
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

                            </div><!-- end col -->
                        </div> <!-- end row-->
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

                        <!-- edit Modal -->
                        <div class="modal fade" id="showEditModal" tabindex=" -1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="#" enctype="multipart/form-data" id="myForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="Description">Judul</label>
                                                <input type="text" name="desc" class="form-control" id="#" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="description">Deskripsi</label>
                                                <input type="text" name="description" class="form-control" id="#"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Description">Front-End</label>
                                                <input type="text" name="desc" class="form-control" id="#" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Description">Backend-End</label>
                                                <input type="text" name="desc" class="form-control" id="#" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="Description">Database</label>
                                                <input type="text" name="desc" class="form-control" id="#" required>
                                            </div>

                                            <div class=" modal-footer">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <button type="button" class="btn2 btn-light"
                                                        data-bs-dismiss="modal">Tutup</button>
                                                    <button type="submit" class="btn1 btn-success"
                                                        id="edit-btn">Perbarui</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </tbody>
                            </table>
                        </div>
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
<!-- Detail Modal -->
<div class="modal fade" id="showDetailModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="Judul">Judul</label>
                        <input type="text" name="desc" class="form-control" value="Docker" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Deskripsi</label>
                        <input type="text" name="desc" class="form-control"
                            value="Sistem repository produk tugas akhir yang dapat menyimpan dan mendeploy hasil dari tugas akhir mahasiswa"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Mhs">Mahasiswa</label>
                        <input type="text" name="description" class="form-control" value="Joseph Parker" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Tahun">Tahun</label>
                        <input type="text" name="desc" class="form-control" Value="03 Oct, 2021" readonly>
                    </div>

                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Tutup</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- add Modal -->
    <div class="modal fade" id="showModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="#" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="mb-3">
                            <label for="Description">Judul</label>
                            <input type="text" name="desc" class="form-control" id="#" required>
                        </div>
                        <div class="mb-3">
                            <label for="description">Deskripsi</label>
                            <input type="text" name="description" class="form-control" id="#" required>
                        </div>
                        <div class="mb-3">
                            <label for="Description">Front-End</label>
                            <input type="text" name="desc" class="form-control" id="#" required>
                        </div>
                        <div class="mb-3">
                            <label for="Description">Backend-End</label>
                            <input type="text" name="desc" class="form-control" id="#" required>
                        </div>
                        <div class="mb-3">
                            <label for="Description">Database</label>
                            <input type="text" name="desc" class="form-control" id="#" required>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn1 btn-success" id="add-btn">Mengajukan </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
        </script>
        @endsection