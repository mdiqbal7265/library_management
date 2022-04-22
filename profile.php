<?php include 'inc/user-header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <form action="" method="post">
                                    <label for="upload_image">
                                        <img class="profile-user-img img-fluid img-circle" src="assets/dist/img/upload/<?= $user['user_profile'] ?>" alt="<?= $user['user_name'] ?>">
                                        <div class="overlay">
                                            <div class="text">Click to Change Profile Image</div>
                                        </div>
                                        <input type="file" name="profile_image" id="upload_image" class="image" style="display: none;">
                                    </label>
                                </form>

                            </div>

                            <h3 class="profile-username text-center"><?= $user['user_name'] ?></h3>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email:- </b> <a class="float-right"><?= $user['user_email_address'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile:- </b> <a class="float-right"><?= $user['user_contact_no'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Address:- </b> <a class="float-right"><?= $user['user_address'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status:- </b> <a class="float-right"><?= $user['user_verification_status'] == 'Yes' ? '<span class="badge badge-success">Verified</span>' : '<span class="badge badge-danger">Unverified</span>' ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" id="update_profile_form">
                                        <input type="hidden" name="id" value="<?= $user['user_id']; ?>">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="name" name="name" value="<?= $user['user_name']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" name="email" value="<?= $user['user_email_address']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="mobile" class="col-sm-2 col-form-label">Contact No</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $user['user_contact_no']; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="address" name="address"><?= $user['user_address']; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <input type="submit" value="Update" id="update_profile_btn" class="btn btn-danger">
                                                <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane" id="change_password">
                                    <form class="form-horizontal" id="change_password_form">
                                        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">
                                        <div class="form-group row">
                                            <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="old_password" id="old_password" placeholder="old password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="new_password" id="password" placeholder="new password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirm_password" class="col-sm-2 col-form-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="confirm password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <input type="submit" value="Change Password" class="btn btn-danger" id="change_password_btn">
                                                <!-- <button type="submit" class="btn btn-danger">Submit</button> -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Image Upload Modal -->

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crop Image Before Upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <div class="row">
                        <div class="col-md-8">
                            <img src="" id="sample_image" />
                        </div>
                        <div class="col-md-4">
                            <div class="preview"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="crop" class="btn btn-primary">Crop</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<!-- Image Upload Modal -->

<?php include 'inc/footer.php'; ?>