<?php

include ("db_connection.php");

session_start();

?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>PURCHASE PAGE</title>
</head>
<body>
<h2>Price: $<?php echo $_GET['bookprice'] ?> Wallet: $<?php  echo $_SESSION['wallet']?></h2>
<a href="home.php">Home</a>

<br>
<form action='' method="POST">
    <select name="buy" id="buy">
        <option value="1">Wallet</option>
        <option value="2">Card</option>

    </select>
    <button type="submit">Buy</button>
</form>

<?php  if(isset($_POST['buy'])){
    $date = date("Y-m-d");

    $buytype = $_POST["buy"];
    $userid = $_SESSION['user_id'];
    $wallet = $_SESSION["wallet"];
    $wallet = floatval($wallet);
    $price = $_GET['bookprice'];
    $price = floatval($price);
    $remaining = $wallet - $price;
    $bookid = $_GET['bookid'];
    if ($buytype == "1"){

        if ($remaining >= 0){
            $sql = "UPDATE registered
        SET wallet = '$remaining'
        WHERE user_id IN (SELECT user_id FROM user WHERE user_id = '$userid');;";
            mysqli_query($conn, $sql);
            $_SESSION['wallet'] = $remaining;

            $sql = "INSERT INTO purchase (user_id, book_id, purchase_date) values ('$userid', '$bookid', '$date')";
            mysqli_query($conn, $sql);
            header("Location: home.php?error=You have successfully purchased ");

        }
        else
            echo "You don't have enough money in your account";

    }
    else{
        $sql = "INSERT INTO purchase (user_id, book_id, purchase_date) values ('$userid', '$bookid', '$date')";
        mysqli_query($conn, $sql);
        header("Location: home.php?error=You have successfully purchased ");
    }





}

?>

</body>
</html>





