<?php
include 'includes/header.php';
include 'php/DepartmentModel.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content_wrapper">
    <div class="content_container">

        <div class="header">
            <h1>Department List </h1>
            <button id="btn_add-department">Add Department</button>
        </div>
        <div class="filter">
            <select name="" id="select_table" onchange="getselected()">
                <!-- <option selected value="all">All</option> -->
                <?php 
                select_company();
                ?>
            </select>
        </div>
        <div class="company_table">
            <table>
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                   
                </thead>
                <tbody class="dept">
                     
                </tbody>
            </table>
        </div>
    </div>
    <p class="dept_norec"></p>

        <!-- ADD MODAL Department -->
    <div class="overlay" id="overlay_add-department">
        <div class="modal_add">
            <form action="php/DepartmentModel.php" method="post">
                <div class="modal-header">
                    <h1>Add Department</h1>
                </div>
                <div class="select_department">
                    <select name="company_id" id="dispalay_company" required>
                        <option selected disabled value="">Select Company</option>
                        <?php
                        select_company();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" name="Departmentname" placeholder="Department Name" required>
                </div>
                <div class="modal_input">
                    <input type="text" name="Departmentdescription"  placeholder="Department Description" required>
                </div>
                <div class="modal-btn">
                    <button type="button" id="btn-close-dept">close</button>
                    <button name="AddDepartment">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>