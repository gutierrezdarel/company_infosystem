<?php
// include 'connection.php';
require 'connection.php';


// FORM TRIGGER
if (isset($_POST['AddCompany'])) {
    insert_company();
}
// FORM TRIGGER
if(isset($_POST['AddDeparment'])){
    insert_dept();  
}
// FORM TRIGGER
if(isset($_POST['AddPosition'])){
    insert_position();
}
// AJAX APPEND
if(isset($_POST['show'])){
    display_department();
}
// AJAX APPEND
if(isset($_POST['append'])){
    display_position();
}

function e($data){
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

// INSERT COMPANY NAME
function insert_company(){
    global $db;
      $Companyname= e($_POST['Companyname']);

        $sql_insert = "INSERT INTO company (company_name) VALUES('$Companyname')";
        $query_insert  = mysqli_query($db, $sql_insert);

            if($query_insert){
                header('location:../company.php');
            }else{
                echo 'Not Inserted';
            }
}

// INSERT DEPARTMENT NAME
function insert_dept(){
    global $db;
    $company_id = e($_POST['company_id']);
    $dept_name = e($_POST['Departmentname']);

    $sql_insert = "INSERT INTO department(company_id,department_name) VALUES('$company_id', '$dept_name')";
    $query_insert = mysqli_query($db , $sql_insert);
            if($query_insert){
                header('location:../company.php');
            }else{
                echo 'Not Inserted';
            }
}

// INSERT POSITION NAME
function insert_position(){
    global $db;

    $department_id = e($_POST['department_id']);
    $position_name = e($_POST['Positionname']);

        $sql_insert = "INSERT INTO positions(department_id,position_name)VALUES('$department_id' , '$position_name' )";
            $query_insert = mysqli_query($db, $sql_insert);

            if($query_insert){
                header('location:../company.php');
            }else{
                echo 'failed';
            }
}

// DISPLAY COMPANY 
function display_company(){
    global $db;
    $sql_select = "SELECT * FROM company";
        $query_select = mysqli_query($db , $sql_select);
        if($query_select){
            foreach($query_select as $comp){
                echo '<p>'.$comp['company_name'].'</p>';
            }
        }
}

// DISPLAY COMPANY SELECT OPTION
function select_company(){
    global $db;
    $sql_select = "SELECT * FROM company";
        $query_select = mysqli_query($db , $sql_select);
        if($query_select){
            foreach($query_select as $comp){
                echo '<option value="'.$comp['id'].'">'.$comp['company_name'].'</option>';
            }
        }
}
    
    // DISPLAY SELECT DEPARTMENT
function display_select_dept(){
        global $db;
        $sql_select = "SELECT * FROM department";
            $query_select = mysqli_query($db , $sql_select);
            if($query_select){
                foreach($query_select as $comp){
                    echo '<option value="'.$comp['id'].'">'.$comp['department_name'].'</option>';
                }
            }
}

// APPEDING DEPARTMENT
function select_dept(){
    global $db;
    $sql_select = "SELECT * FROM company";
        $query_select = mysqli_query($db , $sql_select);
        if($query_select){
            foreach($query_select as $comp){
                echo '<div class="department-content">';
                echo '<div class= "append-company">';
                echo '<p>'.$comp['company_name'].'</p>';
                echo '<button onclick="show('. $comp['id'].')"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M6 9l6 6 6-6"/></svg></button>';
                echo '</div>';
                echo '<div class="append-department-'. $comp['id'] . '">';
                echo '</div>';
                echo '</div>';
            }
        }
}

// PROCESS OF APPENDING DEPARTMENT
function display_department(){
    global $db;
    $company_id = $_POST['show'];
    $json = array();

    $sql_select = "SELECT * FROM department WHERE company_id = '$company_id'";
    $query_select = mysqli_query($db ,$sql_select);      
    if($query_select){
        foreach($query_select as $row){
            array_push($json, $row);
        }
        echo json_encode($json);
    }
}



// APPEDING POSITION
function select_position(){
    global $db;
    $sql_select = "SELECT * FROM department ORDER BY company_id ";
        $query_select = mysqli_query($db , $sql_select);
        if($query_select){
            foreach($query_select as $dept){

                echo '<div class="department-content">';
                echo '<div class= "append-company">';
                echo '<p>'.$dept['department_name'].'</p>';
                echo '<button onclick="append(' . $dept['id']. ')"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M6 9l6 6 6-6"/></svg></button>';
                echo '</div>';
                echo '<div class="append-position-'. $dept['id'] . '" >';
                echo '</div>';
                echo '</div>';
            }
        }

}

// PROCESS OF APPENDING POSITION
function display_position(){
    global $db;
    $department_id = $_POST['append'];
    $json = array();

    $sql_select = "SELECT * FROM positions WHERE department_id = '$department_id'";
    $query_select = mysqli_query($db ,$sql_select);      
    if($query_select){
        foreach($query_select as $row){
            array_push($json, $row);
        }
        echo json_encode($json);
    }
   
}


?>