<!DOCTYPE html>
<html lang="">
<head>
    <title>LOGIN</title>
    <style>
        h1 {
            text-align: center;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input[type="text"],
        input[type="password"] {
            width: 60%;
            margin: 8px 0;
            padding: 12px 20px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            margin: 8px 0;
            padding: 12px 20px;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        .signup-container {
            display: flex;
        }

        #signupbutton {
            width: 45%;
            margin: 10px 0px;
            padding: 5px 5px;
            box-sizing: border-box;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: white;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<body>
<form action="login.php" method="post">
    <h1>LOGIN</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <div class="form-container">
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <div class="button-container">
            <button title="submit">Login</button>
            <div class="signup-container">
                <form action="register.php" method="post">
                    <div>Not a member?</div>
                    <button id="signupbutton" type="submit" title="Sign Up">Sign Up</button>
                </form>
            </div>
        </div>
    </div

</form>
</body>
</body>
</html>