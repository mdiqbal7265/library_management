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
                    <h1 class="m-0">Issue Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Issue Book</li>
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
                            <h3 class="card-title">Issue Book List</h3>
                            <a href="#" class="btn btn-outline-info float-right" data-toggle="modal" data-target="#add_issue_book_modal"><i class="fa fa-plus-circle"></i>&nbsp;Add New</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="issue_book_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Book ISBN Number</th>
                                        <th>User Unique ID</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                        <th>Late Return Fines</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="issue_book_table_body">

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Book ISBN Number</th>
                                        <th>User Unique ID</th>
                                        <th>Issue Date</th>
                                        <th>Return Date</th>
                                        <th>Late Return Fines</th>
                                        <th>Status</th>
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
<div class="modal fade" id="add_issue_book_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Issue Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="issue_book_add_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="author_name">Book ISBN Number</label>
                        <input type="text" class="form-control" placeholder="Enter Book ISBN number" id="book_id" name="book_id">
                        <ul class="list-group" id="book-id">

                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="author_name">User Unique Id</label>
                        <input type="text" class="form-control" placeholder="Enter User Unique Id" id="user_id" name="user_id">
                        <ul class="list-group" id="user-id">

                        </ul>
                    </div>
                    <div class="form-group">
                        <label for="expected_return_date">Expected Return Date</label>
                        <input type="date" class="form-control" placeholder="Enter Return Date" name="expected_return_date">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" value="Add Issue Book" class="btn btn-primary" id="issue_book_add_btn">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Category Add Modal -->

<!-- Category Edit Modal -->

<div class="modal fade" id="view_book_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Book</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3>Book Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>BOOK ISBN NUMBER</td>
                            <td id="view_isbn_number"></td>
                        </tr>
                        <tr>
                            <td>BOOK NAME</td>
                            <td id="view_book_name"></td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td id="book_author"></td>
                        </tr>
                    </tbody>
                </table>
                <h3>User Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>User Unique ID</td>
                            <td id="view_user_unique_id"></td>
                        </tr>
                        <tr>
                            <td>User Name</td>
                            <td id="view_user_name"></td>
                        </tr>
                        <tr>
                            <td>User Address</td>
                            <td id="view_user_address"></td>
                        </tr>
                        <tr>
                            <td>User Contact No</td>
                            <td id="view_user_contact_no"></td>
                        </tr>
                        <tr>
                            <td>User Email</td>
                            <td id="view_user_email"></td>
                        </tr>
                        <tr>
                            <td>User Image</td>
                            <td><img src="" alt="" id="view_user_image" class="img-thumbnail img-fluid" width="64px"></td>
                        </tr>
                    </tbody>
                </table>
                <h3>Issue Book Details</h3>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>BOOK Issue Date</td>
                            <td id="view_book_issue_date"></td>
                        </tr>
                        <tr>
                            <td>BOOK Return Date</td>
                            <td id="view_book_return_date"></td>
                        </tr>
                        <tr>
                            <td>Book Issue Status</td>
                            <td id="view_book_status"></td>
                        </tr>
                        <tr>
                            <td>Total Fines</td>
                            <td id="view_fines"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Category Edit Modal -->


<?php include 'inc/footer.php' ?>;