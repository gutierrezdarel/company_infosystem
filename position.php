<?php
include 'includes/header.php';
include 'php/PositionModel.php';

// session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content_wrapper">
    <div class="content_container">

        <div class="header">
            <p>Position List </p>
            <button id="btn_add-position" class="add-comp"><span>ADD</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                    <line x1="12" y1="5" x2="12" y2="19"></line>
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                </svg>
            </button>
        </div>
        
        <div class="company_table">
        <div class="filter">
            <select name="" id="append_position" onchange="getposition()">
                <!-- <option selected disabled>Filter Department</option> -->
                <?php
                select_department();
                ?>
            </select>
        </div>
            <table>
                <thead>
                    <tr>
                        <th>Department</th>
                        <th>Position</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="position">

                </tbody>
            </table>
        </div>
    </div>
    <p class="pos_norec records"></p>

    <!-- ADD MODAL Position -->
    <div class="overlay" id="overlay_add-position">
        <div class="modal_add">
            <form action="php/PositionModel.php" method="post">
                <div class="modal-header">
                    <button class="btn-close" type="button" id="btn-close_pos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h1>Add Position</h1>
                </div>
                <div class="select">
                    <select name="department_id" required>
                        <option selected disabled value="">Select Department</option>
                        <?php
                        select_department();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" class="input" name="Positionname" required>
                    <label for="" class="label">Position Name</label>
                </div>
                <div class="modal_input">
                    <textarea type="text" rows="2" cols="21" class="input" name="Positiondescription" required></textarea>
                    <label for="" class="label">Position Description</label>
                </div>
                <div class="modal-btn">
                    <!-- <button >close</button> -->
                    <button class="add-btn" name="AddPosition">ADD</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Update modal Position -->
    <div class="overlay" id="overlay_update-position">
        <div class="modal_add">
            <form action="php/PositionModel.php" method="post">
                <div class="modal-header">
                    <button class="btn-close" type="button" id="btn-close_upos">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                    <h1>Edit Position</h1>
                </div>
                <input type="hidden" name="upos_id" placeholder="Position Name" id="upos_id" required>
                <div class="select">
                    <select name="dept_id" id="dept_id" required>
                        <option selected disabled value="">Select Department</option>
                        <?php
                        select_department();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" name="update_posname" class="input" id="update_posname" required>
                    <label for="" class="label">Position Name</label>
                </div>
                <div class="modal_input">
                    <textarea type="text" rows="2" cols="21" name="update_posdes" class="input" id="update_posdes" required></textarea>
                    <label for="" class="label">Position Description</label>
                </div>
                <div class="modal-btn">
                    <!-- <button type="button" >close</button> -->
                    <button class="add-btn" name="UpadatePosition">Save</button>
                </div>
            </form>
        </div>
    </div>

    <!-- DELETE POSITION -->
    <div class="overlay" id="overlay_delete-position">
        <div class="modal_add">
            <form action="php/PositionModel.php" method="post">
                    <button type="button" class="btn-close btn-close-dpos" >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>    
                <input type="hidden" name="pos_id" id="pos_id">
                    <div class="delete">
                        <p class="delete_text"> </p>
                        <p class="delete_text2 "></p>
                    </div>
                <div class="modal-btn-delete">
                    <button class="add-btn-no btn-close-dpos" type="button" >No</button>
                    <button class="add-btn-yes" id="yes" name="DeletePosition">Yes</button>
                </div>
            </form>
        </div>
    </div>


</div>

<script src="Js/actions.js"></script>
<Script>
    window.addEventListener("load", function() {
    $(".sidebar-link").removeClass("active")
    $(".base-position").addClass("active")
  })

</Script>