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
// Fetch all products with their category names in one query (avoids N+1 problem)
$sql = "SELECT p.*, c.title AS category_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.id";

$res = mysqli_query($conn, $sql);

// Check if query ran successfully
if (!$res) {
    die("Query Failed: " . mysqli_error($conn));
}

$count = mysqli_num_rows($res);

if ($count == 0) {
    echo '<tr><td colspan="8" class="text-center">No Data</td></tr>';
} else {
    $sn = 1;
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $price = $row['price'];
        $category_name = $row['category_name'] ?? 'Uncategorized';
        $feature = $row['featured'];
        $active = $row['active'];
        $image_name = $row['image'];
        ?>

        <tr class="text-center">
            <th scope="row"><?= $sn ?></th>
            <td><?= htmlspecialchars($title) ?></td>
            <td><?= htmlspecialchars($price) ?></td>
            <td>
                <?php if (!empty($image_name)) : ?>
                    <img src="../images/products/<?= htmlspecialchars($image_name) ?>" 
                         style="width:100px" class="rounded" alt="">
                <?php else : ?>
                    <span>No Image</span>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($category_name) ?></td>
            <td><?= htmlspecialchars($feature) ?></td>
            <td><?= htmlspecialchars($active) ?></td>
            <td>
                <a href="updateProduct.php?id=<?= urlencode($id) ?>" 
                   class="bg-white p-2 rounded mx-1" title="Update Product">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>

                <a href="deleteProduct.php?id=<?= urlencode($id) ?>&image=<?= urlencode($image_name) ?>" 
                   class="bg-white p-2 rounded mx-1" title="Delete Product">
                    <i class="fa-solid fa-trash text-danger"></i>
                </a>
            </td>
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