<?php
session_start();
?>
<style>
    /* Add some style to the navigation bar */
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



    .profile-photo {
        border-radius: 50%; /* round the corners of the photo */
        width: 80px; /* set the width of the photo */
        height: 80px; /* set the height of the photo */
    }

    .back-button{
        alignment: right;
        margin-top: 15px;
        color: #0066ff;
    }

    .publish-form{
        width: 80%;
        margin-left: 10%;
        height: auto;
        display: inline-block;
        color: green;
    }
    .publish-text{
        alignment: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .element{
        display: flex;
        margin-left: 40%;
        margin-bottom: 10px;
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
    </style>
<!DOCTYPE html>
<html lang="">
<head>
    <title>HOME PAGE</title>
</head>

<body><!-- Navigation bar -->
<div class="navbar">
    <a href="#">HomePage</a>
    <a href="#">Books</a>
    <a href="#">Forum</a>
    <a href="#">Reviews</a>
    <a href="#">Profile</a>
    <a href="#">Logout</a>
    
</div>
<form action="publishbook.inc.php" method="post">
<body>

<form action="publishbook.inc.php" method="post" enctype="multipart/form-data">
    <?php if (isset($_GET['error'])){ ?>
        <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>

    <br>
    <div class="publish-form">
        <div class="publish-text">
    <h2> You can publish book by giving information below</h2>
        </div>
        <div class="element">
    <label>Book Title:</label>
    <br>
    <input type = "text" name = "bookTitle" placeholder="Enter Book Title">
            </div>
        <div class="element">
            <label>Book Price:</label>
            <br>
            <input type="number" min="1" name = "bookPrice" placeholder="Price" step="any" />
        </div>
        <div class="element">
            <label>Pdf File:</label>
            <br>
            <input type="file" name="file" size="50" />

        </div>
        <div class="element">
        <label>Select Genre:</label>
    <select name="genre" id="genre">
        <option value="action">Action</option>
        <option value="comedy">Comedy</option>
        <option value="drama">Drama</option>
        <option value="fantasy">Fantasy</option>
        <option value="horror">Horror</option>
        <option value="romance">Romance</option>
    </select>

        </div>

        <div class="element">
            <label> You can publish:</label>
            <button class="publish-button"type = "submit"> Publish Book
            </button>
        </div>

        <div class="element">
            <label>Or either go back:</label>
            <button class = "publish-button">
                <a href="home.php"></a>
                Go Back
            </button>
        </div>

        <div class="element">
            <?php if (isset($_GET['error'])){ ?>
                <p class = "error"><?php echo  $_GET['error']; ?></p>
            <?php }?>
        </div>






</form>
</body>
</html>