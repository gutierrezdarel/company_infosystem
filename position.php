<?php
include 'includes/header.php';
include 'php/PositionModel.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content_wrapper">
    <div class="content_container">

        <div class="header">
            <h1>Position List </h1>
            <button id="btn_add-position">Add Position</button>
        </div>
        <div class="filter">
            <select name="" id="append_position" onchange="getposition()">
                <!-- <option selected disabled>Filter Department</option> -->
                <?php 
                select_department();
                ?>
            </select>
        </div>
        <div class="company_table">
            <table>
                <thead>
                    <tr>
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
    <p class="pos_norec"></p>

        <!-- ADD MODAL Position -->
    <div class="overlay" id="overlay_add-position">
        <div class="modal_add">
            <form action="php/PositionModel.php" method="post">
                <div class="modal-header">
                    <h1>Add Position</h1>
                </div>
                <div class="select_department">
                    <select name="department_id" id="dispalay_company" required>
                        <option selected disabled value="">Select Department</option>
                        <?php
                       select_department();
                        ?>
                    </select>
                </div>
                <div class="modal_input">
                    <input type="text" name="Positionname" placeholder="Position Name" required>
                </div>
                <div class="modal_input">
                    <input type="text" name="Positiondescription"  placeholder="Position Description" required>
                </div>
                <div class="modal-btn">
                    <button type="button" id="btn-close_pos">close</button>
                    <button name="AddPosition">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>