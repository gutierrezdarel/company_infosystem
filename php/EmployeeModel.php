<?php
require 'connection.php';
// AJAX APPEND
if (isset($_POST['action'])) {
    if ($_POST['action'] == 'add_action') {
        emp_selectdept();
        // echo'hey';
    } else if ($_POST['action'] == 'update_action') {
        emp_selectdept();
    }
}

// AJAX APEND
if (isset($_POST['act'])) {
    // emp_selectpos();
    if ($_POST['act'] == 'add_dept') {
        emp_selectpos();
    } else if ($_POST['act'] == 'update_dept') {
        emp_selectpos();
    }
}
if (isset($_GET['json'])) {
    data_select();
}
if (isset($_GET['filter_name'])) {
    filter_name();
}

// ADD EMPLOYEE
if (isset($_POST['AddEmployee'])) {
    insert_employee();
}

// UPDATE EMPLOYEE
if (isset($_POST['UpdateEmployee'])) {
    Update_employee();
}

// DELETE EMPLOYEE 
if (isset($_POST['DeleteEmployee'])) {
    delete_employee();
}

function e($data)
{
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}


// Append Select Department Ajax
function emp_selectdept()
{
    global $db;

    $comp_id = $_POST['comp'];
    $ucomp_id = $_POST['ucomp'];
    $comp = array();

    $sql_select = "SELECT * FROM department WHERE deleted_at IS NULL AND (company_id = '$comp_id' || company_id = '$ucomp_id') ";
    $query_select = mysqli_query($db, $sql_select);

    if ($query_select) {
        foreach ($query_select as $row) {
            array_push($comp, $row);
        }
        echo json_encode($comp);
    }
}

// Append select Position Ajax
function emp_selectpos()
{
    global $db;

    $dept_id = $_POST['dept'];
    $udept_id = $_POST['udept'];
    $dept = array();

    $sql_select = "SELECT * FROM positions WHERE deleted_at IS NULL  AND (department_id = '$dept_id' || department_id = '$udept_id')";
    $query_select = mysqli_query($db, $sql_select);
    if ($query_select) {

        foreach ($query_select as $row) {
            array_push($dept, $row);
        }
        echo json_encode($dept);
    } else {
        echo "not selected";
    }
}

function insert_employee()
{
    global $db;

    $fname = e($_POST['fname']);
    $lname = e($_POST['lname']);
    $gender = e($_POST['gender']);
    $address = e($_POST['address']);
    $contact = e($_POST['contact']);
    $birthday = e($_POST['birthday']);
    $age = e($_POST['age']);
    $display_position = e($_POST['display_position']);
    $status = e($_POST['status']);

    $sql_insert = "INSERT INTO employee (fname, lname, loc, contact, gender, birthday, age, stats, position_id) VALUES 
        ('$fname', '$lname', '$address', '$contact','$gender', '$birthday', '$age', '$status', '$display_position')";
    $query_insert = mysqli_query($db, $sql_insert);
    if ($query_insert) {
        header('location:../employee.php');
    } else {
        echo 'not inserted';
    }
}

function Update_employee()
{
    global $db;

    $update_id = e($_POST['update_id']);
    $update_fname  = e($_POST['update_fname']);
    $update_lname  = e($_POST['update_lname']);
    $update_gender  = e($_POST['update_gender']);
    $update_address  = e($_POST['update_address']);
    $update_contact  = e($_POST['update_contact']);
    $update_birthday  = e($_POST['update_birthday']);
    $update_age  = e($_POST['update_age']);
    $update_position  = e($_POST['update_position']);
    $update_status  = e($_POST['update_status']);


    $sql_update = "UPDATE employee SET fname = '$update_fname', lname = '$update_lname', loc = '$update_address', gender = '$update_gender',
                  contact = '$update_contact', birthday = '$update_birthday', age = '$update_age', position_id = '$update_position', stats = '$update_status'
                  WHERE id = '$update_id'";
    $query_update = mysqli_query($db, $sql_update);
    if ($query_update) {
        // echo 'updated';
        header("location:../employee.php");
    } else {
        echo 'not updated';
    }
}

function select_company()
{
    global $db;

    $sql_select = "SELECT * FROM company WHERE deleted_at IS NULL  order by id ASC";
    $query_select = mysqli_query($db, $sql_select);

    if ($query_select) {
        foreach ($query_select as $row) {
            echo '<option value = "' . $row['id'] . '">' . $row['company_name'] . ' </option>';
        }
    }
}

function delete_employee()
{
    global $db;

    $emp_id = e($_POST['emp_id']);

    $sql_delete = "UPDATE employee SET deleted_at = now() WHERE id = '$emp_id'";
    $query_delete = mysqli_query($db, $sql_delete);

    if ($query_delete) {
        header("location:../employee.php");
    } else {
        echo 'Not Deleted';
    }
}

function data_select()
{
    global $db;

    $data = array();

    $sql_selectdata = "SELECT id,position_id, deleted_at FROM employee WHERE deleted_at IS NULL";
    $query_selectdata = mysqli_query($db, $sql_selectdata);
    if ($query_selectdata) {
        foreach ($query_selectdata as $row2) {
            array_push($data, $row2);
        }
        echo json_encode($data);
    }
}


function filter_name()
{
    global $db;

    $filter_name = $_GET['filter_name'];
    
    $empty_input = array();
    $filtered = array();
    // $response = array('empty'=> $empty_input, 'filtered' => $filtered );
    

    if (empty($filter_name)) {
        $sql_select = "SELECT c.company_name,
        d.department_name,
        d.company_id,
        p.position_name,
        p.department_id,
        e.id,
        e.fname,
        e.lname,
        e.loc,
        e.contact,
        e.gender,
        e.birthday,
        e.age,
        e.stats,
        e.deleted_at
        FROM company as c
        RIGHT JOIN department  as d
        ON c.id  = company_id
        RIGHT JOIN positions as p
        ON d.id = department_id 
        RIGHT JOIN employee as e
        ON p.id = position_id
        WHERE e.deleted_at IS NULL";
        $query_select = mysqli_query($db, $sql_select);

        if ($query_select) {
            foreach ($query_select as $row) {
                array_push($empty_input, $row);
            }
            echo json_encode($empty_input);
        } else {
            echo 'Failed';
        }
    } else {
        $sql_select = "SELECT c.company_name,
        d.department_name,
        d.company_id,
        p.position_name,
        p.department_id,
        e.id,
        e.fname,
        e.lname,
        e.loc,
        e.contact,
        e.gender,
        e.birthday,
        e.age,
        e.stats,
        e.deleted_at
        FROM company as c
        RIGHT JOIN department  as d
        ON c.id  = company_id
        RIGHT JOIN positions as p
        ON d.id = department_id 
        RIGHT JOIN employee as e
        ON p.id = position_id
        WHERE e.deleted_at IS NULL AND e.fname LIKE '{$filter_name}%'";
        $query_select = mysqli_query($db, $sql_select);

        if ($query_select) {
            foreach ($query_select as $row1) {
                array_push($filtered, $row1);
            }
            echo json_encode($filtered);
        } else {
            echo 'Failed';
        }
    }

}
