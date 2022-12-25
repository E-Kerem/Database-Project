<?php
include ("db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Search PAGE</title>
</head>
<body>
<h2>Search</h2>
<a href="home.php">Home</a>
<a href="author.php">Author</a>
<a href="reports.php">Reports</a>
<form  method="post">
    <?php if (isset($_GET['error'])){ ?>
        <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>
    <br>
    <label>Book Title:</label>
    <input type = "text" name = "bookTitle" id="bookTitle"  placeholder="Book Title">
    <br>
    <label>Genre:</label>
    <select name="genre" id="genre">
        <option value="">All</option>
        <option value="action">Action</option>
        <option value="comedy">Comedy</option>
        <option value="drama">Drama</option>
        <option value="fantasy">Fantasy</option>
        <option value="horror">Horror</option>
        <option value="romance">Romance</option>
    </select>
    <br>
    <label>From:</label>
    <input type = "date" name = "publishDate1" id="publishDate1"  placeholder="From" value="2000-10-10">
    <br>
    <label>To:</label>
    <input type = "date" name = "publishDate2" id="publishDate2"  placeholder="To" value="2023-10-10">
    <br>
    <label>just E-book:</label>
    <select name="ebook" id="ebook">

        <option value="no">no</option>
        <option value="yes">yes</option>

    </select>
    <br>

    <button type = "submit" name="test" id="test"  > Search</button>

    <table>
        <?php
        $title = "";
        $genre = "";

        $ebook = "no";

        if(array_key_exists('test',$_POST)){

            $title = $_POST['bookTitle'];
            $genre = $_POST['genre'];
            $date1 = $_POST['publishDate1'];
            $date2 = $_POST['publishDate2'];
            $ebook = $_POST['ebook'];



            if ($ebook == "yes"){

                $sql =              "SELECT B.title, G.genre_name FROM book B, genre G, belongs BE, ebook EB
                             WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id
                                    AND B.title LIKE '$title%' AND G.genre_name LIKE '$genre%'
                                    AND B.publish_date BETWEEN '$date1' AND '$date2'
                                       AND B.book_id = EB.book_id";
            }

            else{
                $sql =              "SELECT B.title, G.genre_name FROM book B, genre G, belongs BE
                             WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id
                                    AND B.title LIKE '$title%' AND G.genre_name LIKE '$genre%'
                                    AND B.publish_date BETWEEN '$date1' AND '$date2'";
            }

        }
        else{
            $sql =              "SELECT B.title, G.genre_name FROM book B, genre G, belongs BE 
                             WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id
                                    " ;

        }
        $result =  mysqli_query($conn, $sql );

        if ($result->num_rows > 0 ){
            while ($row = $result-> fetch_assoc()){
                $booktitle = $row["title"];
                $genrename = $row["genre_name"];
                echo "<tr><td>Book title: ", $row["title"], "</td>
                            <td>Book genre: ", $row["genre_name"], "<form class = 'form-inline'action = 'reviewbook.php' method = 'post'>
                         <input type = 'hidden' name = 'booktitle' value = '$booktitle'>
                         <input type = 'hidden' name = 'genrename' value='$genrename'>
                         <button type = 'submit'> Reviews </button>
</form></td>

                         </tr> ";
            }
        }else {
            echo "No Results";
        }
        ?>
    </table>

</form>
</body>
</html>






