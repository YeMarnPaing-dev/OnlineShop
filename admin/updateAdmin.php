
<?php
session_start();
include('widget/header.php');
include('../config.php'); // if not already included in header
?>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // sanitize input

    // Use a prepared statement for safety
    $sql = "SELECT * FROM admins WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($res && mysqli_num_rows($res) === 1) {
        $row = mysqli_fetch_assoc($res);
        $fullname = $row['fullname'];
        $username = $row['userName']; // adjust field name if needed
    } else {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Failed to find Admin for update.
        </div>';
      
    }}

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
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" value="<?= $fullname ?>" required name="fullname">
                </div>

                <div class="mb-3">
                    <label for="Username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="Username" value="<?= $username ?>" required name="Username">
                </div>

                            <input type="submit" class="btn btn-primary text-white" value="Update">
            </form>
            </div>
          
         </diiv>
    </div>
</div>

<?php include('widget/footer.php') ?>