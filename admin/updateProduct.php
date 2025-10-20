<?php include('widget/header.php') ?>
<?php 
$id=$_GET['id'];
$sql = "SELECT * FROM products WHERE id=$id";
$res = mysqli_query($conn,$sql);
if($res){
    $count = mysqli_num_rows($res);
    if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price=$row['price'];
        $category=$row['category_id'];
        $feature = $row['featured'];
        $active = $row['active'];
        $image = $row['image'];
    }else{
         $_SESSION['noti'] = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Fail to Update Product!
            </div>';
            header('location: manageProduct.php');
    }
}
?>

<div class="container">
    <div class="row pt-4 pb-4 text-color">
                        <?php
            if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']); // remove it so it only shows once
        }
        ?>
        <h2 class="mt-4 mb-3">Update Product</h2>

        <div class="col-12">
            <div class="border p-3 rounded-3">
                
<form action="" method="POST" enctype="multipart/form-data">
  <div class="row">
    <!-- Title -->
    <div class="col-6 mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" required class="form-control" id="title" name="title" value="<?= htmlspecialchars($title) ?>">
    </div>

       <div class="col-2 mb-3">
                            <label for="price" calss="form-label">Price $</label>
                            <input type="text" required class="form-control" id='price' value="<?= htmlspecialchars($price) ?>" name='price'>
                        </div>
                                <div class="col-4 mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select">
                    <?php
                    // SQL query to get active categories
                    $sql = "SELECT * FROM categories WHERE active='YES'";
                    $res = mysqli_query($conn, $sql);

                    if ($res) {
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];

                                // Check if this category is the one currently selected
                                $selected = ($id == $category) ? 'selected' : '';
                                ?>
                                <option value="<?= htmlspecialchars($id) ?>" <?= $selected ?>>
                                    <?= htmlspecialchars($title) ?>
                                </option>
                                <?php
                            }
                        } else {
                            ?>
                            <option value="0">No Category Found</option>
                            <?php
                        }
                    } else {
                        echo "<option value='0'>Database Error</option>";
                    }
                    ?>
                </select>
            </div>


    <!-- Image -->
    <div class="col-6 mb-3">
      <label for="newImage" class="form-label">Image</label>
      <input type="file" class="form-control" id="newImage" name="newImage" accept="image/*">

      <div class="col-6 mt-2 mb-3">
        <img 
          id="preview"
          src="<?= !empty($image) ? '../images/products/' . htmlspecialchars($image) : '' ?>"
          alt="Selected image preview"
          class="img-fluid rounded border"
          style="max-height: 100px; <?= empty($image) ? 'display:none;' : '' ?>"
        >
      </div>
    </div>

    <!-- Featured -->
    <div class="col-6 mb-3">
      <label class="form-label">Featured</label>
      <div class="bg-body p-1 rounded ps-3">
        <div class="form-check form-check-inline">
          <input type="radio" id="featured1" name="featured" value="Yes" class="form-check-input" <?= ($feature == 'Yes') ? 'checked' : '' ?>>
          <label for="featured1" class="form-check-label">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="featured2" name="featured" value="No" class="form-check-input" <?= ($feature == 'No') ? 'checked' : '' ?>>
          <label for="featured2" class="form-check-label">No</label>
        </div>
      </div>
    </div>

    <!-- Active -->
    <div class="col-6 mb-3">
      <label class="form-label">Active</label>
      <div class="bg-body p-1 rounded ps-3">
        <div class="form-check form-check-inline">
          <input type="radio" id="active1" name="active" value="Yes" class="form-check-input" <?= ($active == 'Yes') ? 'checked' : '' ?>>
          <label for="active1" class="form-check-label">Yes</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="active2" name="active" value="No" class="form-check-input" <?= ($active == 'No') ? 'checked' : '' ?>>
          <label for="active2" class="form-check-label">No</label>
        </div>
      </div>
    </div>

    <!-- Hidden fields -->
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="image" value="<?= htmlspecialchars($image) ?>">

    <div class="col-12">
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>

            </div>
        </div>
    </div>
</div>

<?php include('widget/footer.php') ?>

<script>
document.getElementById('newImage').addEventListener('change', function (event) {
  const preview = document.getElementById('preview');
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = e => {
      preview.src = e.target.result;
      preview.style.display = 'block';
    };
    reader.readAsDataURL(file);
  } else {
    preview.src = '';
    preview.style.display = 'none';
  }
});
</script>

<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $title = $_POST['title'] ?? '';
    $price = $_POST['price'] ?? '';
    $category = $_POST['category'] ?? '';
    $feature = $_POST['featured'] ?? ''; 
    $active = $_POST['active'] ?? '';
    $old_image = $_POST['image'] ?? '';
    $image_name = $old_image; 

  
if (!empty($_FILES['newImage']['name'])) {
    // Get original file name and extension
    $original_name = $_FILES['newImage']['name'];
    $ext = strtolower(pathinfo($original_name, PATHINFO_EXTENSION));

    // Allow only certain image types
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    if (!in_array($ext, $allowed_ext)) {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Invalid file type. Only JPG, PNG, GIF, and WEBP allowed.
        </div>';
        header('Location: manageProduct.php');
        exit();
    }

    // Rename image to avoid conflicts
    $image_name = "product_" . rand(1000, 9999) . "." . $ext;

    // Define paths
    $source_path = $_FILES['newImage']['tmp_name'];
    $destination_path = "../images/products/" . $image_name;

    // Try to upload the new file
    if (!move_uploaded_file($source_path, $destination_path)) {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Failed to upload new image.
        </div>';
        header('Location: manageProduct.php');
        exit();
    }

    // Delete old image if it exists
    if (!empty($old_image)) {
        $old_path = "../images/products/" . $old_image;
        if (file_exists($old_path)) {
            unlink($old_path);
        }
    }
}


  
  $stmt = $conn->prepare("
    UPDATE products 
    SET title=?, price=?, category_id=?, featured=?, active=?, image=? 
    WHERE id=?
");

$stmt->bind_param(
    "sdisssi",
    $title,
    $price,
    $category,
    $feature,
    $active,
    $image_name,
    $id
);


    $res = $stmt->execute();

    if ($res) {
        $_SESSION['noti'] = '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Product Updated Successfully
        </div>';
    } else {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Failed to Update Product
        </div>';
    }

    header('Location: manageProduct.php');
    exit();
}
?>