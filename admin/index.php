<?php include('widget/header.php') ?>
    <!-- DASHBOARD SECTION -->
      
    <div class="container text-center">
           <?php
                    if(isset($_SESSION['noti'])){
                        echo $_SESSION['noti'];
                        unset($_SESSION['noti']);
                    }
                    ?>
        <h2 class="dashboard-title">Dashboard</h2>

        <div class="row justify-content-center mt-5">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card py-4">
                           <?php
                   $sql="SELECT * FROM categories ";
                   $res=mysqli_query($conn,$sql);
                   $count = mysqli_num_rows($res);
                   
                   ?>
                    <h4>
                        <?= $count ?>         
                
                    </h4>
                    <p>Categories</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card py-4">
                    <?php
                   $sql="SELECT * FROM products ";
                   $res=mysqli_query($conn,$sql);
                   $count = mysqli_num_rows($res);
                   
                   ?>
                    <h4><?= $count ?></h4>
                    <p>Products</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card py-4">
                    <h4>5</h4>
                    <p>Total Orders</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card py-4">
                    <h4>$5</h4>
                    <p>Revenue Generated</p>
                </div>
            </div>
        </div>
    </div>


<?php include('widget/footer.php') ?>