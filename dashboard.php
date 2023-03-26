<?php
include 'includes/header.php';
include 'php/CountModel.php';

// session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content_wrapper">
    <div class="content_container">
        <div class="header">
            <p>Dashboard</p>
        </div>
        <div class="line">   
        </div>
        <div class="dashboard_content">
            <div class="container_card-1">
                <div class="card_content-wrapper">
                    <p>Company</p>
                    <!-- <input type="text" value="" readonly>
                 --> <p class="total-count"><?php total_company() ?></p>
                    <p class="text-mute">Total Companys</p>
                </div>
                <div class="box_icon">
                    <img src="img/buildings.png" alt="">
                </div>
            </div>

            <div class="container_card-1">
                <div class="card_content-wrapper">
                    <p>Department</p>
                    <p class="total-count"><?php total_department() ?></p>
                    <p class="text-mute">Total Departments</p>
                </div>
                <div class="box_icon dept-icon">
                    <img src="img/networking.png" alt="">
                </div>
            </div>
            <div class="container_card-1">
                <div class="card_content-wrapper">
                    <p>Position</p>
                    <p class="total-count"><?php total_position() ?></p>
                    <p class="text-mute">Total Positions</p>
                </div>
                <div class="box_icon comp-icon">
                    <img src="img/list.png" alt="">
                </div>
            </div>
            <div class="container_card-1">
                <div class="card_content-wrapper">
                    <p>Employee</p>
                    <p class="total-count"><?php total_employee() ?></p>
                    <p class="text-mute">Total Employees</p>
                </div>
                <div class="box_icon emp-icon">
                    <img src="img/employees.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<script src="Js/actions.js"></script>
<Script>
    window.addEventListener("load", function() {
    $(".sidebar-link").removeClass("active")
    $(".base-dashboard").addClass("active")
    // alert('hey')
  })

</Script>