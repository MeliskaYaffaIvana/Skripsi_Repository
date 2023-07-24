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
                                            <div class="d-flex gap-2">
                                                <div class="bolehkan">
                                                    <form
                                                        action="{{ route('template.update_bolehkan', $template->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if ($template->bolehkan == 0)
                                                        <button type="submit" name="bolehkan"
                                                            class="dropdown-item icon-off" value="1"> <i
                                                                class="fas fa-toggle-off"></i></button>
                                                        @elseif ($template->bolehkan == 1)
                                                        <button type="submit" name="bolehkan"
                                                            class="dropdown-item icon-on" value="0"> <i
                                                                class="fas fa-toggle-on"></i></button>
                                                        @endif
                                                    </form>
                                                </div>

                                                <div class=" edit">
                                                    <a class="btn btn-sm btn-success edit-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#showEditModal{{$template->id}}"><i
                                                            class="ri-edit-2-line"></i></a>
                                                </div>
                                                <div class="remove">
                                                    <form action="{{ route('Template.destroy', $template->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger btn-icon waves-effect waves-light"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#deleteRecordModal"><i
                                                                class="mdi mdi-delete-outline"></i></a></button>
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
                                        <form method="post" action="{{ route('template.update', $template->id) }}"
                                            enctype="multipart/form-data" id="myForm">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="nama_template">Nama Template</label>
                                                <input type="text" name="nama_template" class="form-control"
                                                    id="nama_template" value="{{ $template->nama_template }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="id_kategori">Kategori</label>
                                                <select name="id_kategori" class="form-control" id="id_kategori">
                                                    @foreach($kategori as $kat)
                                                    @if($kat->id == $template->id_kategori)
                                                    <option value="{{$kat->id}}">{{"$kat->kategori"}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="versi">Versi</label>
                                                <input type="text" name="versi" class="form-control" id="versi"
                                                    value="{{ $template->versi }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="link_template">Link Template</label>
                                                <input type="text" name="link_template" class="form-control"
                                                    id="link_template" value="{{ $template->link_template }}" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="default_dir">Default DIR</label>
                                                <input type="text" name="default_dir" class="form-control"
                                                    id="default_dir" value="{{ $template->default_dir }}" required
                                                    readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="port">Port</label>
                                                <input type="text" name="port" class="form-control" id="port"
                                                    value="{{ $template->port }}" required readonly>
                                            </div>
                                            @if($template->id_kategori == "KT001")
                                            <div class="field-container" id="env_template">
                                                <div class="mb-3">
                                                    <label for="usertmp">User TMP</label>
                                                    <input type="text" name="usertmp" class="form-control" id="usertmp"
                                                        value="{{ isset($template->env_template) ? json_decode($template->env_template)->usertmp : '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="passtmp">Password TMP</label>
                                                    <input type="text" name="passtmp" class="form-control" id="passtmp"
                                                        value="{{ isset($template->env_template) ? json_decode($template->env_template)->passtmp : '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="rootpasstmp">Root Password TMP</label>
                                                    <input type="text" name="rootpasstmp" class="form-control"
                                                        id="rootpasstmp"
                                                        value="{{ isset($template->env_template) ? json_decode($template->env_template)->rootpasstmp : '' }}"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="dbtmp">Database TMP</label>
                                                    <input type="text" name="dbtmp" class="form-control" id="dbtmp"
                                                        value="{{ isset($template->env_template) ? json_decode($template->env_template)->dbtmp : '' }}"
                                                        required>
                                                </div>
                                            </div>
                                    </div>
                                    @endif
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
var toggleButtons = document.querySelectorAll('.toggle-bolehkan');

toggleButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var id = button.getAttribute('data-container');
        axios.put('/Template/' + id + '/toggle-bolehkan')
            .then(function(response) {
                var statusElement = document.getElementById('bolehkan' + id);
                if (statusElement.innerText === 'Enable') {
                    statusElement.innerText = 'Disable';
                } else {
                    statusElement.innerText = 'Enable';
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    });
});
</script>
<!-- add Modal 
-->
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
                        <label for="id_kategori" class="kategori">Kategori</label>
                        <select name="id_kategori" class="form-control" id="id_kategori"
                            onchange="updateField(this.value)">
                            <option value="0">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                            <option value="{{ $kat->id}}">{{ $kat->kategori }}</option>
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
                    <div class="mb-3">
                        <label for="port">Port</label>
                        <input type="text" name="port" class="form-control" id="port" required>
                    </div>
                    <div class="field-container kategori-KT001" id="env_template" style="display:none; ">
                        <div class="mb-3">
                            <label for="usertmp">User TMP</label>
                            <input type="text" name="usertmp" class="form-control" id="usertmp">
                        </div>
                        <div class="mb-3">
                            <label for="passtmp">Password TMP</label>
                            <input type="text" name="passtmp" class="form-control" id="passtmp">
                        </div>
                        <div class="mb-3">
                            <label for="rootpasstmp">Root Password TMP</label>
                            <input type="text" name="rootpasstmp" class="form-control" id="rootpasstmp">
                        </div>
                        <div class="mb-3">
                            <label for="dbtmp">Database TMP</label>
                            <input type="text" name="dbtmp" class="form-control" id="dbtmp">
                        </div>
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
</div>
<!-- Add more field containers for other categories as needed... -->

<script>
function updateField(selectedValue) {
    // Check the selected ID_kategori value
    console.log("Selected ID_kategori: " + selectedValue);

    // Hide all field containers first
    hideAllFieldContainers();

    // Show the field container based on the selected category
    var fieldContainer = document.querySelector('.kategori-' + selectedValue);
    if (fieldContainer) {
        fieldContainer.style.display = "block";
    }
    // Hide the KT004 field container if the selected category is not KT004
    var kt001FieldContainer = document.querySelector('.kategori-KT001');
    if (selectedValue !== "KT001" && kt001FieldContainer) {
        kt001FieldContainer.style.display = "none";
        // Set nilai input field 'usertmp', 'passtmp', dan 'rootpasstmp' menjadi null
        document.getElementById('usertmp').setAttribute('value', null);
        document.getElementById('passtmp').setAttribute('value', null);
        document.getElementById('rootpasstmp').setAttribute('value', null);
        document.getElementById('dbtmp').setAttribute('value', null);
    }
    return true;
}

function hideAllFieldContainers() {
    var allFieldContainers = document.querySelectorAll('[class^="kategori-"]');
    allFieldContainers.forEach(function(container) {
        container.style.display = "none";
    });
}
</script>


@endsection