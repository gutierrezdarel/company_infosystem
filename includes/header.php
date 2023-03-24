<!DOCTYPE html>
<html lang="en">

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
            <img src="img/admin.png" alt="">
            </div>
            <p>Admin</p>
           
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
</body>

</html>