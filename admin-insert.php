<?php 

require_once 'lib/classes/MysqliDb.php';

$db = new MysqliDb('localhost', 'root', '', 'lms');

$email = "admin@gmail.com";
$password = password_hash(123456, PASSWORD_BCRYPT);

$data =  [
    'admin_name' => 'Admin',
    'admin_email' => $email,
    'admin_password' => $password,
];
if($db->insert('lms_admin',$data)){
    echo 'Admin Inserted Succesfully';
}
