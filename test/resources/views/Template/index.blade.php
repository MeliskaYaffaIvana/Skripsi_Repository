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
                                <button type="button" class="btn btn-success waves-effect waves-light edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Tambah</button>
                            </div>
                        </div>
                    </div><table id="example" class="table " style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Template</th>
                <th>Kategori</th>
                <th>Versi</th>
                 <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>PHP</td>
                <td>Bahasa Pemrograman</td>
                <td>10</td>
                 <th>Enable</th>
                <td>
                                        <div class="btn-group">
                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu dropdownmenu-secondary">
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
                                    </td>
            </tr>
            <tr>
                <td>2</td>
                <td>MySQL</td>
                <td>Database</td>
                <td>8</td>
                 <th>Disable</th>
                <td>
                                  <div class="btn-group">
                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu dropdownmenu-secondary">
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
                                    </td>
            </tr>
            <tr>
                <td>3</td>
                <td>PostgreSQL</td>
                <td>Database</td>
                <td>12</td>
                 <th>Disable</th>
                <td>
                    <div class="btn-group">
                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu dropdownmenu-secondary">
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
                                    </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Python</td>
                <td>Bahasa Pemrograman</td>
                <td>22</td>
                 <th>Enable</th>
                <td>
                    <div class="btn-group">
                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu dropdownmenu-secondary">
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
                                    </td>
            </tr>
           
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
                                                <form method="post"
                                                    action="#"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                        <label for="nama">Nama Template</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <select name="bulan" class="form-control" id="kategori">
                                                <option>Bahasa Pemrograman</option>
                                                <option>Database</option>
                                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="versi">Versi</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
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
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
 <!-- add Modal -->
 <div class="modal fade" id="#showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Add</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama">Nama Template</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori">Kategori</label>
                        <select name="bulan" class="form-control" id="kategori">
                                                <option>Bahasa Pemrograman</option>
                                                <option>Database</option>
                                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="versi">Versi</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
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