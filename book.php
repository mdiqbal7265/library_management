<?php include 'inc/header.php'; ?>
<?php if(isset($_SESSION['user_type']) && $_SESSION['user_type'] != 'Admin'){ header('Location: index.php'); } ?>
<?php include 'inc/main_sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Book</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Book List</h3>
                            <a href="#" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#add_book_modal"><i class="fa fa-plus-circle"></i>&nbsp;Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="book_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>ISBN No.</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Location Rack</th>
                                        <th>No. of Copy</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="book_table_body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>ISBN No.</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>Location Rack</th>
                                        <th>No. of Copy</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Category Add Modal -->
<div class="modal fade" id="add_book_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="book_add_form">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="author_name">Book Name</label>
                                <input type="text" class="form-control" placeholder="Enter Book Name" name="book_name">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Select Author</label>
                                <select class="form-control select2 select2-danger" name="book_author" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php foreach ($author as $v) : ?>
                                        <option value="<?= $v['author_name'] ?>"><?= $v['author_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control select2 select2-danger" name="book_category" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php foreach ($category as $v) : ?>
                                        <option value="<?= $v['category_name'] ?>"><?= $v['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Select Location Rack</label>
                                <select class="form-control select2 select2-danger" name="book_location_rack" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php foreach ($location_rack as $v) : ?>
                                        <option value="<?= $v['location_rack_name'] ?>"><?= $v['location_rack_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="author_name">Book ISBN Number</label>
                                <input type="text" class="form-control" placeholder="Enter Book ISBN Number" name="book_isbn_number">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="author_name">No. of Copy</label>
                                <input type="text" class="form-control" placeholder="Enter Book No of Copy" name="book_no_of_copy">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="book_status">
                            <label class="custom-control-label" for="customSwitch3">Status (Enable- green / Disable- red)</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Add Book" class="btn btn-primary" id="book_add_btn">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Category Add Modal -->

<!-- Category Edit Modal -->

<div class="modal fade" id="edit_book_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="edit_book_form">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id">
                                <label for="book_name">Book Name</label>
                                <input type="text" class="form-control" id="book_name" placeholder="Enter Book Name" name="book_name">
                            </div>
                        </div>
                        <div class="col-6">                            
                            <div class="form-group">
                                <label>Select Author</label>
                                <span class="badge badge-success" id="book_author_badge"></span>
                                <select class="form-control select2 select2-danger" id="book_author" name="book_author" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php foreach ($author as $v) : ?>
                                        <option value="<?= $v['author_name'] ?>"><?= $v['author_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Select Category</label>
                                <span class="badge badge-success" id="book_category_badge"></span>
                                <select class="form-control select2 select2-danger" id="book_category" name="book_category" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php foreach ($category as $v) : ?>
                                        <option value="<?= $v['category_name'] ?>"><?= $v['category_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Select Location Rack</label>
                                <span class="badge badge-success" id="book_location_rack_badge"></span>
                                <select class="form-control select2 select2-danger" id="book_location_rack" name="book_location_rack" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                    <?php foreach ($location_rack as $v) : ?>
                                        <option value="<?= $v['location_rack_name'] ?>"><?= $v['location_rack_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="author_name">Book ISBN Number</label>
                                <input type="text" class="form-control" id="book_isbn_number" placeholder="Enter Book ISBN Number" name="book_isbn_number">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="author_name">No. of Copy</label>
                                <input type="text" class="form-control" placeholder="Enter Book No of Copy" id="book_no_of_copy" name="book_no_of_copy">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4" name="book_status">
                            <label class="custom-control-label" for="customSwitch4">Status (Enable- green / Disable- red)</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Update Book" class="btn btn-primary" id="update_book_btn">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Category Edit Modal -->


<?php include 'inc/footer.php' ?>;