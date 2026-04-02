 <?php
session_start();
 $errors=$_SESSION['login_errors']??[];
 $old=$_SESSION['old_email']??'';
 if(isset($_SESSION['old_email']))unset($_SESSION['old_email']);
 if(isset($_SESSION['login_error']))unset($_SESSION['login_error']);
 $pageTitle='Login';
 include __DIR__."/layout/header.php";
 ?>
<h2>Login Page</h2>

<?php if(!empty($errors)): ?>
    <div class="alert alert-error">
        <?php foreach($errors as $error): ?>
            <p><?php echo htmlspecialchars($error); ?></p>
            <?php endforeach; ?>
    </div>
<?php endif; ?>

<form action="/../login_process.php" method="POST">
    <div class="form-group">
        <label >Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($old??''); ?>"required>
    </div>
    <div class="form-group">
        <label >Password</label>
        <input type="password" name="password" value="" required>
    </div>
    <button type="submit">Login</button>
</form>
<div class="link">
    you don't have an account ? <a href="/../views/register.php"> Create a new account</a>
</div>
 
 <?php  include __DIR__."/layout/footer.php"; ?> 
