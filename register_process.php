<?php
session_start();
use SebastianBergmann\CodeCoverage\Filter;
require_once __DIR__ .'/models/user.php';

$name=trim($_POST["name"]);
$email=trim($_POST["email"]);
$pas= trim($_POST["password"]);
$errors=[];
if(empty($name))$errors[]="Please Enter Your Name . ";
if(empty($email))$errors[]="Please Enter Your email . ";
if(!filter_var($email,FILTER_VALIDATE_EMAIL))$errors[]="Un Valid email . ";
if(strlen($pas)<7)$errors[]="Please The Password must be longer than 6 . ";

if(empty($errors)){
    $userModel=new User();
    $result=$userModel->Register($name, $email,$pas);
    if($result)
    {
        $user=$userModel->findByEmail($email);
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['name'];
        $_SESSION['user_email']=$user['email'];
        header("location:../index.php");
        exit;
    }else {
        $errors[]="Failed ! Your connection is bad !";
        header('location: ../views/register.php');
        exit;
    }
}
else {
    $errors[]="This Email Already Used";
    $_SESSION['errors']=$errors;
    $_SESSION['old_input']=['name'=>$name,'email'=>$email];
    header('location: ../views/register.php');
            exit;
}


?>
