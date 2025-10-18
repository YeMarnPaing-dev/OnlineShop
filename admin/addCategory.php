<?php include('widget/header.php') ?>

<div class="container">
    <div class="row pt-4 pb-4 text-color">
                        <?php
            if (isset($_SESSION['noti'])) {
            echo $_SESSION['noti'];
            unset($_SESSION['noti']); // remove it so it only shows once
        }
        ?>
        <h2 class="mt-4 mb-3">Add New Category</h2>

        <div class="col-12">
            <div class="border p-3 rounded-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id='title' name='title'>
                        </div>
                          <div class="col-6 mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id='image' name='image'>

                            <div class="col-6 mt-2 mb-3">
                                <img id="preview" src="#" alt="Selected image preview" class="img-fluid rounded border" style="display:none; max-height: 250px;">
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="featured" class="form-label">Featured</label>
                          <div class="bg-body p-1 rounded ps-3">
                              <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="featured1" value="Yes" name="featured" class="form-check-input">
                                <label for="featured1" class="form-check-label">Yes</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="featured2" value="No" name="featured" class="form-check-input">
                                <label for="featured2" class="form-check-label">No</label>
                            </div>
                          </div>                             
                        </div>

                          <div class="col-6 mb-3">
                            <label for="active" class="form-label">Active</label>
                          <div class="bg-body p-1 rounded ps-3">
                              <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="active1" value="Yes" name="active" class="form-check-input">
                                <label for="active1" class="form-check-label">Yes</label>
                            </div>
                             <div class="form-check form-check-inline">
                                <input type="radio" id='radio' id="active2" value="No" name="active" class="form-check-input">
                                <label for="active2" class="form-check-label">No</label>
                            </div>
                          </div>
                    </div>
                    <div class="col-12">
                        <button id='click' type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('widget/footer.php') ?>

<script>
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('preview');

    // Add change event listener
    imageInput.addEventListener('change', function() {
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();

        reader.addEventListener('load', function() {
          preview.setAttribute('src', this.result);
          preview.style.display = 'block'; // Show image
        });

        reader.readAsDataURL(file); // Convert image file to base64
      } else {
        preview.style.display = 'none';
      }
    });
</script>