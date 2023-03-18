<?php
include 'includes/header.php';
include 'php/EmployeeModel.php';
// include 'php/DepartmentModel.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>
<div class="content_wrapper">
    <div class="content_container">
        <div class="header">
            <h1>Employee List </h1>
            <button id="btn_add-employee" class="add-comp"><span>ADD</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
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
                                <option disabled selected value="">Select Gender</option>
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
                            <select name="display_comp" id="addemp_company" onchange="emp_act('add_action')" required>
                                <option disabled selected value="">Company</option>
                                <?php
                                select_company();
                                ?>
                            </select>
                        </div>
                        <div class="select_department">
                            <select name="display_dept" class="display_empdept adisplay_empdept" onchange="dept_act('add_dept')" required>
                                <option selected disabled value="">Department</option>
                            </select>
                        </div>
                        <div class="select_department">
                            <select name="display_position" class="display_emppos" required>
                                <option disabled selected value="">Position</option>
                            </select>
                        </div>
                        <div class="select_department">
                            <select name="status" id="status" required>
                                <option disabled selected value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="not Active">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-btn">
                    <button type="button" id="btn-close_emp">Close</button>
                    <button type="submit" name="AddEmployee">ADD</button>
                </div>
            </form>
        </div>
    </div>



    <!-- Update modal Employee -->
    <div class="overlay" id="overlay_update-employee">
        <div class="modal_add">
            <form action="php/EmployeeModel.php" method="post">
                <div class="modal-header">
                    <h1>Update Employee</h1>
                </div>
                <div class="employee_container">
                    <div class="employee_info">
                    <input type="hidden" name="update_id" placeholder="First Name" id="update_id" required>
                        <div class="modal_input">
                            <input type="text" name="update_fname" placeholder="First Name" id="update_fname" required>
                        </div>
                        <div class="modal_input">
                            <input type="text" name="update_lname" placeholder="Last Name" id="update_lname" required>
                        </div>
                        <div class="select_department">
                            <select name="update_gender" id="update_gender" required>
                                <option disabled selected value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female </option>
                            </select>
                        </div>
                        <div class="modal_input">
                            <input type="text" name="update_address" placeholder="Address" id="update_address" required>
                        </div>
                        <div class="modal_input">
                            <input type="number" name="update_contact" placeholder="Contact" id="update_contact" required>
                        </div>
                        <div class="modal_input">
                            <input type="date" name="update_birthday" placeholder="Birtday" id="update_birthday"  required>

                        </div>
                        <div class="modal_input">
                            <input type="number" name="update_age" placeholder="Age" id="update_age" required readonly>
                        </div>
                    </div>
                    <div class="eployee_compinfo">
                        <div class="select_department">
                        <p id="comp_name" ></p>
                            <select name="udisplay_comp" id="uemp_company" onchange="emp_act('update_action')" required>
                                <option disabled selected value="">Company</option>
                                <?php
                                select_company();
                                ?>

                            </select>
                        </div>
                        <div class="select_department">
                            <p id="dept_name" ></p>
                            <select name="udisplay_dept" class="display_empdept udisplay_empdept" id="udisplay_empdept" onchange="dept_act('update_dept')" required>
                                <option selected disabled value="">Department</option> 
                                <!-- <option value="SoftWare developer">Department</option> -->
                            </select>
                        </div>
                        <div class="select_department">
                        <p id="pos_name" ></p>
                            <select name="update_position" class="display_emppos" required>
                                <option disabled selected value="">Position</option>

                            </select>
                        </div>
                        <div class="select_department">
                            <select name="update_status" id="update_status" required>
                                <option disabled selected value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="not Active">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-btn">
                    <button type="button" id="btn-close_uemp">Close</button>
                    <button name="UpdateEmployee">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>