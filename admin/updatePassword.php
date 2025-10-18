
<?php
session_start();
include('widget/header.php');
include('../config.php'); // if not already included in header
?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input
    $sql = "SELECT * FROM admins WHERE id = ?";
    
   $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($res && mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);
        $retrived_password = $row['password'];
       
    } else {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Failed to find Admin for update.
        </div>';
   }

      
    }
?>


<div class="container">
    <div class="row pt-4 pb-4 text-color gt-3">
        <?php
    if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']); // remove it so it only shows once
}
         ?>
        <h2 class="mt-4 mb-3 ">Update Password</h2>

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

              
                <input type="hidden" value="<?= $retrived_password ?>" name="retrived_password">
                <input type="hidden" value="<?=  $id?>" name="id">
                <input type="submit" class="btn btn-primary text-white" value="Update Password">
            </form>
            </div>
          
         </diiv>
    </div>
</div>

<?php include('widget/footer.php') ?>

<?php
session_start();
require_once 'config.php'; // make sure $conn is defined here (your DB connection)

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Fetch existing password hash from DB
    $sql = "SELECT password FROM admins WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($stored_hash);
        $stmt->fetch();

        // Verify current password
        if (!password_verify($currentPassword, $stored_hash)) {
            $_SESSION['noti'] = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Current Password Incorrect
            </div>';
        } elseif ($newPassword !== $confirmPassword) {
            $_SESSION['noti'] = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                New password must match Confirm Password
            </div>';
        } else {
            // Hash new password securely
            $new_hash = password_hash($newPassword, PASSWORD_DEFAULT);

            $update_sql = "UPDATE admins SET password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $new_hash, $id);
            $res = $update_stmt->execute();

            if ($res) {
                $_SESSION['noti'] = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Password Updated Successfully
                </div>';
                header("Refresh:3"); // reload after 3 seconds
                exit;
            } else {
                $_SESSION['noti'] = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to Update Password
                </div>';
            }
        }
    } else {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            User not found
        </div>';
    }
}
?>

