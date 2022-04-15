<?php
session_start();
require_once 'classes/Validation.php';
require_once 'classes/MysqliDb.php';
require_once 'classes/Helper.php';

$db = new MysqliDb('localhost', 'root', '', 'lms');
$validation = new Validation();
$helper = new Helper();

// Handle user login

if ($_POST['action'] && $_POST['action'] == "user_login") {
    $email = $validation->sanitize_data($_POST['email']);
    $password = $validation->sanitize_data($_POST['password']);

    $db->where('user_email_address', $email);
    $loggedIn = $db->getOne('lms_user');
    if ($loggedIn != null) {
        if (password_verify($password, $loggedIn['user_password'])) {
            if (!empty($_POST['rem'])) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $password, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }
            $_SESSION['user_type'] = 'User';
            echo 'login';
            $_SESSION['email'] = $email;
        } else {
            echo 'password_not_matched';
        }
    } else {
        echo 'data_not_found';
    }
}

// Handle Admin Login
if ($_POST['action'] && $_POST['action'] == "admin_login") {
    $email = $validation->sanitize_data($_POST['email']);
    $password = $validation->sanitize_data($_POST['password']);

    $db->where('admin_email', $email);
    $loggedIn = $db->getOne('lms_admin');
    if ($loggedIn != null) {
        if (password_verify($password, $loggedIn['admin_password'])) {
            if (!empty($_POST['rem'])) {
                setcookie("email", $email, time() + (30 * 24 * 60 * 60), '/');
                setcookie("password", $password, time() + (30 * 24 * 60 * 60), '/');
            } else {
                setcookie("email", "", 1, '/');
                setcookie("password", "", 1, '/');
            }
            echo 'login';
            $_SESSION['user_type'] = 'Admin';
            $_SESSION['email'] = $email;
        } else {
            echo 'password_not_matched';
        }
    } else {
        echo 'data_not_found';
    }
}

// Handle User Registration
if (isset($_POST['action']) && $_POST['action'] == 'user_register') {
    $name = $validation->sanitize_data($_POST['name']);
    $email = $validation->sanitize_data($_POST['email']);
    $password = $validation->sanitize_data($_POST['password']);
    $verification_code = md5(uniqid());
    $unique_id = 'U' . rand(0, 1000000);
    $subject = 'Registration Verification for LMS Application Demo';
    $body = '<p>Thank you for registering for Chat Application Demo.</p>
        <p>This is a verification email, please click the link to verify your email address.</p>
        <p><a href="http://localhost:3030/verify.php?code=' . $verification_code . '">Click to Verify</a></p>
        <p>Thank you...</p>';

    $_password = password_hash($password, PASSWORD_BCRYPT);
    if ($helper->user_exists($email)) {
        echo 'user_exists';
    } else {
        $data = [
            'user_name' => $name,
            'user_email_address' => $email,
            'user_password' => $_password,
            'user_verificaton_code' => $verification_code,
            'user_unique_id' => $unique_id,
            'user_created_on' => date('Y-m-d h:i:s'),
        ];

        if ($db->insert('lms_user', $data)) {
            echo 'register';
            $_SESSION['email'] = $email;
            $helper->send_mail($email, $subject, $body);
        } else {
            echo 'something_wrong';
        }
    }
}


// Handle User Logout
if (isset($_POST['action']) && $_POST['action'] == 'logout') {
    session_destroy();
    unset($_SESSION['email']);
    echo 'logout';
}

// Fetch Category
if (isset($_POST['action']) && $_POST['action'] == 'fetchCategory') {
    $output = '';
    $data = $db->get('lms_category');
    if ($data) {
        foreach ($data as $key => $value) {
            $output .= "<tr>
                <td>{$value['category_name']}</td>
                <td>" . ($value['category_status'] == 'Enable' ? '<span class="badge badge-success">Enable</span>' : '<span class="badge badge-danger">Disable</span>') . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['category_created_on'])) . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['category_updated_on'])) . "</td>
                <td>
                    <a href='#' id='{$value['category_id']}' class='btn btn-primary btn-sm editCategory' data-toggle='modal' data-target='#edit_category_modal'><i class='fa fa-edit'></i></a>
                    <a href='#' id='{$value['category_id']}' class='btn btn-danger btn-sm dltCategory'><i class='fa fa-trash'></i></a>
                </td>
            </tr>";
        }

        echo $output;
    } else {
        echo '<h2 class="text-danger">No Category available here!</h2>';
    }
}

