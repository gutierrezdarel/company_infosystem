<?php
require "connection.php";
session_start();
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'submit') {
        login();
    }
}

if(isset($_POST['upload'])){
    upload_image();
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

function upload_image(){
    global $db;
    
    $UploadDir =  "../img/";
    $user_id = $_POST['user_id'];
    $fileName  = basename($_FILES['file']['name']);
    $FilePath = $UploadDir . $fileName;
    $FileType = pathinfo($FilePath,PATHINFO_EXTENSION);

    $errormsg = '';

    $type = array('jpg','jpeg','png','gif');

    if(in_array($FileType, $type)){
        if(move_uploaded_file($_FILES['file']['tmp_name'], $FilePath)){
            $sql_update = "UPDATE users SET img = '$fileName' WHERE id = '$user_id'";
            $query_update = mysqli_query($db, $sql_update);
            if($query_update){
                header('location:../dashboard.php');
            }else{
              $errormsg = 'Not updated';
            }
        }else{
            $errormsg = 'Sorry,there was an error uploading your file.';
        }
    }else{
        $errormsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }

    echo $errormsg;
}


function select_user(){
    global $db;

    $sql = "SELECT id FROM users";
    $query_select = mysqli_query($db, $sql);
        if($query_select){
            foreach($query_select as $row){
                echo '<button class="upload-btn" onclick= "userid('.$row['id'].')">Upload</button>';
            }
        }
}

function select_image(){
        global $db;
    
    $sql_select_image = "SELECT img From users";
    $query_select_image = mysqli_query($db , $sql_select_image);
    if($query_select_image){
        foreach($query_select_image as $img){
            echo '<img src="./img/'.$img['img'].'" alt="">';
        }
    }
}
?>