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
            <p>Department List </p>
            <button id="btn_add-department" class="add-comp"><span>ADD</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
        </div>
        
        <div class="company_table">
        <div class="filter">
            <select name="" id="select_table" onchange="getselected()">
                <!-- <option selected value="all">All</option> -->
                <?php
                select_company();
                ?>
            </select>
        </div>
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
                    <button type="button" class="btn-close" id="btn-close-dept">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h1>Add Department</h1>
                </div>
                <div class="select">
                    <select name="company_id" id="dispalay_company" required>
                        <option selected disabled value="">Select Company</option>
                        <?php
                        select_company();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" class="input" name="Departmentname" required>
                    <label for="" class="label">Department Name</label>
                </div>
                <div class="modal_input">
                    <textarea rows="2" cols="21"  name="Departmentdescription" class="input" required></textarea>
                    <label for="" class="label">Department Description</label>
                </div>
                <div class="modal-btn">
                    <button class="add-btn" name="AddDepartment">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update MODAL Department -->
    <div class="overlay" id="overlay_update-department">
        <div class="modal_add">
            <form action="php/DepartmentModel.php" method="post">
                <div class="modal-header">
                    <button class="btn-close" type="button" id="btn-close-udept">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h1>Edit Department</h1>
                </div>
                <input type="hidden" name="udept_id" placeholder="Department Name" id="udept_id" required>
                <div class="select">
                    <select name="ucompany_id" id="update_comp_id" required>
                        <!-- <option selected disabled value="">Select Company</option> -->
                        <?php
                        select_company();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" class="input" name="update_deptname" id="Update_deptname" required>
                    <label for="" class="label">Department Name</label>
                </div>
                <div class="modal_input">
                    <textarea rows="2" cols="21" name="update_des" class="input" id="Update_deptdes" required></textarea>
                    <label for="" class="label">Department Description</label>
                </div>
                <div class="modal-btn">
                    <button class="add-btn" name="UpdateDepartment">Save</button>
                </div>
            </form>
        </div>
    </div>

       <!-- DELETE DEPARTMENT -->
       <div class="overlay" id="overlay_delete-department">
        <div class="modal_add">
            <form action="php/DepartmentModel.php" method="post">
                    <button type="button" class="btn-close btn-close-ddept" >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>    
                <input type="hidden" name="dept_id" id="dept_id">
                    <div class="delete">
                        <p> Are you sure Do you wan't to delete</p>
                        <p>this Department?</p>
                    </div>
                <div class="modal-btn-delete">
                    <button class="add-btn-no btn-close-ddept" type="button" >No</button>
                    <button class="add-btn-yes" id="dept-yes" name="DeleteDepartment">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>