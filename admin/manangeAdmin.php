<?php include('widget/header.php') ?>

<div class="container">
    <div class="row pt-4 pb-4 gt3">
          <?php
    if (isset($_SESSION['noti'])) {
    echo $_SESSION['noti'];
    unset($_SESSION['noti']); // remove it so it only shows once
}
         ?>
        <h2 class="mt-4 mb-3">Manage Admin</h2>
        <!-- table Admin -->
         <div class="col-12">
            <a href="addAdmin.php" class="btn btn-primary w-10 mb-3">Add Admin</a>

            <table class="table table-striped">
  <thead>
    <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Full Name</th>
      <th scope="col">User Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <!-- Retrive Data From DB  -->
    <?php
    $sql = 'SELECT *  from admins ';
    $res = mysqli_query($conn,$sql);
    if($res){
        // count the nuymber rows from table 
        $count = mysqli_num_rows($res);
        if($count == 0){
            echo 'no data';
        }else{
            $sn = 1;
            while($row= mysqli_fetch_assoc($res)){
                $id = $row['id'];
                $fullname=$row['fullname'];
                $username=$row['userName'];
                $password=$row['password'];
                $created_at=$row['created_at']

                ?> 
                   <!-- Can Now Use HTML  -->
        <tr class="text-center">
        <th scope='row'><?= $sn ?></th>
        <th><?= $fullname ?></th>
        <th><?= $username ?></th>
        <th>
            <a href="updatePassword.php?id=<?= $id?>" class="bg-white p-2 rounded mx-1" title="update password">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

              <a href="updateAdmin.php?id=<?= $id ?>" class="bg-white p-2 rounded mx-1" title="update admin">
                <i class="fa-solid text-warning fa-user-pen"></i>
            </a>

            <a href="deleteAdmin.php?id=<?= $id ?>" class="bg-white p-2 rounded mx-1" title="delete admin">
                <i class="fa-solid text-danger fa-trash"></i>
            </a>
        </th>
    </tr>
                <?php
                $sn++;
            }
        }
    }
    ?>
      
   
  </tbody>
</table>
         </div>
    </div>
</div>

<?php include('widget/footer.php') ?>