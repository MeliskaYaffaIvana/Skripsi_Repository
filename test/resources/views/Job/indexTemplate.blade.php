@extends('layout')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Pekerjaan Template </h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="Container">
                    <table id="example" class="table " style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Template</th>
                <th>Versi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>PHP</td>
                <td>8</td>
                <td>Enable</td>
            </tr>
            <tr>
               <td>2</td>
                <td>MySQL</td>
                <td>6</td>
                <td>Disable</td>
            </tr>
            <tr>
                <td>3</td>
                <td>PostgreSQL</td>
                <td>12</td>
                <td>enable</td>
            </tr>
            <tr>
               <td>4</td>
                <td>Python</td>
                <td>12</td>
                <td>disable</td>
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