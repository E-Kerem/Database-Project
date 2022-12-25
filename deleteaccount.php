<?php
include ("db_connection.php");
session_start();
?>
<style>
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
    .mid{
        width: 20%;
        height: auto;
        border-style: solid;
        margin-top: 5%;
        margin-left: 40%;
        padding-left: 10px;
    }
    .publish-button {
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
    .ca{
        color: #003399;
        border-style: double;
        margin-left: 50px;
    }
</style>

<!DOCTYPE html>
<html lang="">
<head>
    <title>DELETE ACCOUNT PAGE</title>
</head>

<div class="navbar">
    <a href="#">HomePage</a>
    <a href="#">Books</a>
    <a href="#">Forum</a>
    <a href="#">Reviews</a>
    <a href="#">Profile</a>
    <a href="#">Logout</a>

</div>


<div class="mid">
<h1>Are you sure you want to delete your account ?</h1>
<a class="ca" href="home.php">No</a>
<a class="ca" href="deleteaccount.inc.php">Yes</a>
</div>


</html>