<?php
// include 'connection.php';
require 'connection.php';

if (isset($_POST['Addcompany'])) {
    insert_company();
}
if(isset($_POST['Add_dept'])){
    insert_dept();

}


function e($data)
{
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

function insert_company()
{
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

function select_company(){
    global $db;
    $sql_select = "SELECT * FROM company";
        $query_select = mysqli_query($db , $sql_select);
        if($query_select){
            foreach($query_select as $comp){
                echo '<input type="hidden" value="'.$comp['id'].'" readonly>'.$comp['company_name'].'';
                echo '<button onclick = "AddDept(' . $comp['id'] . ')">add </button>'; 
            }
        }

}
function insert_dept(){
    global $db;
    $company_id = e($_POST['company_id']);
    $dept_name = e($_POST['dept_name']);

    $sql_insert = "INSERT INTO department(company_id,department_name) VALUES('$company_id', '$dept_name')";
    $query_insert = mysqli_query($db , $sql_insert);
            if($query_insert){
                header('location:../company.php');
            }else{
                echo 'Not Inserted';
            }
}


function select_dept(){
    global $db;

    $sql_select = "SELECT c.company_name,
        d.department_name,
        d.id
        FROM company as c
        RIGHT JOIN department as d
        ON c.id = d.company_id";
    $query_select = mysqli_query($db ,$sql_select);
        if($query_select){
            foreach($query_select as $dept){ 
               echo '<option value="'.$dept['id'].'" >' . $dept['department_name']. '</option>'; 
            }
        }
}

?>