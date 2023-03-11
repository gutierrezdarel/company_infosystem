<?php

session_start();

if (isset($_SESSION['ID'])) {
    header("location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="center">
        <h1>Login</h1>
      
        <div class="form">
        <div class="txt_field">
                <input type="text" name="username" id="username"   required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password"  required>
                <span></span>
                <label>Password</label>
            </div>
            <button type="submit" class="button" onclick="login('submit')">Login</button>
        </div>
    </div>
</body>
</html>
<script>
     function login(action) {
            var login_data = {
                action: action,
                username: $("#username").val(),
                password: $("#password").val(), 
            };  

            $.ajax({
                url: 'php/login.php',
                type: 'POST',
                data: login_data,
                success: function(response) {
                        
                    if( $("#username").val() == "" || $("#password").val() == "" ){
                        

                    }
                        if(response == 'Success'){
                            window.location.href = 'dashboard.php';

                        }else if(response == 'Failed'){
                            $('#username').addClass("wrong");
                            $('#password').addClass("wrong");
                            $(".txt_field").click(function(){
                                // alert('hey');
                                $('#username').removeClass("wrong");
                                $('#password').removeClass("wrong");

                            })
                        }

                    
                }
            })  
    }

</script>