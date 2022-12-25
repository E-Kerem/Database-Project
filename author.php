<?php
include ("db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Authors</title>
</head>
<body>
<h2>Welcome to the authors page</h2>

<a href="home.php">Home</a>
<a href="author_search.php">Author Search</a>




<table>
    <?php $sql = "SELECT *  FROM author";

    $result =  mysqli_query($conn, $sql );



    if ($result->num_rows > 0 ){
        while ($row = $result-> fetch_assoc()){
            $name = $row["name"];
            $userid = $row["user_id"];
            echo "
            <tr>
            <td>  Author :<a href='authorbooks.php?user_id=$userid&name=$name' > ", $row["name"], "</td>
            
                       
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
