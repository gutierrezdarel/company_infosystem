<?php
// include 'connection.php';
require 'connection.php';

// FORM TRIGGER
if (isset($_POST['AddCompany'])) {
    insert_company();
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
        $sql_select = "SELECT * FROM company";
        $query_select = mysqli_query($db,$sql_select);
            if($query_select){
                foreach($query_select as $row){
                    echo '<tr>';
                    echo '<td>'.$row['company_name'].'</td>';
                    echo '<td>'.$row['company_description'].'</td>';
                    echo '<td><button class="btn_table"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>
                    <button class="btn_table"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button></td>';
                    echo '</tr>';
                }
             }
}
