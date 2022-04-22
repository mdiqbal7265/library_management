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
                    <h1 class="m-0">Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Setting</li>
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
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Setting</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <form action="#" method="post" id="setting_update_form">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="library_name">Library Name</label>
                                            <input type="text" class="form-control" id="library_name" name="library_name" value="<?= $setting['library_name'] ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="library_contact_no">Library Contact No</label>
                                            <input type="text" class="form-control" id="library_contact_no" name="library_contact_no" value="<?= $setting['library_contact_number'] ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="library_total_book_issue_day">Total Book Issue Per Day</label>
                                            <input type="number" class="form-control" id="library_total_book_issue_day" name="library_total_book_issue_day" value="<?= $setting['library_total_book_issue_day'] ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="library_issue_total_book_per_user">Total Book Issue Per User</label>
                                            <input type="number" class="form-control" id="library_issue_total_book_per_user" name="library_issue_total_book_per_user" value="<?= $setting['library_issue_total_book_per_user'] ?>" required>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="library_address">Library Address</label>
                                            <textarea class="form-control" id="library_address" name="library_address" rows="1" required><?= $setting['library_address'] ?></textarea>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="library_email_address">Library Email address</label>
                                            <input type="email" class="form-control" id="library_email_address" name="library_email_address" value="<?= $setting['library_email_address'] ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="library_one_day_fine">One Day Fine (For Late Return)</label>
                                            <input type="number" class="form-control" id="library_one_day_fine" name="library_one_day_fine" value="<?= $setting['library_one_day_fine'] ?>" required>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="library_currency">Currency <code>&nbsp;&nbsp;&nbsp;For Example: (USD, BDT, INR, PKR, CNY)</code></label>
                                            <input type="text" class="form-control" id="library_currency" name="library_currency" value="<?= $setting['library_currency'] ?>" required>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" value="Update Setting" class="btn btn-info float-right" id="setting_update_btn">
                            </div>
                        </form>
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