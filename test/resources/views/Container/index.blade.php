@extends('layout')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Kontainer</h4>
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
                <th>Nama Kontainer</th>
                <th>Template</th>
                <th>Mahasiswa</th>
                <th>Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($container as $container)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">{{ $container->nama_kontainer}}</div>
                    </div>
                </td>
                <td>
                    @foreach($template as $temp)
                    @if($temp->id ==$container->id_template)
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">{{ $temp->nama_template}}</div>
                    </div>
                    @endif
                    @endforeach
                </td>
                <td>
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">{{ Auth::user()->nama }}</div>
                    </div>
                </td>
                <td>
                                        <div class="btn-group">
                            <button type="button" class="btn-sm btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                            <div class="dropdown-menu dropdownmenu-secondary">
                                 <div class="edit">
                                                <a class="dropdown-item"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showEditModal{{$container->id}}">Edit</a>
                                                <div class="remove">
                                                        <form action="{{ route('Container.destroy', $container->id) }}" method="POST">
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

                                <!-- edit Modal  -->
                                <div class="modal fade" id="showEditModal{{$container->id}}" tabindex=" -1"
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
                                                    action="{{ route('container.update', $container->id) }}"
                                                    enctype="multipart/form-data" id="myForm">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="nama_kontainer">Nama kontainer</label>
                                                        <input type="text" name="nama_kontainer" class="form-control" id="nama_kontainer" value="{{ $container->nama_kontainer }}"required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="id_template">Template</label>
                                                        <select  name="id_template" class="form-control" id="id_template"required>
                                                        @foreach($template as $temp)
                                                            <option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>
                                                        @endforeach
                                                    </select>
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
                <form method="post" action="{{ route('Container.store') }}" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <div class="form-group">
                        <div class="mb-3">
                        <label for="jumlah-form">Jumlah Form</label>
                        <select id="jumlah-form" class="form-control" required>
                            <option value="">Pilih Jumlah Form</option>
                            <option value="2">2 Forms</option>
                            <option value="3">3 Forms</option>
                        </select>
                    </div>
                    </div>
                    <div id="item-container">
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="nama_kontainer"> Nama Kontainer</label>
                                <input type="text" name="container[1][nama_kontainer]" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="id_template">Item Template</label>
                                <select name="container[1][id_template]" class="form-control" required>
                                    <option value="">Pilih template</option>
                                    @foreach($template as $temp)
                                        <option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn1 btn-success" id="myForm">Mengajukan </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var count = 1;

            $(document).on('change', '#jumlah-form', function() {
                var jumlahForm = parseInt($(this).val());
                var currentFormCount = $('.form-group').length - 1; // Kurangi satu karena form pertama tidak dihitung

                if (jumlahForm > currentFormCount) {
                    for (var i = currentFormCount; i < jumlahForm; i++) {
                        count++;
                        var html = '<div class="form-group" id="row' + count + '">';
                        html += '<div class="mb-3">';
                        html += '<label for="nama_kontainer">Nama Kontainer</label>';
                        html += '<input type="text" name="container[' + count + '][nama_kontainer]" class="form-control" required>';
                        html += '</div>';
                        html += '<div class="mb-3">';
                        html += '<label for="id_template">Template</label>';
                        html += '<select name="container[' + count + '][id_template]" class="form-control" required>';
                        html += '<option value="">Pilih Template</option>';
                        @foreach($template as $temp)
                        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
                        @endforeach
                        html += '</select>';
                        html += '</div>';



                        html += '</div>';

                        $('#item-container').append(html);
                    }
                } else if (jumlahForm < currentFormCount) {
                    for (var i = currentFormCount; i > jumlahForm; i--) {
                        $('#row' + i).remove();
                        count--;
                    }
                }
            });
        });
    


</script>
  @endsection