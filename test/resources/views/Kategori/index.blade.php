@extends('layout')

@section('content')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Kategori</h4>
                        <div class="flex-shrink-0">
                        </div>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="Container">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light edit-btn"
                                            data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i>
                                            Tambah</button>
                                    </div>
                                </div>
                            </div>
                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori as $kat)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kat->id }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kat->kategori }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="edit">
                                                    <a class="btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showEditModal{{$kat->id}}"><i
                                                            class="ri-edit-2-line"></i></a>
                                                </div>
                                                <div class="remove">
                                                    <form action="{{ route('Kategori.destroy', $kat->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger btn-icon waves-effect waves-light"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal"><i
                                                                class="mdi mdi-delete-outline"></i></button>
                                                    </form>
                                                </div>
                                            </div>
                        </div>
                        </td>
                        </tr>
                        <!-- edit Modal -->
                        <div class="modal fade" id="showEditModal{{ $kat->id }}" tabindex=" -1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-light p-3">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close" id="close-modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" action="{{ route('kategori.update', $kat->id) }}"
                                            enctype="multipart/form-data" id="myForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="kategori">Kategori</label>
                                                <input type="text" name="kategori" class="form-control" id="kategori"
                                                    value="{{ $kat->kategori }}" required>
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
<!-- container-scroller -->
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
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
                <form method="post" action="{{route('Kategori.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" class="form-control" id="kategori" required>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn1 btn-success" id="add-btn">Simpan </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection