<!DOCTYPE html>
<html lang="">
<head>
    <title>LOGIN</title>
</head>
<body>
<form action="login.php" method="post">

    <h2>LOGIN</h2>
    <?php if (isset($_GET['error'])){ ?>
    <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>
    <label>Email</label>
    <input type = "text" name = "email" placeholder = "E-mail">

    <label> Password </label>
    <input type = "password" name = "password" placeholder="Password">
    <button type = "submit"> Login </button>
</form>

<form action="register.php" method="post">
    <br>
    <button type = "submit"> Register</button>
</form>
</body>
</html>