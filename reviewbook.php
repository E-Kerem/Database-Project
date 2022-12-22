<?php
include ("db_connection.php");
session_start();

?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Reviews</title>
</head>
<body>
<a href="home.php">Home</a>

    <?php

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
    $booktitle = validate($_GET['booktitle']);
    $genrename = validate($_GET['genrename']);

    echo "<h2> $booktitle </h2>";

    $sql = "SELECT R.title, R.body FROM review R, has H, book B WHERE R.review_id = H.review_id AND B.book_id = H.book_id AND B.title = '$booktitle'";
    $result = mysqli_query($conn, $sql);
    if($result-> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $reviewtitle = $row["title"];
            $reviewbody = $row["body"];

            echo "<br>", $reviewtitle, "<br>", $reviewbody ,"<br>";
        }
    }
    ?>
     <br>
    <form action='' method="POST">

        <?php if (isset($_GET['error'])){ ?>
            <p class = "error"><?php echo  $_GET['error']; ?></p>
        <?php }?>
        <textarea name="titleTextArea" cols="30" rows="2" placeholder="Title of the review"></textarea>
        <br>
        <textarea name="reviewTextArea" cols="30" rows="10" placeholder="Leave a review"></textarea>

        <button type="submit">Submit</button>

    </form>

<?php  if(isset($_POST['reviewTextArea']) && isset($_POST['titleTextArea'])){


    $reviewTextArea = validate($_POST['reviewTextArea']);
    $titleTextArea = validate($_POST['titleTextArea']);


    if (empty($titleTextArea)){
        echo "Title can't be empty";

    }
    else if (empty($reviewTextArea)){
        echo "Review can't be empty";


    }
    else{
        $sql = "SELECT MAX(CAST(review_id AS INT)) as maxNum FROM review";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_fetch_assoc($result);

        $max = $num['maxNum'];
        $max = $max + 1;

        $sql = "SELECT G.genre_id, B.book_id FROM genre G, book B WHERE B.title = '$booktitle' AND G.genre_name = '$genrename'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $book_id = $row['book_id'];


        $sql = "INSERT INTO review (review_id, title, body) values ('$max', '$titleTextArea', '$reviewTextArea')";
        mysqli_query($conn, $sql);

        $sql = "INSERT INTO has (review_id, book_id) values ('$max', '$book_id')";
        mysqli_query($conn, $sql);

        header("Location: home.php?error=Review successfully submitted");


    }

}

?>


</body>
</html>
