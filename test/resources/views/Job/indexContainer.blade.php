@extends('layout')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Pekerjaan Kontainer</h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="Container">
                    <table id="example" class="table " style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Container</th>
                <th>Nama Mahasiswa</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Kontainer 1</td>
                <td>Tiger Nixon</td>
                <td>Selesai</td>
            </tr>
            <tr>
               <td>2</td>
                <td>Kontainer 2</td>
                <td>Meliska</td>
                <td>Proses</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kontainer 3</td>
                <td>Yaffa</td>
                <td>Tertunda</td>
            </tr>
            <tr>
               <td>4</td>
                <td>Kontainer 4</td>
                <td>Ivana</td>
                <td>Selesai</td>
            </tr>
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
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

  @endsection