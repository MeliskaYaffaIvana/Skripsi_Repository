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

<style>
.form-input {
    display: none;
}

.form {
    display: none;
}

.icon-on {
    color: green;
}

.icon-off {
    color: red;
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
                                    @if(Auth::user()->status == 'mahasiswa')
                                    <div>
                                        <button type="button" class="btn btn-success waves-effect waves-light edit-btn"
                                            data-bs-toggle="modal" id="create-btn" data-bs-target="#showModal"><i
                                                class="ri-add-line align-bottom me-1"></i>
                                            Tambah</button>
                                    </div>
                                    @endif
                                </div>
                            </div>


                            <table id="example" class="table " style="width:100%">
                                <thead>
                                    <tr>
                                         @if(Auth::user()->status == 'administrator')
                                        <th>NIM</th>
                                        @endif
                                        <th>ID Kontainer</th>
                                        <th>Nama Kontainer</th>
                                        <th>Link Kontainer</th>
                                        <th>Port</th>
                                        <th>Template</th>
                                        <th>Status</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($container as $container)
                                    @if($container->id_user == $users->id || $users->status == 'administrator')
                                    <tr>
                                        @if(Auth::user()->status == 'administrator')
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->user->nim}}</div>
                                            </div>
                                        </td>
                                        @endif
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->id}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->nama_kontainer}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @if ($container->template->kategori->kategori == 'frontend')
                                                <div class="flex-grow-1">
                                                    http://produk.pta.jti.polinema.ac.id/{{$container->user->nim}}/fe
                                                </div>
                                                @elseif ($container->template->kategori->kategori == 'backend')
                                                <div class="flex-grow-1">
                                                    http://produk.pta.jti.polinema.ac.id/{{$container->user->nim}}/be
                                                </div>
                                                @elseif ($container->template->kategori->kategori == 'database')
                                                <div class="flex-grow-1">
                                                    http://cmp1.pta.jti.polinema.ac.id:{{$container->port_kontainer}}
                                                </div>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->port_kontainer}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1">{{ $container->template->nama_template}}</div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- <div class="flex-grow-1">{{ $container->id_user }}</div> -->
                                                <span
                                                    id="status{{ $container->id }}">{{ $container->status ? 'Enable' : 'Disable' }}</span>

                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <div class="bolehkan">
                                                    <form
                                                        action="{{ route('container.update_bolehkan', $container->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($container->bolehkan == 0)
                                                        <button type="submit" name="bolehkan"
                                                            class="dropdown-item icon-off" value="1"> <i
                                                                class="fas fa-toggle-off"></i></button>
                                                        @elseif ($container->bolehkan == 1)
                                                        <button type="submit" name="bolehkan"
                                                            class="dropdown-item icon-on" value="0"> <i
                                                                class="fas fa-toggle-on"></i></button>
                                                        @endif
                                                    </form>
                                                </div>
                                                <div class="wetty">
                                                   <a href="{{ route('terminal', ['containerId' => $container->id]) }}" target="_blank">
                                                        <img src="{{ asset('assets') }}/images/shell.png" alt="" height="22">
                                                    </a>
                                                </div>
                                                <!-- <script>
                                                    function openTerminal(url) {
                                                        // Encode URL
                                                        var encodedUrl = encodeURIComponent(url);
                                                        
                                                        // Set URL sumber iframe
                                                        var iframeUrl = 'http://cmp.pta:8181/?command=' + encodedUrl;
                                                        document.getElementById('terminalIframe').src = iframeUrl;
                                                    }
                                                </script> -->
                                                @if(Auth::user()->status == 'mahasiswa')
                                                <div class="remove">
                                                    <form action="{{ route('Container.destroy', $container->id) }}"
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
                                                @endif
                                            </div>
                                        </td>

                                        <!-- edit Modal  -->
                                        <!-- <div class=" modal fade" id="showEditModal{{$container->id}}" tabindex=" -1"
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
                                                                <label for="nama_kontainer">Nama
                                                                    kontainer</label>
                                                                <input type="text" name="nama_kontainer"
                                                                    class="form-control" id="nama_kontainer"
                                                                    value="{{ $container->nama_kontainer }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="id_template">Template</label>
                                                                <select name="id_template" class="form-control"
                                                                    id="id_template" required readonly>
                                                                    @foreach($template as $temp)
                                                                    @if($temp->id ==$container->id_template)
                                                                    <option value="{{ $temp->id }}">
                                                                        {{ $temp->nama_template }}</option>
                                                                    @endif
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
                                            </div> -->
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
                        <input type="radio" name="choice" value="yes" onclick="showForm()" required> Iya
                        <input type="radio" name="choice" value="no" onclick="hideForm()" required> Tidak

                        <div id="formInput" class="form-input">

                        </div><br>
                        <label>2. Fronted & Backend </label>
                        <input type="radio" name="pilihan" value="gabung" onclick="show1()" required> Gabung
                        <input type="radio" name="pilihan" value="pisah" onclick="show2()" required> Pisah
                        <input type="radio" name="pilihan" value="tidak" onclick="hideForm2()" required> Tidak

                        <div id="form1" class="form1">

                        </div><br>
                        <div id="form2" class="form2" style="display:none">

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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
    var toggleButtons = document.querySelectorAll('.toggle-bolehkan');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var id = button.getAttribute('data-container');
            axios.put('/Container/' + id + '/toggle-bolehkan')
                .then(function(response) {
                    var statusElement = document.getElementById('bolehkan' + id);
                    if (statusElement.innerText === 'Running') {
                        statusElement.innerText = 'Exited';
                    } else {
                        statusElement.innerText = 'Running';
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    });
    </script>


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
        // Reset the form input values when showing the section
        formInput.innerHTML = ''; // Clear existing content

        var html = '<div class="form-group" id="row">';
        html += '<div class="mb-3">';
        html += '<label for="nama_kontainer">Nama Kontainer </label>';
        html += '<input type="text" name="container[1][nama_kontainer]" class="form-control" required>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="id_template">Template</label>';
        html += '<select name="container[1][id_template]" class="form-control" required>';
        html += '<option value="">Pilih Template</option>';
        @foreach($template as $temp)
        @if($temp->kategori->kategori === 'database')
        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
        @endif
        @endforeach html +=
            '</select>';
        html += '</div>';
        html += '<label for="username">Username</label>';
        html +=
            '<input type="text" name="container[1][username]" class="form-control" required>';
        html +=
            '</div>';
        html += '<div class="mb-3">';
        html += '<label for="password">Password</label>';
        html +=
            '<input type="password" name="container[1][password]" class="form-control" required>';
        html +=
            '</div>';
        html += '<div class="mb-3">';
        html += '<label for="rootpass">Root Password</label>';
        html +=
            '<input type="password" name="container[1][rootpass]" class="form-control" required>';
        html +=
            '</div>';
        html += '<div class="mb-3">';
        html += '<label for="dbname">Nama Database</label>';
        html +=
            '<input type="text" name="container[1][dbname]" class="form-control" >';
        html += '</div>';
        $(
            '#formInput').html(html);
    }

    function hideForm() {
        var formInput = document.getElementById("formInput");
        formInput.style.display = "none";

        // Reset the form input values when showing the section
        formInput.innerHTML = ''; // Clear existing content
    }

    function show1() {


        var form1 = document.getElementById("form1"); {
            form1.style.display = "block";
            form2.style.display = "none";

            // Reset the form input values when showing the section
            form1.innerHTML = ''; // Clear existing content

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
            @if($temp->kategori->kategori === 'frontend' || $temp->kategori->kategori === 'backend')
            html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
            @endif
            @endforeach
            html += '</select>';
            html += '</div>';


            $('#form1').html(html);

        }
    }

    function show2() {
        var form2 = document.getElementById("form2");
        form2.style.display = "block";
        form1.style.display = "none";

        // Reset the form input values when showing the section
        form2.innerHTML = ''; // Clear existing content

        var html = '<div class="form-group" id="row">';
        html += '<div class="mb-3">';
        html += '<label for="nama_kontainer">Nama Kontainer Frontend</label>';
        html += '<input type="text" name="container[2][nama_kontainer]" class="form-control" required>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="id_template">Template</label>';
        html += '<select name="container[2][id_template]" class="form-control" required>';
        html += '<option value="">Pilih Template</option>';
        @foreach($template as $temp)
        @if($temp->kategori->kategori === 'frontend')
        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
        @endif
        @endforeach
        html += '</select>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="nama_kontainer">Nama Kontainer Backend</label>';
        html += '<input type="text" name="container[3][nama_kontainer]" class="form-control" required>';
        html += '</div>';
        html += '<div class="mb-3">';
        html += '<label for="id_template">Template</label>';
        html += '<select name="container[3][id_template]" class="form-control" required>';
        html += '<option value="">Pilih Template</option>';
        @foreach($template as $temp)
        @if($temp->kategori->kategori === 'backend')
        html += '<option value="{{ $temp->id }}">{{ $temp->nama_template }}</option>';
        @endif
        @endforeach
        html += '</select>';
        html += '</div>';


        $('#form2').html(html);

    }

    function hideForm2() {
        var form1 = document.getElementById("form1");
        var form2 = document.getElementById("form2");
        form1.style.display = "none";
        form2.style.display = "none";
        // Reset the form input values when hiding the section
        form1.innerHTML = ''; // Clear existing content
        form2.innerHTML = ''; // Clear existing content
    }
    </script>
    @endsection