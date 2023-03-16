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

// ADD EMPLOYEE
if(isset($_POST['AddEmployee'])){
    insert_employee();
}

function e($data){
    global $db;
    return mysqli_real_escape_string($db, trim($data));
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

function insert_employee(){
    global $db;

    $fname = e($_POST['fname']);
    $lname = e($_POST['lname']);
    $gender = e($_POST['gender']);
    $address = e($_POST['address']);
    $contact = e($_POST['contact']);
    $birthday = e($_POST['birthday']);
    $age = e($_POST['age']);
    // $display_comp = e($_POST['display_comp']);
    // $display_dept = e($_POST['display_dept']);
    $display_position = e($_POST['display_position']);
    $status = e($_POST['status']);

        $sql_insert = "INSERT INTO employee (fname, lname, loc, contact, gender, birthday, age, stats, position_id) VALUES 
        ('$fname', '$lname', '$address', '$contact','$gender', '$birthday', '$age', '$status', '$display_position')";
            $query_insert = mysqli_query($db, $sql_insert);
            if($query_insert){
                header('location:../employee.php');
            }else{
                echo 'not inserted';
            }
}


function  table_employee(){
    global $db;


            $sql_select = "SELECT c.company_name,
                                d.department_name,
                                p.position_name,
                                e.fname,
                                e.lname,
                                e.loc,
                                e.contact,
                                e.gender,
                                e.birthday,
                                e.age,
                                e.stats
                                FROM company as c
                                RIGHT JOIN department  as d
                                ON c.id  = company_id
                                RIGHT JOIN positions as p
                                ON d.id = department_id 
                                RIGHT JOIN employee as e
                                ON p.id = position_id";
            $query_select = mysqli_query($db,$sql_select);
            
            if($query_select){
                foreach ($query_select as $row){
                    echo '<tr>';
                    echo '<td>'.$row['fname'].'</td>';
                    echo '<td>'.$row['lname'].'</td>';
                    echo '<td>'.$row['gender'].'</td>';
                    echo '<td>'.$row['loc'].'</td>';
                    echo '<td>'.$row['contact'].'</td>';
                    echo '<td>'.$row['birthday'].'</td>';
                    echo '<td>'.$row['age'].'</td>';
                    echo '<td>'.$row['company_name'].'</td>';
                    echo '<td>'.$row['department_name'].'</td>';
                    echo '<td>'.$row['position_name'].'</td>';
                    echo '<td>'.$row['stats'].'</td>';
                    echo '<td><button class="btn_table"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>
                    <button class="btn_table"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button></td>';
                    echo '</tr>';
                }
            }else{
                echo 'hello';
            }
}
