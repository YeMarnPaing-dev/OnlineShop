<?php
include('../config.php');

$id = $_GET['id'];

$sql = "DELETE From admins WHERE id = $id";
$res = mysqli_query($conn,$sql);

if ($res) {
    $_SESSION['noti'] = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Admin Deleted Successfully
    </div>';
    // header('location: manageAdmin.php');
 
exit;


} else {
    $_SESSION['noti'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Delete Admin
    </div>';

}


?>