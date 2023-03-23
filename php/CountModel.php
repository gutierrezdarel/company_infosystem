<?php 
require 'connection.php';



function total_company(){
    global $db;
    $sql_count = "SELECT count(id) as comp FROM company WHERE deleted_at IS NULL";
    $query_count = mysqli_query($db, $sql_count);
    $values = mysqli_fetch_assoc($query_count);
        $total = $values['comp'];
        echo $total;

}

function total_department(){
    global $db;

    $sql_count = "SELECT count(id) as dept FROM department WHERE deleted_at IS NULL";
    $query_count = mysqli_query($db, $sql_count);
    $values = mysqli_fetch_assoc($query_count);
        $total = $values['dept'];
        echo $total;
}

function total_position(){
    global $db;

    $sql_count = "SELECT count(id) as pos FROM positions WHERE deleted_at IS NULL";
    $query_count = mysqli_query($db, $sql_count);
    $values = mysqli_fetch_assoc($query_count);
        $total = $values['pos'];
        echo $total;
}
function total_employee(){
    global $db;

    $sql_count = "SELECT count(id) as emp FROM employee WHERE deleted_at IS NULL";
    $query_count = mysqli_query($db, $sql_count);
    $values = mysqli_fetch_assoc($query_count);
        $total = $values['emp'];
        echo $total;
}
?>