<?php

session_start();

require_once 'classes/MysqliDb.php';
require_once 'classes/Helper.php';

$db = new MysqliDb('localhost', 'root', '', 'lms');
$helper = new Helper();

if (!isset($_SESSION['email'])) {
    header('location: index.php');
    die();
}

$email = $_SESSION['email'];
if($_SESSION['user_type'] == 'User'){
    $db->where('user_email_address', $email);
    $user = $db->getOne('lms_user');
}else if($_SESSION['user_type'] == 'Admin'){
    $db->where('admin_email', $email);
    $admin = $db->getOne('lms_admin');
}

$author = $db->get('lms_author');
$category = $db->get('lms_category');
$location_rack = $db->get('lms_location_rack');
$setting = $db->getOne('lms_setting');