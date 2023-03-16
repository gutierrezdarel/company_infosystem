<?php
include 'includes/header.php';
include 'php/EmployeeModel.php';
include 'php/DepartmentModel.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>
<div class="content_wrapper">
    <div class="content_container">
        <div class="header">
            <h1>Employee List </h1>
            <button id="btn_add-employee">Add Employee</button>
        </div>
        <div class="company_table">
            <table>
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Birtday</th>
                        <th>Age</th>
                        <th>Company</th>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php 
                    table_employee();
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- ADD EMPLOYEE MODAL -->

    <div class="overlay" id="overlay_add-employee">
        <div class="modal_add">
            <form action="php/EmployeeModel.php" method="post">
                <div class="modal-header">
                    <h1>Add Employee</h1>
                </div>
                <div class="employee_container">
                    <div class="employee_info">
                        <div class="modal_input">
                            <input type="text" name="fname" placeholder="First Name" required>
                        </div>
                        <div class="modal_input">
                            <input type="text" name="lname" placeholder="Last Name" required>
                        </div>
                        <div class="select_department">
                            <select name="gender" id="dispalay_company" required>
                                <option disabled selected>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female </option>
                            </select>
                        </div>
                        <div class="modal_input">
                            <input type="text" name="address" placeholder="Address" required>
                        </div>
                        <div class="modal_input">
                            <input type="number" name="contact" placeholder="Contact" required>
                        </div>
                        <div class="modal_input">
                            <input type="date" name="birthday" placeholder="Birtday" id="Birthday" required>
                            
                        </div>
                        <div class="modal_input">
                            <input type="number" name="age" placeholder="Age" id="age" required readonly>
                        </div>
                    </div>
                    <div class="eployee_compinfo">
                        <div class="select_department">
                            <select name="display_comp" id="addemp_company" required>
                                <option disabled selected>Company</option>
                                <?php 
                                select_company();
                                ?>
                          
                            </select>
                        </div>
                        <div class="select_department">
                            <select name="display_dept" id="display_empdept" required>
                                <option selected>Department</option>
                            </select>
                        </div>
                        <div class="select_department">
                            <select name="display_position" id="display_emppos" required>
                                <option disabled selected>Position</option>
                                <!-- <option value="">Male</option>
                                <option value="">Female </option> -->
                            </select>
                        </div>
                        <div class="select_department">
                            <select name="status" id="status" required>
                                <option disabled selected>Status</option>
                                <option value="Active">Active</option>
                                <option value="not Active">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-btn">
                    <button type="button" id="btn-close_emp">Close</button>
                    <button name="AddEmployee">ADD</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="Js/actions.js"></script>