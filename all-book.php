<?php include 'inc/user-header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">All Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">All Book</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <h3 class="card-title">All Book List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="all_book_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>ISBN No.</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>No. of Copy</th>
                                        <th>Status</th>
                                        <th>Added On</th>
                                    </tr>
                                </thead>
                                <tbody id="all_book_table_body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>ISBN No.</th>
                                        <th>Category</th>
                                        <th>Author</th>
                                        <th>No. of Copy</th>
                                        <th>Status</th>
                                        <th>Added On</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'inc/footer.php'; ?>