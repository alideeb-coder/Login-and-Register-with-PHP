 <?php
 session_start();
 require_once __DIR__.'/models/user.php';
 $errors=[];

 $email=trim($_POST['email'])??'';
 $pass=trim($_POST['password'])??'';
 $errors=[];
 if(empty($email))$errors[]='We Need The Email';
 if(empty($pass))$errors[]='We Need The password';

 if(empty($errors)){
    $user=new User();
    $result=$user->login($email,$pass);
    if($result){
        $_SESSION['user_id']=$result['id'];
        $_SESSION['user_name']=$result['name'];
        $_SESSION['user_email']=$result['email'];
        header('location: /login/index.php');
        exit;
    }else {
            $errors[]="The Email or Password doesn't correct";
            $_SESSION['login_errors']=$errors;
            $_SESSION['old_email']=$email;
            header('location: /login/views/login.php');
            exit;
        }
 }else {
    $errors[]="The Email or Password doesn't correct";
    $_SESSION['login_errors']=$errors;
    $_SESSION['old_email']=$email;
    header('location: /login/views/login.php');
    exit;
 }
 ?>