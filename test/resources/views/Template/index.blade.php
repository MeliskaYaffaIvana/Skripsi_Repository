@extends('layout')

@section('content')
<!-- partial -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Template</h4>
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
                                        <th>Nama Template</th>
                                        <th>Kategori</th>
                                        <th>Versi</th>
                                        <th>Status Job</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($template as $template)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $template->nama_template}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            @foreach($kategori as $kat)
                                            @if($kat->id ==$template->id_kategori)
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $kat->kategori}}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $template->versi }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">
                                                    @if ($template->status_job ==0)
                                                    Masuk Antrian
                                                    @elseif ($template->status_job ==1)
                                                    Dalam Proses
                                                    @elseif ($template->status_job ==2)
                                                    Selesai
                                                    @else
                                                    Failed
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $template->tgl_dibuat }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $template->tgl_selesai }}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn-sm btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                                                <div class="dropdown-menu dropdownmenu-secondary">
                                                    <div class="edit">
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#showEditModal{{$template->id}}">Edit</a>
                                                    </div>
                                                    <div class="remove">
                                                        <form action="{{ route('Template.destroy', $template->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#deleteRecordModal">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- edit Modal -->
                                    <div class="modal fade" id="showEditModal{{$template->id}}" tabindex=" -1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-light p-3">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close" id="close-modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post"
                                                        action="{{ route('template.update', $template->id) }}"
                                                        enctype="multipart/form-data" id="myForm">
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="nama_template">Nama Template</label>
                                                            <input type="text" name="nama_template" class="form-control"
                                                                id="nama_template"
                                                                value="{{ $template->nama_template }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="id_kategori">Kategori</label>
                                                            <select name="id_kategori" class="form-control"
                                                                id="id_kategori">
                                                                @foreach($kategori as $kat)
                                                                <option value="{{$kat->id}}">{{"$kat->kategori"}}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="versi">Versi</label>
                                                            <input type="text" name="versi" class="form-control"
                                                                id="versi" value="{{ $template->versi }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="link_template">Link Template</label>
                                                            <input type="text" name="link_template" class="form-control"
                                                                id="link_template"
                                                                value="{{ $template->link_template }}" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="default_dir">Default DIR</label>
                                                            <input type="text" name="default_dir" class="form-control"
                                                                id="default_dir" value="{{ $template->default_dir }}"
                                                                required>
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
                <form method="post" action="{{route('Template.store')}}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_template">Nama Template</label>
                        <input type="text" name="nama_template" class="form-control" id="nama_template" required>
                    </div>
                    <div class="mb-3">
                        <label for="id_kategori">Kategori</label>
                        <select name="id_kategori" class="form-control" id="id_kategori">
                            @foreach($kategori as $kat)
                            <option value="{{$kat->id}}">{{"$kat->kategori"}}
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="versi">Versi</label>
                        <input type="text" name="versi" class="form-control" id="versi" required>
                    </div>
                    <div class="mb-3">
                        <label for="link_template">Link Template</label>
                        <input type="text" name="link_template" class="form-control" id="link_template" required>
                    </div>
                    <div class="mb-3">
                        <label for="default_dir">Default DIR</label>
                        <input type="text" name="default_dir" class="form-control" id="default_dir" required>
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