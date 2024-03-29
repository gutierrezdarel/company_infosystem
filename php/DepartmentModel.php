<?php 
require 'connection.php';
    // FORM BTN
    if(isset($_POST['AddDepartment'])){
        insert_department();
    }
    // FORM BTN
    if(isset($_POST['UpdateDepartment'])){
        update_department();
    }
    if(isset($_POST['DeleteDepartment'])){
        delete_department();
    }
    if(isset($_GET['comp-json'])){
        data_compselect();
    }

    // AJAX APPEND
    if(isset($_POST['append'])){
        append_table();
    }
   

    
function e($data){
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

// Insert  Department 
function insert_department(){
    global $db;

    $company_id = e($_POST['company_id']) ;
    $department_name = e($_POST['Departmentname']);
    $departmentdescription = e($_POST['Departmentdescription']);
    
    $sql_insert = "INSERT INTO department (company_id, department_name, department_description) VALUES ('$company_id', '$department_name', '$departmentdescription')";
    $sql_insert = mysqli_query($db , $sql_insert);
        if($sql_insert){
                header('location:../department.php');
        }else{
            echo 'not Inserted';
        }
}

function delete_department(){
    global $db;

    $dept_id = $_POST['dept_id'];
     
    $sql_delete = "UPDATE department SET deleted_at = NOW() WHERE id = '$dept_id'";
    $query_delete = mysqli_query($db , $sql_delete);
        if($query_delete){
            header('location:../department.php');
        }else{
            echo 'Not deleted';
        }
    
}

// Select Company
function select_company() {
    global $db;
    
     $sql_select = "SELECT * FROM company WHERE deleted_at IS NULL order by id ASC";
    $query_select = mysqli_query($db, $sql_select);

        if($query_select){
            foreach($query_select as $row){
                   echo '<option value = "'.$row['id'].'">'.$row['company_name'].' </option>'; 

            }
        }
}

// Appen Table Ajax Department
function append_table(){
    global $db;
    
    $append_id = $_POST['append'];
        $department = array();

        $sql_select = "SELECT c.company_name,
        d.department_name,
        d.company_id,
        d.department_description,
        d.deleted_at,
        d.id
        FROM company as c
        RIGHT JOIN department as d
        ON c.id = d.company_id WHERE d.company_id = '$append_id' AND d.deleted_at IS NULL";
        $query_select = mysqli_query($db,$sql_select);

            if($query_select){
                foreach($query_select as $row){
                    array_push($department, $row);
                }
                echo json_encode($department);
            }else{
                echo 'not selected';
            }
}


function update_department(){
    global $db;

    $comp_id = e($_POST['ucompany_id']);
    $update_deptname =  e($_POST['update_deptname']);
    $update_des = e($_POST['update_des']);
    $dept_id = e($_POST['udept_id']);

        $sql_update = "UPDATE department SET company_id = '$comp_id', department_name = '$update_deptname'
                                         , department_description = '$update_des' WHERE id = '$dept_id'";
           $query_update = mysqli_query($db, $sql_update);
           if($query_update){
            header("location:../department.php");
           }                              
}

function data_compselect(){
    global $db;

    $comp = array();

        $sql_select = "SELECT id,company_id,deleted_at FROM department WHERE deleted_at IS NULL";
        $query_select = mysqli_query($db, $sql_select);
            if($query_select){
                foreach($query_select as $row){
                        array_push($comp ,$row); 
                }
                echo json_encode($comp);
            }
}   

?>