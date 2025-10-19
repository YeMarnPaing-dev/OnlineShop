<?php
include('../config.php');

$id = $_GET['id'];

$sql = "DELETE From categories WHERE id = $id";
$res = mysqli_query($conn,$sql);

if ($res) {
    $_SESSION['noti'] = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Category Deleted Successfully
    </div>';
    header('location: manageCategory.php');
 
exit;


} else {
    $_SESSION['noti'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Category Deleted Successfully
 to Delete Admin
    </div>';
    header('location: manageCategory.php');
}


?>