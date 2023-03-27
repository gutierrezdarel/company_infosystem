<!DOCTYPE html>
<html lang="en">
<?php
include 'php/login.php';
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/content.css">
</head>

<body>

    <div class="base_container">
        <div class="header_wrapper">
            <h1> Employee Information System</h1>
            <button class="logout"><a href="logout.php" class="log">Logout</a>
            </button>

        </div>
        <div class="sidebar_wrapper">
            <div class="upload-img">
                <?php 
                select_image();
                ?>
            </div>
            <p>Admin</p>
            <?php 
                select_user();
                ?>
            <div class="border-line">
              
            </div>
            <div class="sidebar_content">

                <ul>
                    <li><a href="dashboard.php" class="base-dashboard sidebar-link"><span class="span"><img src="img/dashboard.png" alt=""> </span> Dashboard  </a></li>
                    <li><a href="company.php" class="base-company sidebar-link"> <span class="span"><img src="img/buildings.png" alt=""> </span> Company List</a></li>
                    <li><a href="department.php" class="base-department sidebar-link"><span class="span"><img src="img/networking.png" alt=""> </span> Department List</a></li>
                    <li><a href="position.php" class="base-position sidebar-link"><span class="span"><img src="img/list.png" alt=""> </span> Position List</a></li>
                    <li><a href="employee.php" class="base-employee sidebar-link"><span class="span"><img src="img/employees.png" alt=""> </span> Employee List</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="upload-overlay" >
        <div class="modal_add">
            <form action="php/login.php" method="post" enctype="multipart/form-data">
            <button class="btn-close" type="button" id="btn-close-upload" >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button> 
                <div class="modal-header">
                    <h1>Upload Company</h1>
                </div>
                <input type="hidden" id="user_id" name="user_id">
                <input type="file"  name="file" required>
            
                <div class="modal-btn">
                    <button class="add-btn" name="upload">Upload</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>

<script>

function userid(id){

    $('#user_id').val(id)
    // console.log(id)
  }

</script>