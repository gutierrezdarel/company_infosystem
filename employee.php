<?php
include 'includes/header.php';
include 'php/EmployeeModel.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>
<div class="content_wrapper">
    <div class="content_container">
        <div class="header">
            <p>Employee List </p>
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
                    <button type="button" class="btn-close" id="btn-close_emp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h1>Add Employee</h1>
                </div>
                <div class="employee_container">
                    <div class="employee_info">
                        <div class="modal_input">
                            <input type="text" class="input" name="fname" required>
                            <label for="" class="label">First Name</label>
                        </div>
                        <div class="modal_input">
                            <input type="text" class="input" name="lname" required>
                            <label for="" class="label">Last Name</label>
                        </div>
                        <div class="select">
                            <select name="gender" id="dispalay_company" required>
                                <option disabled selected value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female </option>
                            </select>
                        </div>
                        <div class="modal_input">
                            <input type="text" class="input" name="address" required>
                            <label for="" class="label">Address</label>
                        </div>
                        <div class="modal_input">
                            <input type="number" class="input contact" name="contact" required>
                            <label for="" class="label">Contact</label>
                        </div>
                        <div class="select">
                            <input type="date" name="birthday" placeholder="Birtday" id="Birthday" max="2000-01-01" required>
                        </div>
                        <div class="modal_input">
                            <input type="text" class="input" name="age" placeholder="Age" id="age" required readonly>
                            <label for="" class="label">Age</label>
                        </div>
                    </div>
                    <div class="eployee_compinfo">
                        <div class="select">
                            <select name="display_comp" id="addemp_company" onchange="emp_act('add_action')" required>
                                <option disabled selected value="">Company</option>
                                <?php
                                select_company();
                                ?>
                            </select>
                        </div>
                        <div class="select">
                            <select name="display_dept" class="display_empdept adisplay_empdept" onchange="dept_act('add_dept')" required>
                                <option selected disabled value="">Department</option>
                            </select>
                        </div>
                        <div class="select">
                            <select name="display_position" class="display_emppos" required>
                                <option disabled selected value="">Position</option>
                            </select>
                        </div>
                        <div class="select">
                            <select name="status" id="status" required>
                                <option disabled selected value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="not Active">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-btn">
                    <button class="add-btn cont_validation" id="cont_validation" type="submit" name="AddEmployee">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update modal Employee -->
    <div class="overlay" id="overlay_update-employee">
        <div class="modal_add">
            <form action="php/EmployeeModel.php" method="post">
                <div class="modal-header">
                    <button class="btn-close" type="button" id="btn-close_uemp">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h1>Update Employee</h1>
                </div>
                <div class="employee_container">
                    <div class="employee_info">
                        <input type="hidden" name="update_id" id="update_id" required>
                        <div class="modal_input">
                            <input type="text" name="update_fname" class="input" id="update_fname" required>
                            <label for="" class="label">Firt Name</label>
                        </div>
                        <div class="modal_input">
                            <input type="text" name="update_lname" class="input" id="update_lname" required>
                            <label for="" class="label">Last Name</label>
                        </div>
                        <div class="select">
                            <select name="update_gender" id="update_gender" required>
                                <option disabled selected value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female </option>
                            </select>
                        </div>
                        <div class="modal_input">
                            <input type="text" name="update_address" class="input" id="update_address" required>
                            <label for="" class="label">Address</label>
                        </div>
                        <div class="modal_input">
                            <input type="number" name="update_contact" class="input contact" id="update_contact" required>
                            <label for="" class="label">Contact</label>
                        </div>
                        <div class="select">
                            <input type="date" name="update_birthday" id="update_birthday" required>
                        </div>
                        <div class="modal_input">
                            <input type="number" name="update_age" class="input" id="update_age" required readonly>
                            <label for="" class="label">Age</label>
                        </div>
                    </div>
                    <div class="eployee_compinfo">
                        <div class="select">
                            <div class="current">
                                <span> Current Company:</span>
                                <p id="comp_name"></p>
                            </div>

                            <select name="udisplay_comp" id="uemp_company" onchange="emp_act('update_action')" required>
                                <option disabled selected value="">Company</option>
                                <?php
                                select_company();
                                ?>

                            </select>
                        </div>
                        <div class="select">
                            <div class="current">
                                <span> Current Dept:</span>
                                <p id="dept_name"></p>
                            </div>
                            <select name="udisplay_dept" class="display_empdept udisplay_empdept" id="udisplay_empdept" onchange="dept_act('update_dept')" required>
                                <option selected disabled value="">Department</option>
                                <!-- <option value="SoftWare developer">Department</option> -->
                            </select>
                        </div>
                        <div class="select">
                            <div class="current">
                                <span> Current Position:</span>
                                <p id="pos_name"></p>
                            </div>
                            <select name="update_position" class="display_emppos" required>
                                <option disabled selected value="">Position</option>

                            </select>
                        </div>
                        <div class="select">
                            <select name="update_status" id="update_status" required>
                                <option disabled selected value="">Status</option>
                                <option value="Active">Active</option>
                                <option value="not Active">Not Active</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-btn">
                    <button class="add-btn cont_validation" name="UpdateEmployee">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Employee -->
    <div class="overlay" id="overlay_delete-employee">
        <div class="modal_add">
            <form action="php/EmployeeModel.php" method="post">
                    <button type="button" class="btn-close btn-close-demp" >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>    
                <input type="hidden" name="emp_id" id="emp_id">
                    <div class="delete">
                        <p> Are you sure Do you wan't to delete</p>
                        <p>this Employee?</p>
                    </div>
                <div class="modal-btn-delete">
                    <button class="add-btn-no btn-close-demp" type="button" >No</button>
                    <button class="add-btn-yes" name="DeleteEmployee">Yes</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="Js/actions.js"></script>