<?php include('widget/header.php') ?>
<?php 
$id=$_GET['id'];
$status=$_GET['status'];

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
        <div class="col-md-6">
  <div class="border p-3 rounded-3">
    <form action="" method="POST">
      
      <div class="col-6 mb-3 form-check">
        <label for="s1" class="form-check-label">Ordered</label>
        <input type="radio" class="form-check-input" id="s1" value="Ordered"
          <?php if ($status == "Ordered") echo "checked"; ?>
          name="status">
      </div>

      <div class="col-6 mb-3 form-check">
        <label for="s2" class="form-check-label">On Delivery</label>
        <input type="radio" class="form-check-input" id="s2" value="On Delivery"
          <?php if ($status == "On Delivery") echo "checked"; ?>
          name="status">
      </div>

      <div class="col-6 mb-3 form-check">
        <label for="s3" class="form-check-label">Canceled</label>
        <input type="radio" class="form-check-input" id="s3" value="Canceled"
          <?php if ($status == "Canceled") echo "checked"; ?>
          name="status">
      </div>

      <div class="col-6 mb-3 form-check">
        <label for="s4" class="form-check-label">Delivered</label>
        <input type="radio" class="form-check-input" id="s4" value="Delivered"
          <?php if ($status == "Delivered") echo "checked"; ?>
          name="status">
      </div>

      <input type="hidden" value="<?= $id ?>" name="id">
      <input type="submit" class="btn btn-primary text-white" value="Update">
    </form>
  </div>
</div>

</div>


<?php include('widget/footer.php') ?>
<?php
if($_SERVER['REQUEST_METHOD']== 'POST'){
    $id=$_POST['id'];
    $new_status=$_POST['status'];

    $sql="UPDATE orders SET 
    status='$new_status'
    WHERE
    id=$id
    ";

    $res=mysqli_query($conn,$sql);
     if ($res) {
                $_SESSION['noti'] = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Status Updated Successfully
                </div>';
                header("location:manageOrder.php"); // reload after 3 seconds
                exit;
            } else {
                $_SESSION['noti'] = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Failed to Update Status
                     
                </div>';
                 header("location:manageOrder.php");
                 exit;
            }
} 
?>