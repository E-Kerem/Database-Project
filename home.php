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
<h2>Welcome <?php echo  $_SESSION['name']; ?> - Wallet: $<?php  echo $_SESSION['wallet']?></h2>
<?php if (isset($_GET['error'])){ ?>
    <p class = "error"><?php echo  $_GET['error']; ?></p>
<?php }?>
<a href="purchasedBooks.php">Purchased books</a> <a href="addmoney.php">Add money</a> <a href="index.php">Logout</a>
<br>
<table>
    <?php $sql = "SELECT B.book_id, B.title, G.genre_name, B.rating, EB.price  FROM book B, genre G, belongs BE, ebook EB WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id AND EB.book_id = B.book_id ";

    $result =  mysqli_query($conn, $sql );

    if ($result->num_rows > 0 ){
        while ($row = $result-> fetch_assoc()){
            $bookid = $row["book_id"];
            $booktitle = $row["title"];
            $genrename = $row["genre_name"];
            $bookrating = $row["rating"];
            $bookprice = $row["price"];
            echo "<tr><td>Book title: ", $row["title"], "</td>
                            <td>Book genre: ", $row["genre_name"],"<td> Book Rating : ", $row['rating'],"<td> Price: ", $row['price'],  "<a href='reviewbook.php?booktitle=", $booktitle, "&genrename=",$genrename, "&bookrating=", $bookrating, "&bookprice=", $bookprice, "&bookid=", $bookid, "'>   Review</a>
</td> </tr>  ";
        }
    }else {
        echo "No Results";
    }
    ?>
</table>
<form action="publishbook.php" method="post">
    <br>
    <button type = "submit"> Publish Book</button>
</form>


</form>
</body>
</html>