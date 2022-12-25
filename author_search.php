<?php
include ("db_connection.php");
session_start();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>Author Search</title>
</head>
<body>
<h2>Author search</h2>

<form  method="post">
    <?php if (isset($_GET['error'])){ ?>
        <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>
    <br>
    <label>Author Name:</label>
    <input type = "text" name = "name" id="name"  placeholder="Author name">
    <br>
    <button type = "submit" name="test" id="test"  > Search</button>

    <table>
        <?php
        $name = "";


        if(array_key_exists('test',$_POST)){

            $name = $_POST['name'];

            $sql =              "SELECT A.name, A.money_amount FROM author A
                             WHERE A.name  LIKE '$name%'" ;

        }
        else{
            $sql =              "SELECT * FROM author" ;

        }
        $result =  mysqli_query($conn, $sql );

        if ($result->num_rows > 0 ){
            while ($row = $result-> fetch_assoc()){
                $name = $row["name"];

                echo "<tr>
                      <td>Author : ", $row["name"], "</td>
                      <td>Balance : ", $row["money_amount"], "</td>      

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
