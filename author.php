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

<a href="author_search.php">Search</a>



<table>
    <?php $sql = "SELECT *  FROM author";

    $result =  mysqli_query($conn, $sql );



    if ($result->num_rows > 0 ){
        while ($row = $result-> fetch_assoc()){
            $name = $row["name"];

            echo "
            <tr>
            <td>Author : ", $row["name"], "</td>
            <td>balance:", $row["money_amount"], " dolar</td>
            
                       
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
