<?php 
    require 'connection.php';
    // AJAX APPEND
if(isset($_POST['comp'])){
    emp_selectdept();
}

// AJAX APEND
if(isset($_POST['dept'])){
    emp_selectpos();
}

// Append Select Department Ajax
function emp_selectdept(){
    global $db;

    $comp_id = $_POST['comp'];
    $comp= array();

    $sql_select = "SELECT * FROM department WHERE company_id = '$comp_id'";
    $query_select = mysqli_query($db ,$sql_select);

    if($query_select){
        foreach($query_select as $row){
            array_push($comp, $row);
        }
        echo json_encode($comp);
    }

}

// Append select Position Ajax
function emp_selectpos(){
    global $db ;

    $dept_id = $_POST['dept'];
    $dept = array();

    $sql_select = "SELECT * FROM positions WHERE department_id = '$dept_id'";
    $query_select = mysqli_query($db, $sql_select);

        if($query_select){
            foreach($query_select as $row){
                array_push($dept, $row);
            }
            echo json_encode($dept);
        }else{
          echo "not selected";
        }

}
?>