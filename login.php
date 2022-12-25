<?php
include ("db_connection.php");
session_start();

if(isset($_POST['email']) && isset($_POST['password'])){

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        return htmlspecialchars($data);
    }

    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);

    if (empty($email)){
        header("Location: index.php?error=Email is required ");
        exit();
    }else if (empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }
    else{
        $sql = "SELECT * FROM registered WHERE email = '$email' AND hashed_password = '$pass'";
        $author_sql = "SELECT A.name FROM author A, registered R WHERE A.user_id = R.user_id ";

        $author_result = mysqli_query($conn, $author_sql );

        $result = mysqli_query($conn, $sql );


        if (mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if (strcasecmp($row['email'],$email) == 0 &&$row['hashed_password'] == $pass){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['wallet'] = $row['wallet'];
                header("Location: home.php");
                exit();

            } else{
                header("Location: index.php?error=Incorrect email or password");
                exit();
            }

        }
        else{
            header("Location: index.php?error=Incorrect Email name or password");
            exit();
        }
    }
}
else{
    header("Location : index.php");
    exit();
}