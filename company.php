<?php
include 'includes/header.php';
include 'php/CompanyModel.php';

session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content_wrapper">
    <div class="content_container">
        <div class="header">
            <h1>Company List </h1>
            <button id="btn_add-company">Add Company</button>
        </div>
        <div class="company_table">
            <table>
                <thead>
                    <tr>
                        <th>Company</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        table_company();
                    ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- ADD MODAL Company -->
    <div class="overlay" id="overlay_add-company">
        <div class="modal_add">
            <form action="php/CompanyModel.php" method="post">
                <div class="modal-header">
                    <h1>Add Company</h1>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="Company Name" name="Companyname" required>
                </div>
                <div class="modal_input">
                    <input type="text" placeholder="Company Description" name="Companydescription" required>
                </div>
                <div class="modal-btn">
                <button type="button" id="btn-close-comp">close</button>
                    <button name="AddCompany">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>