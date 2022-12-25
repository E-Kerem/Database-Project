
<!DOCTYPE html>
<html lang="">
<head>
    <title>LOGIN</title>
    <style>
        /* Add some styling for the login form */
        #login-form {
            border: 1px solid blue;
            padding: 20px;
            width: 600px;
            height: 400px;
            margin: 0 auto;
            background-color: cyan;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        /* Style the input fields */
        input[type="text"], input[type="password"] {
            padding: 10px;
            border: 1px solid blue;
            width: 60%;
            margin-bottom: 10px;
        }
        /* Style the submit button */
        input[type="submit"] {
            background-color: blue;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        /* Style the "Forgot password" button */
        .forgot-password {
            color: blue;
            text-decoration: underline;
            cursor: pointer;
            margin-left: 10px;
        }
        /* Align the input fields and "Forgot password" button horizontally */
        #login-form > * {
            display: flex;
            align-items: center;
        }
        /* Style the login title */
        h2 {
            margin-bottom: 20px;
        }
        /* Style the login picture */
        #login-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
    </style>
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
