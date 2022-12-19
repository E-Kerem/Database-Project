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


    <?php
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }
    $booktitle = validate($_POST['booktitle']);
    $genrename = validate($_POST['genrename']);

    echo "<h2> $booktitle </h2>";

    $sql = "SELECT R.title, R.body FROM review R, has H, book B WHERE R.review_id = H.review_id AND B.book_id = H.book_id AND B.title = '$booktitle'";
    $result = mysqli_query($conn, $sql);

    if($result-> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            $reviewtitle = $row["title"];
            $reviewbody = $row["body"];

            echo "<br>", $reviewtitle, "<br>", $reviewbody;
        }
    }

    ?>

</body>
</html>
