<?php 
  require 'connection.php';

//   FROM BTN
  if(isset($_POST['AddPosition'])){
    insert_postion();
  }
//   APPEND AJAX
  if(isset($_POST['display'])){
        append_position();
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

    $sql_select = "SELECT * FROM department";
    $query_select = mysqli_query($db, $sql_select);

        if($query_select){
            foreach($query_select as $row){
                   echo '<option value = "'.$row['id'].'">'.$row['department_name'].' </option>'; 
            }
        }
}

// Append 
// function table_position(){
//     global $db;

//     $sql_select = "SELECT p.position_name,
//                    p.position_description,
//                    p.id,
//                    p.department_id,
//                    d.id
//                    FROM positions as p
//                    LEFT JOIN department as d
//                    ON p.department_id = d.id WHERE p.department_id = d.id ";
//     $query_select = mysqli_query($db , $sql_select);

//         if($query_select){
//             foreach($query_select as $row){
//                 echo '<tr>';
//                 echo '<td>'.$row['position_name'].'</td>';
//                 echo '<td>'.$row['position_description'].'</td>';
//                 echo '<td><button class="btn_table"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"></path><polygon points="18 2 22 6 12 16 8 16 8 12 18 2"></polygon></svg></button>
//                 <button class="btn_table"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#d0021b" stroke-width="2" stroke-linecap="butt" stroke-linejoin="arcs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></button></td>';
//                 echo '</tr>';
//             }
//         }
// }
function append_position(){
    global $db;

    $append_position = $_POST['display'];

    $position = array();

    $sql_select = "SELECT * FROM positions WHERE department_id = '$append_position'";
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