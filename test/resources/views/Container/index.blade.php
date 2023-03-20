@extends('layout')

@section('content')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Container</h4>
                <div class="flex-shrink-0">
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div id="Container">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn1 waves-effect waves-light edit-btn" data-bs-toggle="modal"
                                    id="create-btn" data-bs-target="#showModal"><i
                                        class="ri-add-line align-bottom me-1"></i>
                                    Add</button>
                            </div>
                        </div>
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
                                    <th class="sort" data-sort="name">Name</th>
                                    <th class="sort" data-sort="student_id">Student ID</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                
                                <tr>
                                   
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ2101</a></td>
                                    <td class="no">1</td>
                                    <td class="name">Meliska</td>
                                    <td class="student_id">1941720020</td>
                                    <td class="status">Enable</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-warning edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#showEditModal">Edit</button>
                                            </div>
                                            <div class="edit">
                                                <button class="btn btn-sm btn-warning edit-item-btn"
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

                                <!-- edit Modal -->
                                <div class="modal fade" id="#showEditModal" tabindex=" -1"
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
                                                        <label for="Tim">Nama Tim</label>
                                                        <input type="text" name="Tim" class="form-control"
                                                            id="Tim" "required>

                                                    </div>
                                                    
                                                    <div class=" modal-footer">
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <button type="button" class="btn2 btn-light"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn1 btn-success"
                                                                id="edit-btn">Update</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> 
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
                <form method="post" action="#" enctype="multipart/form-data"
                    id="myForm">
                    @csrf
                    <div class="mb-3">
                        <label for="Description">Title</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
                    </div>
                    <div class="mb-3">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="#"required>
                    </div>
                    <div class="mb-3">
                        <label for="Description">Front-End</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
                    </div>
                    <div class="mb-3">
                        <label for="Description">Backend-End</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
                    </div>
                    <div class="mb-3">
                        <label for="Description">Database</label>
                        <input type="text" name="desc" class="form-control" id="#"required>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn2 btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn1 btn-success" id="add-btn">Request </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  @endsection