// Add Category
if (isset($_POST['action']) && $_POST['action'] == 'add_category') {
    $name = $validation->sanitize_data($_POST['category_name']);
    $status = isset($_POST['category_status']) ? 'Enable' : 'Disable';

    $data = [
        'category_name' => $name,
        'category_status' => $status,
        'category_created_on' => date('Y-m-d h:i:s'),
    ];

    if ($db->insert('lms_category', $data)) {
        echo 'insert';
    } else {
        echo $db->getLastError();
    }
}

// Edit Category
if (isset($_POST['action']) && $_POST['action'] == 'edit_category') {
    $id = $_POST['id'];
    $db->where('category_id', $id);
    $data = $db->getOne('lms_category');
    echo json_encode($data);
}

// Update Category
if (isset($_POST['action']) && $_POST['action'] == 'update_category') {
    $id = $_POST['id'];
    $name = $validation->sanitize_data($_POST['category_name']);
    $status = isset($_POST['category_status']) ? 'Enable' : 'Disable';

    $data = [
        'category_name' => $name,
        'category_status' => $status,
        'category_updated_on' => date('Y-m-d h:i:s'),
    ];
    $db->where('category_id', $id);
    if ($db->update('lms_category', $data)) {
        echo 'update';
    } else {
        echo $db->getLastError();
    }
}

// Delete Category
if (isset($_POST['action']) && $_POST['action'] == 'dltCategory') {
    $id = $_POST['id'];
    $db->where('category_id', $id);
    $db->delete('lms_category');
}

// Fetch Author
if (isset($_POST['action']) && $_POST['action'] == 'fetchAuthor') {
    $output = '';
    $data = $db->get('lms_author');
    if ($data) {
        foreach ($data as $key => $value) {
            $output .= "<tr>
                <td>{$value['author_name']}</td>
                <td>" . ($value['author_status'] == 'Enable' ? '<span class="badge badge-success">Enable</span>' : '<span class="badge badge-danger">Disable</span>') . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['author_created_on'])) . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['author_updated_on'])) . "</td>
                <td>
                    <a href='#' id='{$value['author_id']}' class='btn btn-primary btn-sm editauthor' data-toggle='modal' data-target='#edit_author_modal'><i class='fa fa-edit'></i></a>
                    <a href='#' id='{$value['author_id']}' class='btn btn-danger btn-sm dltauthor'><i class='fa fa-trash'></i></a>
                </td>
            </tr>";
        }

        echo $output;
    } else {
        echo '<h2 class="text-danger">No Author available here!</h2>';
    }
}

// Add Author
if (isset($_POST['action']) && $_POST['action'] == 'add_author') {
    $name = $validation->sanitize_data($_POST['author_name']);
    $status = isset($_POST['author_status']) ? 'Enable' : 'Disable';

    $data = [
        'author_name' => $name,
        'author_status' => $status,
        'author_created_on' => date('Y-m-d h:i:s'),
    ];

    if ($db->insert('lms_author', $data)) {
        echo 'insert';
    } else {
        echo $db->getLastError();
    }
}


// Edit Author
if (isset($_POST['action']) && $_POST['action'] == 'edit_author') {
    $id = $_POST['id'];
    $db->where('author_id', $id);
    $data = $db->getOne('lms_author');
    echo json_encode($data);
}


// Update Author
if (isset($_POST['action']) && $_POST['action'] == 'update_author') {
    $id = $_POST['id'];
    $name = $validation->sanitize_data($_POST['author_name']);
    $status = isset($_POST['author_status']) ? 'Enable' : 'Disable';

    $data = [
        'author_name' => $name,
        'author_status' => $status,
        'author_updated_on' => date('Y-m-d h:i:s'),
    ];
    $db->where('author_id', $id);
    if ($db->update('lms_author', $data)) {
        echo 'update';
    } else {
        echo $db->getLastError();
    }
}

// Delete Author
if (isset($_POST['action']) && $_POST['action'] == 'dltAuthor') {
    $id = $_POST['id'];
    $db->where('author_id', $id);
    $db->delete('lms_author');
}

