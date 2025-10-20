<?php include('widget/header.php') ?>

<div class="container">
    <div class="row pt-4 pb-4 gt3">
        <?php
        if(isset($_SESSION['noti'])){
            echo $_SESSION['noti'];
            unset($_SESSION['noti']);
        }
        ?>
        
      
        <h2 class="mt-4 mb-3">Manage Product</h2>
        <!-- table Categoru -->
         <div class="col-12">
            <a href="addProduct.php" class="btn btn-primary w-10 mb-3">Add Product</a>

            <table class="table table-loght table-striped">
  <thead>
          <tr class="text-center">
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope='col'>Category</th>
      <th scope='col'>Featured</th>
      <th scope='col'>Active</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
 <?php
    $sql = "SELECT *  FROM products";
    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);
    if($count == 0){
        echo 'No Data';
    }else{
        $sn =1;
        while($row =mysqli_fetch_assoc($res)){
            $id= $row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $category_id=$row['category_id'];
            $feature=$row['featured'];
            $active=$row['active'];
            $image_name=$row['image'];

            $sql = "SELECT title FROM categories WHERE id=$category_id";
            $res=mysqli_query($conn,$sql);
            $category_name= mysqli_fetch_assoc($res)['title'];
            ?>
 

        <tr class="text-center">
        <th scope='row'><?= $sn ?></th>
        <th><?= $title ?></th>
        <th><?= $price ?></th>
        <th>
            <img src="../images/products/<?= $image_name ?>" style="width:100px" class="rounded" alt="">
        </th>
        <th><?= $category_name ?></th>
        <th><?= $feature ?></th>
        <th><?= $active ?></th>
        <th>
            <a href="updateProduct.php?id=<?= $id ?>" class="bg-white p-2 rounded mx-1" title="update product">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

             
            <a href="deleteProduct.php?id=<?= urlencode($id) ?> & image=<?= urlencode($image_name)?>" class="bg-white p-2 rounded mx-1" title="delete product">
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