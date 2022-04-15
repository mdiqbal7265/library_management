<?php
require_once 'lib/classes/MysqliDb.php';
$error = '';
$success = '';
$db = new MysqliDb('localhost', 'root', '', 'lms');
if(isset($_GET['code']))
{
    require_once 'lib/classes/Helper.php';
    $helper = new Helper;

    $code = $_GET['code'];
    if($helper->is_valid_email_verification_code($code))
    {
        if($helper->update_verification_status($code)){
            $success = 'Verification Successfully!';
        }
    }else{
        $error = 'Something went wrong try again';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Email Verify | PHP Chat Application using Websocket</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>

<body>

    <div class="containter">
        <br />
        <br />
        <h1 class="text-center">PHP Chat Application using Websocket</h1>
        
        <div class="row justify-content-md-center">
            <div class="col col-md-4 mt-5">
            	<div class="alert alert-danger">
            		<h2><?php echo $error; ?></h2>
            	</div>
                <div class="alert alert-success">
            		<h2><?php echo $success; ?></h2>
                    <a href="index.php" class="btn btn-info">Login</a>
            	</div>
            </div>
        </div>
    </div>
</body>

</html>
