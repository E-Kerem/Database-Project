<?php
include ("db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>HOME PAGE</title>
</head>
<body>

<?php if ($_SESSION['money_amount'] >= 0)
    echo "<h2> Welcome ", $_SESSION["name"], " - Wallet: $", $_SESSION["wallet"], " - Author Account: $", $_SESSION["money_amount"], "</h2>";
        else
            echo "<h2> Welcome ", $_SESSION["name"], " Wallet: $", $_SESSION["wallet"], "</h2>"; ?>

<?php if (isset($_GET['error'])){ ?>
    <p class = "error"><?php echo  $_GET['error']; ?></p>
<?php }?>
<a href="purchasedBooks.php">Purchased books</a> <a href="addmoney.php">Add money</a> <a href="index.php">Logout</a> <a href="deleteaccount.php"> Delete my account</a>
<a href="search.php">Search</a>
<a href="author.php">Author</a>
<a href="reports.php">Reports</a>
<br>

<table>
    <?php



    $sql = "SELECT * FROM normal_book_view";
    $result = mysqli_query($conn, $sql);

    echo "<table>";
while ($row = $result->fetch_assoc()) {
  $bookid = $row["book_id"];
  $booktitle = $row["title"];
  $genrename = $row["genre_name"];
  $bookrating = $row["rating"];
  echo "<tr><td>Book title: ", $row["title"], "</td>
                    <td>Book genre: ", $row["genre_name"], "</td>
                    <td>Book Rating : ", $row['rating'], "</td>
                    <td><a href='reviewbook.php?booktitle=", $booktitle, "&genrename=",$genrename, "&bookrating=", $bookrating, "&bookprice=",  "&bookid=", $bookid, "'>   Review</a></td>
                </tr>";
}
echo "</table>";


    ?>
</table>
<form action="publishbook.php" method="post">
    <br>

    <?php
    if ($_SESSION['money_amount'] >= 0)

        echo '<button type = "submit"> Publish Book</button>'

    ?>
</form>
</form>
</body>
</html>