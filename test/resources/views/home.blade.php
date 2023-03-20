@extends('layout')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Dashboard</h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="IndhanTim">
                    <div class="row g-4 mb-3">
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="containerTable">

                            <thead class="table-light">
                                <tr>
                                    <!-- <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll"
                                                value="option">
                                        </div>
                                    </th> -->
                                    <th class="sort" data-sort="no">No</th>
                                    <th class="sort" data-sort="divisi">User</th>
                                    <th class="sort" data-sort="description">Description</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                
                                <tr>
                                   
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ2101</a></td>
                                    <td class="Tim">1</td>
                                    <td class="Tim">Meliska</td>
                                    <td class="Tim">Docker</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showEditModal">Detail</button>
                                            </div>
                                            <div class="remove">

                                                <form action="#"
                                                    method="POST">
                                                    <button type="submit" class="btn btn-sm btn-danger btn-icon waves-effect waves-light"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteRecordModal"><i class="ri-delete-bin-5-line"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                           </tbody>
                        </table>
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Orders We did not find any
                                    orders for you search.</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
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
   @endsection
