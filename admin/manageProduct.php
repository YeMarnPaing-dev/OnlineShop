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
   
 

        <tr class="text-center">
        <th scope='row'></th>
        <th></th>        
        <th>
            <img src="" style="width:100px" class="rounded" alt="">
        </th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>
            <a href="updateProduct.php?id=<?= $id ?>" class="bg-white p-2 rounded mx-1" title="update category">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>

             
            <a href="deleteProduct.php?id=<?= urlencode($id) ?>" class="bg-white p-2 rounded mx-1" title="delete category">
                <i class="fa-solid text-danger fa-trash"></i>
            </a>
        </th>
    </tr>
            

  
      
   
  </tbody>
</table>
         </div>
    </div>
</div>

<?php include('widget/footer.php') ?>