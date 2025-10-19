<?php include('widget/header.php') ?>

<div class="container">
    <div class="row pt-4 pb-4 gt3">
        <?php
        if(isset($_SESSION['noti'])){
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>
        
      
        <h2 class="mt-4 mb-3">Manage Category</h2>
        <!-- table Categoru -->
         <div class="col-12">
            <a href="addCategory.php" class="btn btn-primary w-10 mb-3">Add Category</a>

            <table class="table table-loght table-striped">
  <thead>
          <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Image</th>
      <th scope='col'>Feature</th>
      <th scope='col'>Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT *  FROM categories";
    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);
    if($count == 0){
        echo 'No Data';
    }else{
        $sn =1;
        while($row =mysqli_fetch_assoc($res)){
            $id= $row['id'];
            $title=$row['title'];
            $feature=$row['feature'];
            $active=$row['active'];
            $image_name=$row['image'];
            ?>
 

        <tr class="text-center">
        <th scope='row'><?= $sn ?></th>
        <th><?= $title ?></th>
        <th>
            <img src="../images/categories/<?= $image_name ?>" style="width:100px" class="rounded" alt="">
        </th>
        <th><?= $feature ?></th>
        <th><?= $active ?></th>
        <th>
            <a href="updateCategory.php?id=<?= $id ?>" class="bg-white p-2 rounded mx-1" title="update category">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

             
            <a href="deleteCategory.php?id=<?= $id ?>" class="bg-white p-2 rounded mx-1" title="delete category">
                <i class="fa-solid text-danger fa-trash"></i>
            </a>
        </th>
    </tr>
            <?php
            
            

            $sn++;
        }
    }
    ?>

  
      
   
  </tbody>
</table>
         </div>
    </div>
</div>

<?php include('widget/footer.php') ?>