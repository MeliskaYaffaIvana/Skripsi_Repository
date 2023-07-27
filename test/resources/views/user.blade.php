@extends('layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Daftar Pengguna</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                <button type="button" class="btn btn-success waves-effect waves-light edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Tambah</button>
                            </div>
                                </div>
                            </div>
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIM </th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $user->nim}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $user->judul}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $user->deskripsi}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $user->status}}</div>
                                            </div>
                                        </td>
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
                            <div class="modal fade" id="showEditModal" tabindex=" -1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <!-- add Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data" id="myForm">
                        @csrf
                        <div class="mb-3">
                            <label for="nim">NIM</label>
                            <input type="text" name="nim" class="form-control" id="nim" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="judul">Judul <i style="font-weight: normal;">Bisa dikosongkan<i/></label>
                            <input type="text" name="judul" class="form-control" id="judul" >
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi">Deskripsi <i style="font-weight: normal;">Bisa dikosongkan<i/></label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" >
                        </div>
                        <div class="mb-3">
                            <label for="password">Password <i style="font-weight: normal;">Minimal 6 karakter<i/></label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="modal-footer">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn1 btn-success" id="add-btn">Tambah User </button>
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