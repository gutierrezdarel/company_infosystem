<?php 
  require 'connection.php';

//   FROM BTN
  if(isset($_POST['AddPosition'])){
    insert_postion();
  }
//   FORM BTN 
  if(isset($_POST['UpadatePosition'])){
    update_position();
  }
  if(isset($_POST['DeletePosition'])){
    delete_position();
  }

//   APPEND AJAX
  if(isset($_POST['display'])){
        append_position();
  }

  if(isset($_GET['dept-json'])){
        data_deptselect();
  }
    
  function e($data){
    global $db;
    return mysqli_real_escape_string($db, trim($data));
}

//   Insert Position
function insert_postion(){
    global $db;
    $department_id = $_POST['department_id'];
    $position_name = $_POST['Positionname'];
    $position_description = $_POST['Positiondescription'];

        $sql_insert = "INSERT INTO positions(department_id, position_name, position_description) VALUES('$department_id','$position_name', '$position_description')";
            $query_insert = mysqli_query($db, $sql_insert);
                if($query_insert){
                   header("location: ../position.php");
                }else{
                    echo 'Not Inserted';
                }
}

// Select Department
function select_department(){
    global $db;

    $sql_select = " SELECT c.company_name,
    d.department_name,
    d.id,
    d.deleted_at
    FROM company as c
    INNER JOIN department as d
    ON c.id = d.company_id WHERE d.deleted_at IS NULL";
    $query_select = mysqli_query($db, $sql_select);

        if($query_select){
            foreach($query_select as $row){
                   echo '<option value = "'.$row['id'].'"> '.$row['company_name'].' / '.$row['department_name'].' </option>'; 
            }
        }
}

//  DELETE POSITION

function delete_position(){
    global $db;

    $pos_id = $_POST['pos_id'];

     $sql_delete = "UPDATE positions SET deleted_at = NOW() WHERE id = '$pos_id'";
     $query_delete = mysqli_query($db, $sql_delete);
        if($query_delete){
          header("location: ../position.php");
        }else{
          echo 'hey';
        }

}
function append_position(){
    global $db;

    $append_position = $_POST['display'];

    $position = array();

    $sql_select = " SELECT d.department_name,
    p.department_id,
    p.position_name,
    p.position_description,
    p.deleted_at,
    p.id 
    FROM department as d
    RIGHT JOIN positions as p
    ON d.id = p.department_id WHERE p.department_id = '$append_position' AND p.deleted_at IS NULL";

    $query_select = mysqli_query($db,$sql_select);

        if($query_select){
            foreach($query_select as $row){
                array_push($position, $row);
            }
            echo json_encode($position);
        }else{
            echo 'not selected';
        }
}

function update_position(){
    global $db;

    $update_posname =  e($_POST['update_posname']);
    $update_posdes = e($_POST['update_posdes']);
    $upos_id = e($_POST['upos_id']);
    $dept_id = e($_POST['dept_id']);

    $sql_update = "UPDATE positions SET department_id = '$dept_id', position_name = '$update_posname' , position_description = '$update_posdes'
                            WHERE id = '$upos_id'";
        $query_update = mysqli_query($db,$sql_update);
        if($query_update){
            header("location:../position.php");
        }
}

function data_deptselect(){
  global $db;

  $dept  = array();


  $sql_select = "SELECT  id,department_id,deleted_at FROM positions WHERE deleted_at IS NULL ";
  $query_select = mysqli_query($db, $sql_select);
    if($query_select){
        foreach($query_select as $row){
          array_push($dept, $row);
        }
        echo json_encode($dept);
    }
}
 