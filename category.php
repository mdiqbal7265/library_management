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
                    <h1 class="m-0">Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Category</li>
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
                            <h3 class="card-title">Category List</h3>
                            <a href="#" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#add_category_modal"><i class="fa fa-plus-circle"></i>&nbsp;Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="category_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="category_table_body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Category Name</th>
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
<div class="modal fade" id="add_category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="category_add_form">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="text" class="form-control" placeholder="Enter Category Name" name="category_name">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="category_status">
                            <label class="custom-control-label" for="customSwitch3">Enable</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Add Category" class="btn btn-primary" id="category_add_btn">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Category Add Modal -->

<!-- Category Edit Modal -->

<div class="modal fade" id="edit_category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="category_edit_form">
                    <div class="form-group">
                        <label for="category_name">Category Name</label>
                        <input type="hidden" name="id" id="id" value="">
                        <input type="text" class="form-control" id="category_name" name="category_name">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="customSwitch4" name="category_status">
                            <label class="custom-control-label" for="customSwitch4">Enable</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">                
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" value="Update Category" class="btn btn-primary" id="category_update_btn">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Category Edit Modal -->


<?php include 'inc/footer.php' ?>;