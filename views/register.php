<?php

use function Laravel\Prompts\error;

$pageTitle="Register";
include __DIR__."/layout/header.php";
session_start();
$errors=$_SESSION["errors"]??[];
$old=$_SESSION["old_input"]??[];
if(isset($_SESSION["errors"]))unset($_SESSION['errors']);
if(isset($_SESSION['old_input']))unset($_SESSION['old_input']);
?>


<h2>New Account</h2>
<?php if(!empty($errors)): ?>
    <div class="alert alert-error">
        <?php foreach($errors as $error): ?>
            <p><?php echo htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="/login/register_process.php" method="POST">
    <div class="form-group">
        <label >Name</label>
        <input type="text" name="name"  require value="<?php echo htmlspecialchars($old['name']??''); ?>">
    </div>
    
    <div class="form-group">
        <label >Email</label>
        <input type="email" name="email"  require value="<?php echo htmlspecialchars($old['email']??'') ?>">
    </div>
    <div class="form-group">
        <label >Password</label>
        <input type="password" name="password" require>
    </div>
    <button type="submit">Register</button>
</form>

<div class="link">
    You alraedy have an account <a href="/login/views/login.php">Login </a>
</div>





<?php   
include __DIR__."/layout/footer.php";
?>