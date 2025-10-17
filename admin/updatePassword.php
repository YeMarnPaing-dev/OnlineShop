
<?php
session_start();
include('widget/header.php');
include('../config.php'); // if not already included in header
?>

<?php


?>


<div class="container">
    <div class="row pt-4 pb-4 text-color gt-3">
        <?php
    if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']); // remove it so it only shows once
}
         ?>
        <h2 class="mt-4 mb-3 ">Update Admin</h2>

        <!-- Add Admin Form  -->
         <diiv class="col-md-6">
            <div class="border p-3 rounded-3">
                  <form action="" method="POST">

                <div class="mb-3">
                    <label for="currentPassword" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="currentPassword" value="" required name="currentPassword">
                </div>

                  <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" value="" required name="newPassword">
                </div>

                  <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" value="" required name="confirmPassword">
                </div>

              
                <input type="hidden" value="<?= $id ?>" name="id">
                <input type="submit" class="btn btn-primary text-white" value="Update">
            </form>
            </div>
          
         </diiv>
    </div>
</div>

<?php include('widget/footer.php') ?>
