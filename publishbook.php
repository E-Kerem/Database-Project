<?php
session_start();
?>

<!DOCTYPE html>
<html lang="">
<head>
    <title>HOME PAGE</title>
</head>
<body>
<h2>Publish a book</h2>

<form action="publishbook.inc.php" method="post" enctype="multipart/form-data">
    <?php if (isset($_GET['error'])){ ?>
        <p class = "error"><?php echo  $_GET['error']; ?></p>
    <?php }?>
    <br>
    <label>Book Title:</label>
    <br>
    <input type = "text" name = "bookTitle" placeholder="Book Title">
    <select name="genre" id="genre">
        <option value="action">Action</option>
        <option value="comedy">Comedy</option>
        <option value="drama">Drama</option>
        <option value="fantasy">Fantasy</option>
        <option value="horror">Horror</option>
        <option value="romance">Romance</option>
    </select>
    <input type="number" min="1" name = "bookPrice" placeholder="Price" step="any" />
    <input type="file" name="file" size="50" />
    <br />

    <button type = "submit"> Publish Book</button>

    <a href="home.php">Go Back</a>
</form>
</body>
</html>