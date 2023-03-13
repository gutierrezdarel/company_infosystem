<?php
require "connection.php";
session_start();
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'submit') {
        login();
    }
}

function login()
{
    global $db;

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    $sql_login = "SELECT * FROM users WHERE Username= '$username' AND Pass = '$password'";
    $query_login = mysqli_query($db, $sql_login);
    if ($row = mysqli_fetch_assoc($query_login)) {
        $_SESSION['ID'] = $row['id'];
          echo "Success";
    } else {
        echo "Failed";
    }

        // echo $password;
}
?>