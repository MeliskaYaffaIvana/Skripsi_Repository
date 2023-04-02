<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">


<!-- Mirrored from themesbrand.com/velzon/html/material/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 03:24:11 GMT -->
<head>

    <meta charset="utf-8" />
    <title>List Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/images/favicon.ico">

    <!--datatable css-->
    <link rel="stylesheet" href="{{ asset('assets') }}/cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="{{ asset('assets') }}/cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="{{ asset('assets') }}/cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">


    <!-- Layout config Js -->
    <script src="{{ asset('assets') }}/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="{{ asset('assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets') }}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets') }}/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{ asset('assets') }}/css/custom.min.css" rel="stylesheet" type="text/css" />

  <!-- data table-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> -->
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css"/>

    <style>
      #page-topbar{
        margin-left:-20%;
        padding: 5px 10px;
      }
      .nav-link{
        color:black;
      }
       .modal-title{
            color:#546fab;
        }
        .btn2{
            border: white 3px solid;
    border-radius: 5px;
    padding: 10px 15px;
    margin-top: 5px;
        }
      .footer{
        left:0px;
        height:3px;
        padding-top:5px;
        padding-left:33%;
        text-align:center;
      }
      h3{
			padding-right:55%;
            font-family: sans-serif;
        color:#244282;
      }
      </style>

</head>

<body>

    <!-- Begin page -->

        <header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                            <a href="/home" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('assets') }}/images/logo polinema.png"" alt="" height="80">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('assets') }}/images/logo polinema.png" alt="" height="80">
                                </span>
                            </a>
               
            </div>
            <h3> Sistem Repository Produk Tugas Akhir</h3>
            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle shadow-none" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode shadow-none">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div> -->
                                    <!-- <a href="{{ route('Home.index') }}" class="nav-link"
                                        data-key="t-horizontal">Home</a> -->
                                    <a href="{{ url('login') }}" class="nav-link" data-key="t-detached">Login</a>
            </div>
        </div>
    </div>
</header>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Daftar Produk</h5>
                                </div>
                                <div class="card-body">
                                    <table id="example" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Mahasiswa</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</button>
                                            </div></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>12</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>13</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>14</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>15</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>16</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>17</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
            <tr>
                <td>18</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td><div class="Detail">
                                                <button class="btn btn-sm btn-info edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showDetailModal">Detail</i></button>
                                            </div></td>
            </tr>
           
        </tbody>
    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">&copy;
                    <script>
                    document.write(new Date().getFullYear())
                    </script> JTI Polinema.
                </div>
            </div>
        </div>
    </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
     <!-- Detail Modal -->
<div class="modal fade" id="showDetailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light p-3">
                <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="close-modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="#" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="Judul">Judul</label>
                        <input type="text" name="desc" class="form-control" value="Docker" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="desc">Deskripsi</label>
                        <input type="text" name="desc" class="form-control" value="Sistem repository produk tugas akhir yang dapat menyimpan dan mendeploy hasil dari tugas akhir mahasiswa" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="Mhs">Mahasiswa</label>
                        <input type="text" name="description" class="form-control" value="Joseph Parker" readonly >
                    </div>
                    <div class="mb-3">
                        <label for="Tahun">Tahun</label>
                        <input type="text" name="desc" class="form-control" Value="03 Oct, 2021" readonly>
                    </div>
                    
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Tutup</button>
                           
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets') }}/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets') }}/libs/simplebar/simplebar.min.js"></script>
    <script src="{{ asset('assets') }}/libs/node-waves/waves.min.js"></script>
    <script src="{{ asset('assets') }}/libs/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets') }}/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="{{ asset('assets') }}/js/plugins.js"></script>

    <script src="{{ asset('assets') }}/code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--datatable js-->
    <script src="{{ asset('assets') }}/cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('assets') }}/cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('assets') }}/cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="{{ asset('assets') }}/cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="{{ asset('assets') }}/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="{{ asset('assets') }}/cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="{{ asset('assets') }}/cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
    <!-- App js -->
    <script src="{{ asset('assets') }}/js/app.js"></script>
</body>


<!-- Mirrored from themesbrand.com/velzon/html/material/tables-datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Jul 2022 03:24:14 GMT -->
</html>