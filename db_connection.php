<?php

$sname = "localhost";
$uname = "root";
$password = "1231";
$db_name = "groupdatabase2";


$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn){
    echo "Connection failed!";
}