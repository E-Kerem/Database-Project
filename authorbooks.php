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




<a href="home.php">Home</a>
<a href="search.php">Search</a>
<a href="author.php">Author</a>
<a href="reports.php">Reports</a>
<br>

<table>
    <?php

    $authorid = $_GET["user_id"];


    $sql = "SELECT DISTINCT B.book_id, B.title, G.genre_name, B.rating FROM ebook EB, book B, author A, publish P, genre G, belongs BE WHERE EB.book_id = B.book_id AND P.user_id = A.user_id AND A.user_id = '$authorid' AND BE.book_id = B.book_id AND BE.genre_id = G.genre_id AND P.book_id = B.book_id";
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

</form>
</body>
</html>