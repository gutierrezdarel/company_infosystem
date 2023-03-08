<?php
include 'includes/header.php';
include 'php/act_company.php';
?>

<div class="content_wrapper">
    <div class="header">
        <h1>Company List</h1>
    </div>
    <div class="dashboard_container-content">

        <!-- COMPANY CARD -->
        <!-- <div class="add_company-card">
            <p>Add company</p>
            <div class="card_content">
                <input type="text" value="Testing" readonly>
                <button>Edit</button>
                <button>Delete</button>
            </div>
            <div class="add_button">
            <button>Add</button>
            </div>
        </div> -->
        <div class="modal_overlay">
            <div class="company_modal-container">
                <form action="php/act_company.php" method="post">
                    <div class="input">
                        <input type="text" name="Companyname" required>
                    </div>
                    <button type="submit" name="Addcompany">Add</button>
                </form>
            </div>
        </div>

        <!-- DEPARTMENT CARD -->
        <div class="add_deparment-card">
            <p>Add Department</p>

            <div class="card_dept">

                <?php
                select_company();
                ?>
            </div>
        </div>

        <!-- Modal add department -->
        <div class="overlay_department" id="add_dept-modal">
            <div class="card_modal">
                <form action="php/act_company.php" method="POST">
                    <input type="text" id="company_id" name="company_id">
                    <div class="content_department">
                        <input type="text" placeholder="Department" name="dept_name" required>
                    </div>
                    <div class="btn-department">
                        <button type="submit" name="Add_dept">Add Dept</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- POSITION CARD -->
        <div class="add_position-card">
            <p>Add Position</p>

            <div class="card_position">
                <select name="" id="select_dept">
                    <option value="">Department</option>
                <?php 
                        select_dept();
                    ?>

                </select>
                    
            </div>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>