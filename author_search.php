<?php
include ("db_connection.php");
session_start();
?>
<style>
    .publish-button {
        margin-top: 10px;
        margin-right: 20px;
        display: inline-block;
        padding: 3px 6px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        color: #fff;
        background-color: green;
        border-radius: 4px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
        transition: all 0.2s ease-in-out;
    }

    .publish-button:hover {
        background-color: darkslategray;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    .publish-button:active {
        background-color: #008282;
        box-shadow: none;
        transform: translateY(1px);
    }
    .navbar {
        display: flex;
        align-items: center;
        justify-content: center; /* center horizontally */
        font-size: 18px;
        color: black;
    }

    .navbar a {
        display: flex;
        align-items: center;
        color: black;
        text-decoration: none;
        padding: 10px 20px;
        position: relative;
    }

    .navbar a:hover {
        padding: 0 20px;
    }
    /* Add a solid line under the text */
    .navbar a::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background-color: blue;
        transform: scaleX(0); /* initially hide the line */
        transition: transform 250ms ease-in-out; /* add a transition effect */
    }

    /* Show the line when the cursor is hovering over the element */
    .navbar a:hover::before {
        transform: scaleX(1); /* show the line */
    }
    .titlediv{

        margin-left: 40%;
        background: #fffff9;
        opacity: 0.8;
        margin-top: 60px;
        width: 15%;
        height: auto;
        border-style: hidden;
    }

    .mid{
        border-radius: 33%;
        margin-left: 25%;
        margin-top: 2%;
        width: 40%;
        height: auto;
        border-style: solid;
        padding-left: 50px;
    }



</style>

<!DOCTYPE html>
<html lang="">
<head>

    <div class="navbar">

        <a href="#">HomePage</a>
        <a href="#">Books</a>
        <a href="#">Forum</a>
        <a href="#">Reviews</a>
        <a href="#">Profile</a>
        <a href="#">Logout</a>

    </div>
</head>
<body>
<title>Author Search Page</title>
<div class="titlediv">
<h2  class="page">Author Search Page</h2>
    </div>
<div class="mid">
<form  method="post">
    <?php if (isset($_GET['error'])){ ?>
        <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>
    <br>
    <label>Author Name:</label>
    <input type = "text" name = "name" id="name"  placeholder="Author name">
    <br>
    <button class="publish-button" type = "submit" name="test" id="test"  > Search</button>

    <table>
        <?php
        $name = "";


        if(array_key_exists('test',$_POST)){

            $name = $_POST['name'];

            $sql =              "SELECT A.name, A.money_amount, A.user_id FROM author A
                             WHERE A.name  LIKE '$name%'" ;

        }
        else{
            $sql ="SELECT * FROM author" ;

        }
        $result =  mysqli_query($conn, $sql );

        if ($result->num_rows > 0 ){
            while ($row = $result-> fetch_assoc()){
                $name = $row["name"];
                $userid = $row["user_id"];
                echo "<tr>
                      <td>  Author :<a href='authorbooks.php?user_id=$userid&name=$name' > ", $row["name"], "</td> 

                         </tr> ";
            }
        }else {
            echo "No Results";
        }
        ?>
    </table>

</form>
</div>
</body>
</html>
