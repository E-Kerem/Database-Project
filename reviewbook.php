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
<a href="index.php">Logout</a>

    <?php
    $reviewCount = 0;
    $reviewTotal = 0;
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
    $booktitle = validate($_GET['booktitle']);
    $genrename = validate($_GET['genrename']);
    $bookrating = validate($_GET['bookrating']);
    $bookprice = validate($_GET['bookprice']);
    $bookid = validate($_GET['bookid']);
    $userid = $_SESSION["user_id"];
    $check = 0;

    $sql = "SELECT B.book_id  FROM book B, genre G, belongs BE, ebook EB, purchase P WHERE BE.book_id = B.book_id AND G.genre_id = BE.genre_id AND EB.book_id = B.book_id AND P.user_id = '$userid' AND P.book_id = B.book_id ";
    $result = mysqli_query($conn, $sql);
    if($result-> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $book_id_check = $row["book_id"];
            if ($bookid == $book_id_check)
                $check = 1;
        }
    }
    if ($check == 0){
        echo "<h2> $booktitle  Rating: $bookrating Price: $bookprice</h2> ", "<a href='purchasebook.php?book_id=", $bookid,"&bookprice=", $bookprice, "&bookid=", $bookid, " '>Purchase this book</a>";
    }
    else{
        echo "<h2> $booktitle  Rating: $bookrating Price: $bookprice</h2> ", "You already have this book";
    }


    $sql = "SELECT R.title, R.body FROM review R, has H, book B WHERE R.review_id = H.review_id AND B.book_id = H.book_id AND B.title = '$booktitle'";
    $result = mysqli_query($conn, $sql);
    if($result-> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $reviewtitle = $row["title"];
            $reviewbody = $row["body"];
            $reviewCount += 1;
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
        <br>
        <p>Your rating :
        <select name="rating" id="rating">
            <option value="rate">Rating</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>

        </select>
        </p>
        <br>
        <button type="submit">Submit</button>

    </form>

<?php  if(isset($_POST['reviewTextArea']) && isset($_POST['titleTextArea'])){


    $reviewTextArea = validate($_POST['reviewTextArea']);
    $titleTextArea = validate($_POST['titleTextArea']);
    $rating = validate($_POST['rating']);


    if (empty($titleTextArea)){
        echo "Title can't be empty";


    }
    else if (empty($reviewTextArea)){
        echo "Review can't be empty";

    }
    else if($rating == "rate"){
        echo "Please rate the book";

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
        $titleTextArea .= "\t\t- " . $_SESSION['name'] . ":\t Rated: " . $rating;

        $sql = "INSERT INTO review (review_id, title, body) values ('$max', '$titleTextArea', '$reviewTextArea')";
        mysqli_query($conn, $sql);

        $sql = "INSERT INTO has (review_id, book_id) values ('$max', '$book_id')";
        mysqli_query($conn, $sql);


        $reviewTotal = $reviewCount * $bookrating;
        $reviewTotal = $reviewTotal + intval($rating);
        $finalRating = $reviewTotal / ($reviewCount + 1);

        $sql = "UPDATE book SET rating = '$finalRating' WHERE title = '$booktitle'";
        mysqli_query($conn, $sql);
        header("Location: home.php?error=Review successfully submitted");


    }

}

?>


</body>
</html>