// Fetch Location Rack
if (isset($_POST['action']) && $_POST['action'] == 'fetchLocation_rack') {
    $output = '';
    $data = $db->get('lms_location_rack');
    if ($data) {
        foreach ($data as $key => $value) {
            $output .= "<tr>
                <td>{$value['location_rack_name']}</td>
                <td>" . ($value['location_rack_status'] == 'Enable' ? '<span class="badge badge-success">Enable</span>' : '<span class="badge badge-danger">Disable</span>') . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['location_rack_created_on'])) . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['location_rack_updated_on'])) . "</td>
                <td>
                    <a href='#' id='{$value['location_rack_id']}' class='btn btn-primary btn-sm editlocation_rack' data-toggle='modal' data-target='#edit_location_rack_modal'><i class='fa fa-edit'></i></a>
                    <a href='#' id='{$value['location_rack_id']}' class='btn btn-danger btn-sm dltlocation_rack'><i class='fa fa-trash'></i></a>
                </td>
            </tr>";
        }

        echo $output;
    } else {
        echo '<h2 class="text-danger">No Location Rack available here!</h2>';
    }
}

// Add Location Rack
if (isset($_POST['action']) && $_POST['action'] == 'add_location_rack') {
    $name = $validation->sanitize_data($_POST['location_rack_name']);
    $status = isset($_POST['location_rack_status']) ? 'Enable' : 'Disable';

    $data = [
        'location_rack_name' => $name,
        'location_rack_status' => $status,
        'location_rack_created_on' => date('Y-m-d h:i:s'),
    ];

    if ($db->insert('lms_location_rack', $data)) {
        echo 'insert';
    } else {
        echo $db->getLastError();
    }
}

// Edit Location Rack
if (isset($_POST['action']) && $_POST['action'] == 'edit_location_rack') {
    $id = $_POST['id'];
    $db->where('location_rack_id', $id);
    $data = $db->getOne('lms_location_rack');
    echo json_encode($data);
}


// Update Location Rack
if (isset($_POST['action']) && $_POST['action'] == 'update_location_rack') {
    $id = $_POST['id'];
    $name = $validation->sanitize_data($_POST['location_rack_name']);
    $status = isset($_POST['location_rack_status']) ? 'Enable' : 'Disable';

    $data = [
        'location_rack_name' => $name,
        'location_rack_status' => $status,
        'location_rack_updated_on' => date('Y-m-d h:i:s'),
    ];
    $db->where('location_rack_id', $id);
    if ($db->update('lms_location_rack', $data)) {
        echo 'update';
    } else {
        echo $db->getLastError();
    }
}

// Delete Location Rack
if (isset($_POST['action']) && $_POST['action'] == 'dltLocation_rack') {
    $id = $_POST['id'];
    $db->where('location_rack_id', $id);
    $db->delete('lms_location_rack');
}

// Fetch Book
if (isset($_POST['action']) && $_POST['action'] == 'fetchBook') {
    $output = '';
    $data = $db->get('lms_book');
    if ($data) {
        foreach ($data as $key => $value) {
            $output .= "<tr>
                <td>{$value['book_name']}</td>
                <td>{$value['book_isbn_number']}</td>
                <td>{$value['book_category']}</td>
                <td>{$value['book_author']}</td>
                <td>{$value['book_location_rack']}</td>
                <td>{$value['book_no_of_copy']}</td>
                <td>" . ($value['book_status'] == 'Enable' ? '<span class="badge badge-success">Enable</span>' : '<span class="badge badge-danger">Disable</span>') . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['book_added_on'])) . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['book_updated_on'])) . "</td>
                <td>
                    <a href='#' id='{$value['book_id']}' class='btn btn-primary btn-sm editbook' data-toggle='modal' data-target='#edit_book_modal'><i class='fa fa-edit'></i></a>
                    <a href='#' id='{$value['book_id']}' class='btn btn-danger btn-sm dltbook'><i class='fa fa-trash'></i></a>
                </td>
            </tr>";
        }

        echo $output;
    } else {
        echo '<h2 class="text-danger">No Book available here!</h2>';
    }
}

// Add Book
if (isset($_POST['action']) && $_POST['action'] == 'add_book') {
    $name = $validation->sanitize_data($_POST['book_name']);
    $author = $validation->sanitize_data($_POST['book_author']);
    $category = $validation->sanitize_data($_POST['book_category']);
    $location_rack = $validation->sanitize_data($_POST['book_location_rack']);
    $isbn_number = $validation->sanitize_data($_POST['book_isbn_number']);
    $no_of_copy = $validation->sanitize_data($_POST['book_no_of_copy']);
    $status = isset($_POST['book_status']) ? 'Enable' : 'Disable';

    $data = [
        'book_name' => $name,
        'book_author' => $author,
        'book_category' => $category,
        'book_location_rack' => $location_rack,
        'book_isbn_number' => $isbn_number,
        'book_no_of_copy' => $no_of_copy,
        'book_status' => $status,
        'book_added_on' => date('Y-m-d h:i:s'),
    ];

    if ($db->insert('lms_book', $data)) {
        echo 'insert';
    } else {
        echo $db->getLastError();
    }
}

