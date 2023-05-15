@extends('layout')

@section('content')
<style>
.form-input {
    display: none;
}

.form {
    display: none;
}
</style>
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
                                        <th>Nama Kontainer</th>
                                        <th>Template</th>
                                        <!-- <th>Mahasiswa</th> -->
                                        <th>Aksi</th>

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
                                            @foreach($template as $temp)
                                            @if($temp->id ==$container->id_template)
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $temp->nama_template}}</div>
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                        <!-- <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->id_user }}</div>
                                            </div>
                                        </td> -->
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn-sm btn-info dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">Aksi</button>
                                                <div class="dropdown-menu dropdownmenu-secondary">
                                                    <div class="edit">
                                                        <a class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#showEditModal{{$container->id}}">Edit</a>
                                                        <div class="remove">
                                                            <form
                                                                action="{{ route('Container.destroy', $container->id) }}"
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
                                                                <input type="text" name="nama_kontainer"
                                                                    class="form-control" id="nama_kontainer"
                                                                    value="{{ $container->nama_kontainer }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_template">Template</label>
                                                                <select name="id_template" class="form-control"
                                                                    id="id_template" required>
                                                                    @foreach($template as $temp)
                                                                    <option value="{{ $temp->id }}">
                                                                        {{ $temp->nama_template }}</option>
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
                                            @endif
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
                <form method="post" action="{{ route('Container.store') }}" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <input name="dibuat_oleh" type="text" class="form-control" id="dibuat_oleh" value="{{$users->nama}}"
                        readonly hidden>
                    <div class="form-group">
                        <label>1. Database </label>
                        <input type="radio" name="choice" value="yes" onclick="showForm()" required> Yes
                        <input type="radio" name="choice" value="no" onclick="hideForm()" required> No

                        <div id="formInput" class="form-input">

                        </div><br>
                        <label>2. Fronted, Backend </label>
                        <input type="radio" name="pilihan" value="gabung" onclick="show1()" required> Gabung
                        <input type="radio" name="pilihan" value="pisah" onclick="show2()" required> Pisah

                        <div id="form1" class="form1">
                            <!-- <div class="mb-3">
                                <label for="nama_kontainer"> Nama Kontainer</label>
                                <input type="text" name="container[2][nama_kontainer]" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="id_template">Item Template</label>
                                <select name="container[2][id_template]" class="form-control">
                                    <option value="">Pilih template</option>
                                    @foreach($template as $temp)
                                    <option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>
                                    @endforeach
                                </select>
                            </div> -->
                        </div><br>
                        <div id="form2" class="form2" style="display:none">
                            <!-- <div class="mb-3">
                                <label for="nama_kontainer"> Nama Kontainer</label>
                                <input type="text" name="container[2][nama_kontainer]" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="id_template">Item Template</label>
                                <select name="container[2][id_template]" class="form-control">
                                    <option value="">Pilih template</option>
                                    @foreach($template as $temp)
                                    <option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_kontainer"> Nama Kontainer</label>
                                <input type="text" name="container[3][nama_kontainer]" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="id_template">Item Template</label>
                                <select name="container[3][id_template]" class="form-control">
                                    <option value="">Pilih template</option>
                                    @foreach($template as $temp)
                                    <option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div><br> -->
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
    $(document).ready(function() {
        $('#example').DataTable();
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script>
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

                        $('#form1').append(html);
                    }
                } else if (jumlahForm < currentFormCount) {
                    for (var i = currentFormCount; i > jumlahForm; i--) {
                        $('#row' + i).remove();
                        count--;
                    }
                }
            });
        });
    


</script> -->
    <script>
    function validateForm() {
        var radios = document.getElementsByName('choice');
        var formInput = document.getElementById('formInput');

        // Periksa apakah salah satu radio button dipilih
        var isRadioSelected = false;
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                isRadioSelected = true;
                break;
            }
        }

        // Jika radio button dipilih, tampilkan formInput
        if (isRadioSelected) {
            formInput.style.display = 'block';
        } else {
            formInput.style.display = 'none';
        }
    }

    function showForm() {
        var formInput = document.getElementById("formInput");
        formInput.style.display = "block";

        var html = '<div class="form-group" id="row">';
        html += '<div class="mb-3">';
        html += '<label for="nama_kontainer">Nama Kontainer</label>';
        html += '<input type="text" name="container[1][nama_kontainer]" class="form-control" required>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="id_template">Template</label>';
        html += '<select name="container[1][id_template]" class="form-control" required>';
        html += '<option value="">Pilih Template</option>';
        @foreach($template as $temp)
        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
        @endforeach
        html += '</select>';
        html += '</div>';
        $('#formInput').html(html);
    }

    function hideForm() {
        var formInput = document.getElementById("formInput");
        formInput.style.display = "none";
    }

    function show1() {


        var form1 = document.getElementById("form1"); {

            var html = '<div class="form-group" id="row">';
            html += '<div class="mb-3">';
            html += '<label for="nama_kontainer">Nama Kontainer</label>';
            html += '<input type="text" name="container[2][nama_kontainer]" class="form-control" required>';
            html += '</div>';
            html += '<div class="mb-3">';
            html += '<label for="id_template">Template</label>';
            html += '<select name="container[2][id_template]" class="form-control" required>';
            html += '<option value="">Pilih Template</option>';
            @foreach($template as $temp)
            html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
            @endforeach
            html += '</select>';
            html += '</div>';

            form1.style.display = "block";
            form2.style.display = "none";
            $('#form1').html(html);

        }
    }

    function show2() {
        var form2 = document.getElementById("form2");

        var html = '<div class="form-group" id="row">';
        html += '<div class="mb-3">';
        html += '<label for="nama_kontainer">Nama Kontainer</label>';
        html += '<input type="text" name="container[2][nama_kontainer]" class="form-control" required>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="id_template">Template</label>';
        html += '<select name="container[2][id_template]" class="form-control" required>';
        html += '<option value="">Pilih Template</option>';
        @foreach($template as $temp)
        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
        @endforeach
        html += '</select>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="nama_kontainer">Nama Kontainer</label>';
        html += '<input type="text" name="container[3][nama_kontainer]" class="form-control" required>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="id_template">Template</label>';
        html += '<select name="container[3][id_template]" class="form-control" required>';
        html += '<option value="">Pilih Template</option>';
        @foreach($template as $temp)
        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
        @endforeach
        html += '</select>';
        html += '</div>';

        form2.style.display = "block";
        form1.style.display = "none";
        $('#form2').html(html);

    }
    </script>
    @endsection