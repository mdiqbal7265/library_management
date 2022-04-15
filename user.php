<?php include 'inc/header.php'; ?>

<?php include 'inc/main_sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <h3 class="card-title">User List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="user_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>User Unique ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Address</th>
                                        <th>Email Verified</th>
                                        <th>Status</th>
                                        <th>Created On</th>
                                        <th>Updated On</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="user_table_body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>User Unique ID</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Contact No.</th>
                                        <th>Address</th>
                                        <th>Email Verified</th>
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





<?php include 'inc/footer.php' ?>;