// Edit Book
if (isset($_POST['action']) && $_POST['action'] == 'edit_book') {
    $id = $_POST['id'];
    $db->where('book_id', $id);
    $data = $db->getOne('lms_book');
    echo json_encode($data);
}

// Update Book
if (isset($_POST['action']) && $_POST['action'] == 'update_book') {
    $id = $_POST['id'];
    $name = $validation->sanitize_data($_POST['book_name']);
    $author = $validation->sanitize_data($_POST['book_author']);
    $category = $validation->sanitize_data($_POST['book_category']);
    $location_rack = $validation->sanitize_data($_POST['book_location_rack']);
    $isbn_number = $validation->sanitize_data($_POST['book_isbn_number']);
    $no_of_copy = $validation->sanitize_data($_POST['book_no_of_copy']);
    $status = isset($_POST['book_status']) ? 'Enable' : 'Disable';

    $data = [
        'book_name' => $name,
        'book_author' => $author,
        'book_category' => $category,
        'book_location_rack' => $location_rack,
        'book_isbn_number' => $isbn_number,
        'book_no_of_copy' => $no_of_copy,
        'book_status' => $status,
        'book_updated_on' => date('Y-m-d h:i:s'),
    ];
    $db->where('book_id', $id);
    if ($db->update('lms_book', $data)) {
        echo 'update';
    } else {
        echo $db->getLastError();
    }
}

// Delete Book
if (isset($_POST['action']) && $_POST['action'] == 'dltbook') {
    $id = $_POST['id'];
    $db->where('book_id', $id);
    $db->delete('lms_book');
}

// Fetch User
if (isset($_POST['action']) && $_POST['action'] == 'fetchUser') {
    $output = '';
    $data = $db->get('lms_user');
    if ($data) {
        foreach ($data as $key => $value) {
            $output .= "<tr>
                <td><img src='assets/dist/img/user/{$value['user_profile']}' alt='' width='64px'></td>
                <td>{$value['user_unique_id']}</td>
                <td>{$value['user_name']}</td>
                <td>{$value['user_email_address']}</td>
                <td>{$value['user_contact_no']}</td>
                <td>{$value['user_address']}</td>
                <td>{$value['user_verification_status']}</td>
                <td>" . ($value['user_status'] == 'Enable' ? '<span class="badge badge-success">Enable</span>' : '<span class="badge badge-danger">Disable</span>') . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['user_created_on'])) . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['user_updated_on'])) . "</td>
                <td>
                    <a href='#' id='{$value['user_id']}' class='btn btn-danger btn-sm dltUser'><i class='fa fa-trash'></i></a>
                </td>
            </tr>";
        }

        echo $output;
    } else {
        echo '<h2 class="text-danger">No User available here!</h2>';
    }
}

// Delete User
if (isset($_POST['action']) && $_POST['action'] == 'dltUser') {
    $id = $_POST['id'];
    $db->where('user_id', $id);
    $db->delete('lms_user');
}

// Fetch Issue Book
if (isset($_POST['action']) && $_POST['action'] == 'fetchIssueBook') {
    $output = '';
    $data = $db->get('lms_issue_book');
    if ($data) {
        foreach ($data as $key => $value) {
            $output .= "<tr>
                <td>{$value['book_id']}</td>
                <td>{$value['user_id']}</td>
                <td>" . date("d M Y, H:i A", strtotime($value['issue_date_time'])) . "</td>
                <td>" . date("d M Y, H:i A", strtotime($value['return_date_time'])) . "</td>
                <td>{$value['book_fines']}</td>
                <td><span class='badge badge-info'>".$value['book_issue_status']."</span></td>
                <td>
                    <a href='#' id='{$value['issue_book_id']}' class='btn btn-danger btn-sm viewIssue'><i class='fa fa-eye'></i></a>
                </td>
            </tr>";
        }

        echo $output;
    } else {
        echo '<h2 class="text-danger">No Issue Book available here!</h2>';
    }
}
