
<?php
$id= $_GET['id'];
 include('widget/header.php')
 
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
                    <input type="text" class="form-control" id="fullname" required name="fullname">
                </div>

                <div class="mb-3">
                    <label for="Username" class="form-label">User Name</label>
                    <input type="text" class="form-control" id="Username" required name="Username">
                </div>

                            <input type="submit" class="btn btn-primary text-white" value="Update">
            </form>
            </div>
          
         </diiv>
    </div>
</div>

<?php include('widget/footer.php') ?>