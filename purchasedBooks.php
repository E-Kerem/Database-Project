<?php
include ("db_connection.php");
session_start();

?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>BOOKS PAGE</title>
</head>
<body>
<h2><?php echo  $_SESSION['name']; ?> - Your Purchased Books</h2>
<?php if (isset($_GET['error'])){ ?>
    <p class = "error"><?php echo  $_GET['error']; ?></p>
<?php }?>
<a href="home.php">Home</a>
<br>
<table>
    <?php
    $userid = $_SESSION["user_id"];
    $sql = "SELECT B.title, G.genre_name, EB.pdf_link  FROM book B, genre G, belongs BE, ebook EB, purchase P WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id AND EB.book_id = B.book_id AND P.user_id = '$userid' AND P.book_id = B.book_id ";

    $result =  mysqli_query($conn, $sql );

    if ($result->num_rows > 0 ){
        while ($row = $result-> fetch_assoc()){
            $booktitle = $row["title"];
            $genrename = $row["genre_name"];
            $pdflink = $row["pdf_link"];

            echo "<tr><td>Book title: ", $row["title"], "</td>
                            <td>Book genre: ", $row["genre_name"],"
                            <form action='/viewpdf.php' method='post'>
                              <input type='hidden' name='filepath' value='$pdflink'>
                              <button type='submit'>View PDF</button>
                            </form>
</td> </tr>";

        }
    }else {
        echo "No Results";
    }
    ?>
</table>



</body>
</html>