<!DOCTYPE html>
<html lang="">
<head>
    <title>REGISTER</title>
</head>
<body>
<form action="register.inc.php" method="post">

    <h2>REGISTER</h2>
    <?php if (isset($_GET['error'])){ ?>
        <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>
    <label>Email</label>
    <input type = "text" name = "email" placeholder = "E-mail">

    <label>User Name</label>
    <input type = "text" name = "uname" placeholder = "User Name">

    <label> Password </label>
    <input type = "password" name = "password" placeholder="Password">
    <button type = "submit"> Register </button>
</form>

    <a href="index.php">Go Back</a>
</form>
</body>
</html>