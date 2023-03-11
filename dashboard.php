
<?php 
    include 'includes/header.php';

    session_start();
if (!isset($_SESSION['ID'])) {
    header("location: index.php");
}
?>

<div class="content_wrapper">
    <div class="header">
        <h1>Dashboard</h1>
    </div>
    <div class="dashboard_content">
        
    </div>
</div>

