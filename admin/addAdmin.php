<?php include('widget/header.php') ?>

<div class="container">
    <div class="row pt-4 pb-4 text-color gt-3">
        <?php
      if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']); // remove it so it only shows once
}
         ?>
        <h2 class="mt-4 mb-3 ">Add New Admin</h2>

        <!-- Add Admin Form  -->
         <diiv class="col-md-6">
            <div class="border p-3 rounded-3">
                  <form action="" method="POST">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullname" required name="fullname">
                </div>

                <div class="mb-3">
                    <label for="Username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="Username" required name="Username">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" required name="password">
                </div>

                <input type="submit" class="btn btn-primary text-white" value="Register">
            </form>
            </div>
          
         </diiv>
    </div>
</div>

<?php include('widget/footer.php') ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data safely
    $fullname = $_POST['fullname'];
    $username = $_POST['Username'];
   $password =md5($_POST['password']);


   
    // include('../config.php');

    // Prepare SQL query
$sql = "INSERT INTO admins (fullname, userName, password, created_at, updated_at)
        VALUES ('$fullname', '$username', '$password', NOW(), NOW())";


    // Run the query
    $res = mysqli_query($conn, $sql);

    // Check the result
if ($res) {
    $_SESSION['noti'] = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Admin Added Successfully
    </div>';
   header("Refresh:3"); // reloads after 3 seconds
exit;


} else {
    $_SESSION['noti'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Add Admin
    </div>';

}

}

?>