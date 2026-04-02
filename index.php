<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <link rel="stylesheet" href="/../assets/css/style.css">
</head>
<body>
    <div class="container">
        <div style="display:flex; justify-content: center;
    align-items: center;">Hello <?php echo htmlspecialchars($_SESSION['user_name']??''); ?></div>
    <?php if(!isset($_SESSION['user_name'])):  ?>
        <div class="link">Do You Have An Account<a href="/../views/login.php">Login</a></div>
        <div class="link">Greate New Account <a href="/../views/register.php">Register</a></div>
    <?php ;else :  ?>
        <div class="link"><a href="/../logout.php">Logiout</a></div>
    <?php endif; ?>
    </div>
    
</body>
</html>
