<?php 
require 'connection.php';
    // FORM BTN
    if(isset($_POST['AddDepartment'])){
        insert_department();
    }
    // AJAX APPEND
    if(isset($_POST['append'])){
        append_table();
    }

// Insert  Department 
function insert_department(){
    global $db;

    $company_id = $_POST['company_id']  ;
    $department_name = $_POST['Departmentname'];
    $departmentdescription = $_POST['Departmentdescription'];
    
    $sql_insert = "INSERT INTO department (company_id, department_name, department_description) VALUES ('$company_id', '$department_name', '$departmentdescription')";
    $sql_insert = mysqli_query($db , $sql_insert);
        if($sql_insert){
                header('location:../department.php');
        }else{
            echo 'not Inserted';
        }
}

// Select Company
function select_company() {
    global $db;

    $sql_select = "SELECT * FROM company order by id ASC";
    $query_select = mysqli_query($db, $sql_select);

        if($query_select){
            foreach($query_select as $row){
                   echo '<option value = "'.$row['id'].'">'.$row['company_name'].' </option>'; 

            }
        }
}

// Appen Table Ajax 
function append_table(){
    global $db;
    
    $append_id = $_POST['append'];
        $department = array();

        $sql_select = "SELECT * FROM department WHERE company_id = '$append_id'";
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
?>