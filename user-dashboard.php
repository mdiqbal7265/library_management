<?php include 'inc/user-header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <?php if($user['user_verification_status'] == 'No'): ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                Your Email isn't verified. Please Verify Your Email Otherwise you don't available For Issued Book. We Send verification link in your registered email. Please Check your registered email.
            </div>
            <?php endif; ?>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Last Issue Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Last Issue Book</li>
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
                            <h3 class="card-title">Last Issue Book List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="last_issue_book_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Book ISBN Number</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                        <th>Late Return Fines</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="last_issue_book_table_body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Book ISBN Number</th>
                                        <th>Book Name</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                        <th>Late Return Fines</th>
                                        <th>Status</th>
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