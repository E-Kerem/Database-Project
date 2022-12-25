<?php

include ("db_connection.php");

session_start();

?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>WALLET PAGE</title>
</head>
<body>
<h2> Wallet: $<?php  echo $_SESSION['wallet']?></h2>
<a href="home.php">Home</a>
<form action='' method="POST">
    <input type="number" min="1" name = "price" placeholder="Price" step="any" />
    <button type="submit">Add</button>
</form>
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





