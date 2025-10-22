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
         <diiv class="col-md-6">
            <div class="border p-3 rounded-3">
                  <form action="" method="POST">
                    <div class="col-6 mb-3 form-check">
                        <label for="s1" class="form-check-label">Ordered</label>
                        <input type="radio" class="form-check-input" id="s1" value="Ordered"
                          <?php
                        if($status=="Ordered") echo "checked"                     
                        ?>
                        name="status">
                      
                    </div>

                      <div class="col-6 mb-3 form-check">
                        <label for="s1" class="form-check-label">Ordered</label>
                        <input type="radio" class="form-check-input" id="" value="Ordered" name="status">
                    </div>

                      <div class="col-6 mb-3 form-check">
                        <label for="s1" class="form-check-label">Ordered</label>
                        <input type="radio" class="form-check-input" id="s1" value="Ordered" name="status">
                    </div>
               
                <input type="hidden" value="<?= $id ?>" name="id">
                <input type="submit" class="btn btn-primary text-white" value="Update">
            </form>
            </div>
          
         </diiv>
    </div>
</div>


<?php include('widget/footer.php') ?>