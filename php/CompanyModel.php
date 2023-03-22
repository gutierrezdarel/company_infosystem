<?php
// include 'connection.php';
require 'connection.php';

// FORM TRIGGER
if (isset($_POST['AddCompany'])) {
    insert_company();
}
if(isset($_POST['UpdateCompany'])){
    update_company();
}
if(isset($_POST['DeleteCompany'])){
    delete_company();
}

function e($data){
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

// INSERT COMPANY NAME
function insert_company(){
    global $db;
      $Companyname= e($_POST['Companyname']);
      $Companydescription = e($_POST['Companydescription']);

        $sql_insert = "INSERT INTO company (company_name,company_description) VALUES('$Companyname', '$Companydescription')";
        $query_insert  = mysqli_query($db, $sql_insert);

            if($query_insert){
                header('location:../company.php');
            }else{
                echo 'Not Inserted';
            }
}

// Display table Company
function table_company(){
    global $db;
        $sql_select = "SELECT * FROM company WHERE deleted_at IS NULL";
        $query_select = mysqli_query($db,$sql_select);
            if($query_select){
                foreach($query_select as $row){
                    echo '<tr>';
                    echo '<td id="comp_name-'.$row['id'].'">'.$row['company_name'].'</td>';
                    echo '<td id="comp_des-'.$row['id'].'">'.$row['company_description'].'</td>';
                    echo '<td><button class="btn_table" onclick = "edit_comp('.$row['id'].')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>
                    <button class="btn_table" onclick = "delete_comp('.$row['id'].')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button></td>';
                    echo '</tr>';
                }
             }
}


function update_company(){
    global $db;

    $comp_id = e($_POST['comp_id']);
    $update_compname = e($_POST['update_compname']);
    $update_compdes = e($_POST['update_compdes']); 

    $sql_update = "UPDATE company SET company_name = '$update_compname', company_description = '$update_compdes' WHERE id = '$comp_id'";
    $query_update = mysqli_query($db ,$sql_update);
        if($query_update){
            header("location: ../company.php");
        }else{
            echo 'Failed';
        }
}

function delete_company(){
    global $db;
    $dcomp_id = $_POST['dcomp_id'];

    $sql_delete = "UPDATE company SET deleted_at = NOW() WHERE id = '$dcomp_id'";
    $query_delete = mysqli_query($db, $sql_delete);

        if($query_delete){
            header("location: ../company.php");
        }else{
            echo 'Failed';
        }

}