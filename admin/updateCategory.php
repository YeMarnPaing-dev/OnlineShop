<?php include('widget/header.php') ?>

<?php 
$id=$_GET['id'];
$sql = "SELECT * FROM categories WHERE id=$id";
$res = mysqli_query($conn,$sql);
if($res){
    $count = mysqli_num_rows($res);
    if($count == 1){
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $feature = $row['feature'];
        $active = $row['active'];
        $image = $row['image'];
    }else{
         $_SESSION['noti'] = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Fail to Update Category!
            </div>';
            header('location: manageCategory.php');
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
        <h2 class="mt-4 mb-3">Update New Category</h2>

        <div class="col-12">
            <div class="border p-3 rounded-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" required class="form-control" id='title' value="<?= $title ?>" name='title'>
                        </div>
                          <div class="col-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file"  class="form-control" id='newImage' name='newImage'>

                            <div class="col-6 mt-2 mb-3">
                            <img 
                                id="preview"
                                src="<?php echo !empty($image) ? '../images/categories/' . htmlspecialchars($image) : ''; ?>"
                                alt="Selected image preview"
                                class="img-fluid rounded border"
                                style="max-height: 100px; <?php echo empty($image) ? 'display:none;' : ''; ?>"
                            >
                        </div>
                    </div>
                                            </div>
                        <div class="col-6 mb-3">
                            <label for="featured" class="form-label">Featured</label>
                          <div class="bg-body p-1 rounded ps-3">
                              <div class="form-check form-check-inline">
                                <input type="radio"
                                <?php
                                if($feature == 'Yes')
                                    echo "checked"                                
                                ?>
                                id='radio' id="featured1" value="Yes" name="featured" class="form-check-input">
                                <label for="featured1" class="form-check-label">Yes</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="featured2" value="No" name="featured"
                                  <?php
                                if($feature == 'No')
                                    echo "checked"                                
                                ?>
                                class="form-check-input">
                                <label for="featured2" class="form-check-label">No</label>
                            </div>
                          </div>                             
                        </div>

                          <div class="col-6 mb-3">
                            <label for="active" class="form-label">Active</label>
                          <div class="bg-body p-1 rounded ps-3">
                              <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="active1"
                                <?php
                                if($active == 'Yes')
                                    echo "checked"                                
                                ?>
                                value="Yes" name="active" class="form-check-input">
                                <label for="active1" class="form-check-label">Yes</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="active2"
                                 <?php
                                if($active == 'No')
                                    echo "checked"                                
                                ?>
                                value="No" name="active" class="form-check-input">
                                <label for="active2" class="form-check-label">No</label>
                            </div>
                          </div>
                    </div>
                    <input type="hidden" name='id' value="<?php $id ?>">
                    <input type="hidden" name='image' value="<?php $image ?>">
                    <div class="col-12">
                        <button id='click' type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('widget/footer.php') ?>

<script>
// --- Image preview handler ---
document.getElementById('image').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
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
if($_SERVER['REQUEST_METHOD']=='POST'){
   $id = $_POST['id'];
   $image = $_POST['image'];
   $feature = $_POST['feature'];
   $title = $_POST['title'];
   $active = $_POST['active'];

   if($_FILES['newImage']['name'] != null){
    $image_name = $_FILES['newImage']['name'];
    $ext = end(explode('.',$image_name));
    $image_name = "category_" . rand(000,999) . '.' . $ext;

    $source_path=$_FILES['new_image']['tmp_name'];
    $destination_path="../images/categories/".$image_name;
    $upload - move_uploaded_file($source_path,$destination_path);

     if (!$upload) {
            $_SESSION['noti'] = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Fail to Upload New Image
                </div>';
            header('Location: manageCategory.php');
            exit();
        }else{
            if($image != null){
                $path = "../images/categories/".$image;
                $remove = unlink($path);
                 if (!$remove) {
            $_SESSION['noti'] = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Fail to Remove Current Image
                </div>';
            header('Location: manageCategory.php');
            exit();
        }else{
            $image_name = $image;
        }
            }
        }
   }
   $sql="UPDATE categories SET 
   title = '$title',
   feature = '$feature',
   active = '$active',
   image = '$image_name'
   WHERE id = $id
   ";
   $res = mysqli_query($conn,$sql);
    if ($res) {
        $_SESSION['noti'] = '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Category Updated Successfully
            </div>';
        header('Location: manageCategory.php');
        exit();
    } else {
        $_SESSION['noti'] = '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Fail to Updated Category
            </div>';
        header('Location: addCategory.php');
        exit();
    }




}

?>