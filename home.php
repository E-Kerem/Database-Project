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
<h2>Welcome <?php echo  $_SESSION['name']; ?></h2>
<?php if (isset($_GET['error'])){ ?>
    <p class = "error"><?php echo  $_GET['error']; ?></p>
<?php }?>

<table>
    <?php $sql = "SELECT B.title, G.genre_name FROM book B, genre G, belongs BE WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id  ";

    $result =  mysqli_query($conn, $sql );

    if ($result->num_rows > 0 ){
        while ($row = $result-> fetch_assoc()){
            $booktitle = $row["title"];
            $genrename = $row["genre_name"];
            echo "<tr><td>Book title: ", $row["title"], "</td>
                            <td>Book genre: ", $row["genre_name"], "<a href='reviewbook.php?booktitle=", $booktitle, "&genrename=",$genrename, "'>Review</a>
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