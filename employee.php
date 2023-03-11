<?php
include 'includes/header.php';
include 'php/act_company.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>
<div class="content_wrapper">

<div class="header">
        <h1>Employee List</h1>
    </div>
    <div class="Add-buttons">
        <button><span>Employee</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg></button>
    </div>

    <!-- ADD EMPLOYEE MODAL -->

    <div class="overlay_add" id="overlay_add-employee">
        <div class="modal_add">
            <form action="php/act_company.php" method="post">
                <div class="modal-header">
                    <h1>Add Employee</h1>
                </div>

                <div class="select_department">
                    <select name="company_id" id="select_company" required>
                        <option selected disabled value="">Select Company</option>
                        <?php
                        select_company();
                        ?>
                    </select>
                </div>
                <div class="select_department">
                    <select name="company_id" id="append_company" required>
                        <option selected disabled value="">Select Department</option>
                        <?php
                    // display_select_dept();
                        ?>
                    </select>
                </div>
                <div class="select_department">
                    <select name="company_id" id="dispalay_company" required>
                        <option selected disabled value="">Select Position</option>
                        <?php
                        // select_company();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="First Name" name="fname" required>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="Last Name" name="lname" required>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="Location" name="location" required>
                </div>
                <div class="modal_input">
                    <input type="date" placeholder="Birthday" name="birthday" required>
                </div>
                <div class="modal_input">
                    <input type="number" placeholder="Contact" name="contact" required>
                </div>
                <div class="modal_input">
                    <input type="number" placeholder="Age" name="age" required>
                </div>

                <div class="modal-btn">
                    <button name="AddEmployee">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>