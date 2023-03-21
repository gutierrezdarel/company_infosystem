<?php

$db = new mysqli("localhost", "root", "Allen is Great 200%");
if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$db->query("CREATE DATABASE IF NOT EXISTS `employee_info`");

mysqli_select_db($db, "employee_info");

$users = "CREATE TABLE IF NOT EXISTS users(id int(3) NOT NULL auto_increment,
          Username varchar(50),
          Pass varchar(50),
          PRIMARY KEY (id))";
$db->query($users);

$company = "CREATE TABLE IF NOT EXISTS company(id int(6) NOT NULL auto_increment,
      company_name VARCHAR(50),
      company_description VARCHAR(100),
      PRIMARY KEY (id)
      )";
$db->query($company);

$department = "CREATE TABLE IF NOT EXISTS department(id int(6) NOT NULL auto_increment,
      company_id int(6),
      department_name VARCHAR(50),
      department_description VARCHAR(100),
      deleted_at timestamp NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (company_id) REFERENCES company(id)
      )";
$db->query($department);

$position = "CREATE TABLE IF NOT EXISTS positions(id int(6) NOT NULL auto_increment,
     department_id int(6),
     position_name VARCHAR(50),  
     position_description VARCHAR(100),
     deleted_at timestamp NULL,
      PRIMARY KEY (id),
      FOREIGN KEY (department_id) REFERENCES department(id)
      )";
$db->query($position);

$employee = "CREATE TABLE IF NOT EXISTS employee(id int(6) NOT NULL auto_increment,
     position_id INT(6),
     fname VARCHAR(50),
     lname VARCHAR(50),
     loc VARCHAR(50),
     gender VARCHAR(50),
     contact INT(11),
     birthday DATE,
     img VARCHAR(50),
     age INT(2),
     stats VARCHAR(50),
     deleted_at timestamp NULL,
     PRIMARY KEY (id),
     FOREIGN KEY (position_id) REFERENCES positions(id)     
    )";
$db->query($employee);



$sql = "SELECT * FROM  users";
$result = mysqli_query($db, $sql); 
$count = mysqli_num_rows($result);                
if ($count == 0) {
  $query = "INSERT INTO users(Username,Pass)
      VALUES('Admin','admin')";
      $db->query($query);

}


?>