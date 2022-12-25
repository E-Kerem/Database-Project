<?php

include ("db_connection.php");

session_start();

?>

<style>
    .navbar {
        display: flex;
        align-items: center;
        justify-content: center; /* center horizontally */
        font-size: 18px;
        color: black;
    }

    .navbar a {
        display: flex;
        align-items: center;
        color: black;
        text-decoration: none;
        padding: 10px 20px;
        position: relative;
    }

    .navbar a:hover {
        padding: 0 20px;
    }
    /* Add a solid line under the text */
    .navbar a::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background-color: blue;
        transform: scaleX(0); /* initially hide the line */
        transition: transform 250ms ease-in-out; /* add a transition effect */
    }

    /* Show the line when the cursor is hovering over the element */
    .navbar a:hover::before {
        transform: scaleX(1); /* show the line */
    }
    .body{
        background:lightcyan;
        width: %80;
        margin-top: 55px;
        margin-left: 500px;
        margin-right: 500px;
        align-items: center;
    }
    .input-box{
        padding: 0.5em;
        border: 1px solid #ccc;
        border-radius: 3px;

        /* Add some hover effects */
        transition: 0.5s;
    }
    .input-box :hover {
         box-shadow: 0 0 10px #ccc;
     }
    .input-box :focus {
         border-color: #555;
     }
    .publish-button {
        display: inline-block;
        padding: 3px 6px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: green;
        border-radius: 4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        transition: all 0.2s ease-in-out;
    }

    .publish-button:hover {
        background-color: darkslategray;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .publish-button:active {
        background-color: #008282;
        box-shadow: none;
        transform: translateY(1px);
    }
</style>

<!DOCTYPE html>
<html lang="">
<head>
    <div class="navbar">
        <a href="#">HomePage</a>
        <a href="#">Books</a>
        <a href="#">Forum</a>
        <a href="#">Reviews</a>
        <a href="#">Profile</a>
        <a href="#">Logout</a>

    </div>
</head>
<body>
<div class="body">
<h2>Your Wallet: $<?php  echo $_SESSION['wallet']?></h2>
<a href="home.php">Home</a>
<form action='' method="POST">
    <p> Write the amoun of money to add your wallet below. </p>
    <input type="number" min="1" name = "price" placeholder="Price" step="any" class="input-box" />
    <button class="publish-button" type="submit">Add</button>
</form>
    </div>
<?php  if(isset($_POST['price'])){


    $amount = $_POST["price"];



        $currentmoney = $_SESSION["wallet"];
        $currentmoney = floatval($currentmoney);
        $userid = $_SESSION['user_id'];
        $totalmoney = $currentmoney + $amount;
        $totalmoney = (string)$totalmoney;
        $sql = "UPDATE registered
        SET wallet = '$totalmoney'
        WHERE user_id IN (SELECT user_id FROM user WHERE user_id = '$userid');
;
";
        mysqli_query($conn, $sql);
        $_SESSION['wallet'] = $totalmoney;
        header("Location: home.php?error=Your wallet is updated");




}

?>

</body>
</html>





