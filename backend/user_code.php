<?php
require_once('../connection.php');
require_once('../classes/User.php');

$user = new User($conn);

//Add user
if(isset($_POST['btn_save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $user_address = $_POST['user_address'];


    $user->addUser($first_name,$last_name,
    $email,$gender,$user_address);
    header("Location: ../new.php");
    exit;
}
?>