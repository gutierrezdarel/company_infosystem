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
            <button id="btn_add-company" class="add-comp"><span>ADD</span><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
            </button>
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
                <!-- <div class="close-btn"> -->
                    <button class="btn-close" id="btn-close-comp" >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>    
            <!-- </div> -->
                <div class="modal-header">
                    <h1>Add Company</h1>
                </div>
                <div class="modal_input">
                    <input type="text" name="Companyname" class="input" autocomplete="off" required>
                    <label for="" class="label">Company Name</label>
                </div>
                <div class="modal_input">
                    <textarea rows="2" cols="20" name="Companydescription" class="input" required></textarea>
                    <label for="" class="label">Company Description</label>
                </div>
                <div class="modal-btn">
                    <!-- <button type="button" id="btn-close-comp">close</button> -->
                    <button class="add-btn" name="AddCompany">ADD</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Update MODAL Company -->
    <div class="overlay" id="overlay_update-company">
        <div class="modal_add">
            <form action="php/CompanyModel.php" method="post">
            <button class="btn-close" type="button" id="btn-close-ucomp" >
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button> 
                <div class="modal-header">
                    <h1>Edit Company</h1>
                </div>
                <input type="hidden"  name="comp_id" id="comp_id" required>
                <div class="modal_input">
                    <input type="text" class="input" name="update_compname" id="update_comp-name" required>
                    <label for="" class="label">Company Name</label>
                </div>
                <div class="modal_input">
                <textarea type="text" rows="2" cols="20" class="input" id="update_comp-des" name="update_compdes"></textarea>
                <label for="" class="label">Company Description</label>
                </div>
                <div class="modal-btn">
                    <button class="add-btn" name="UpdateCompany">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="Js/actions.js"></script>