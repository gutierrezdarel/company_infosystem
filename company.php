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
        <h1>Company List</h1>
    </div>
    <div class="dashboard_container-content">
        <div class="Add-buttons">
                <button id="btn_show_company"><span>Company</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg></button>
                <button id="btn_show-department"><span>Department</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg></button>
                <button id="btn_show_company"><span>Position</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg></button>
        </div>

        <!-- <div class="card1-container">
            <div class="company-title">
                <h1>Company</h1>
            </div>
            <div class="company-content">
            <?php
            //    display_company();
            ?>
            </div>
            <div class="btn_add-company">
                <button id="btn_show_company"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></button>
            </div>
        </div> -->

        <div class="card2-content">
                    <?php
                    select_dept();
                    ?>
        </div>
        <!-- 
        <div class="card">
            <div class="company-title">
                <h1>Position</h1>
            </div>
                <?php
                // select_position();
                ?>
            <div class="btn_add-department">
                <button id = "btn_show-position">Add</button>
            </div>
        </div> -->

    </div>



    <!-- ADD MODAL Company -->
    <div class="overlay_add" id="overlay_add-company">
        <div class="modal_add">
            <form action="php/act_company.php" method="post">
                <div class="modal-header">
                    <h1>Add Company</h1>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="Company Name" name="Companyname" required>
                </div>
                <div class="modal-btn">
                    <button name="AddCompany">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ADD MODAL Department -->
    <div class="overlay_add" id="overlay_add-department">
        <div class="modal_add">
            <form action="php/act_company.php" method="post">
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
                    <input type="text" placeholder="Department Name" name="Departmentname" required>
                </div>
                <div class="modal-btn">
                    <button name="AddDeparment">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ADD POSITION -->
    <div class="overlay_add" id="overlay_add-position">
        <div class="modal_add">
            <form action="php/act_company.php" method="post">
                <div class="modal-header">
                    <h1>Add Position</h1>
                </div>
                <div class="select_department">
                    <select name="department_id" id="dispalay_company" required>
                        <option selected disabled value="">Select Company</option>
                        <?php
                        display_select_dept();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="Department Name" name="Positionname" required>
                </div>
                <div class="modal-btn">
                    <button name="AddPosition">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="Js/actions.js"></script>