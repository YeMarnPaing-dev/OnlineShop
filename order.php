<?php
include('./widget/header.php');
?>
<?php 
$id=$_GET['id'];

$sql="SELECT * FROM products WHERE id=$id";
$res=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($res);
$image=$row['image'];
$title=$row['title'];
$price=$row['price'];
?>

    <!-- Order Form Section -->
    <div class="container">
        <div class="row p-3">
            <div class="col-md-8 mx-auto p-3">
                <br>
                <h2 class="text-center text-white">
                    Fill this form for to confirm your order
                </h2>
                <br>
                <form action="" method="POST" class="row g-3">
                    <fieldset class="border p-3 rounded-3 border-2">
                        <legend class="float-none w-auto p-2 text-white">Select Product</legend>

                        <div class="d-flex">
                            <img src="images/products/<?= $image ?>" alt="Lip stick" class="w-25 h-25 rounded-3">
                            <div class="px-3">
                                <h3><?= $title ?></h3>
                                <p>$ <?= $price ?></p>

                                <label for="inputNumber" class="form-label">Items</label>
                                <input type="number" class="form-control w-25" name='qty' min="1" value="1" id="inputNumber">
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="border p-3 rounded-3 border-2">

                        <legend class="float-none w-auto p-2 text-white">
                            Delivery Details
                        </legend>

                        <div class="col-md-12 ">
                            <label for="inputName" class="form-label text-white">Name</label>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="James">
                        </div>

                        <div class="col-md-12 ">
                            <label for="inputPhone" class="form-label text-white">Phone</label>
                            <input type="tel" class="form-control" id="inputPhone" name="phone" placeholder="097979xxxxxx">
                        </div>

                        <div class="col-md-12 ">
                            <label for="inputEmail" class="form-label text-white">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="someone@gmail.com">
                        </div>

                        <div class="col-md-12 ">
                            <label for="textarea" class="form-label text-white">Your Address </label>
                            <textarea class="form-control mt-3" name="address" placeholder="Your Address Details" id="textarea"
                                style="height: 150px;"></textarea>
                        </div>
                        <input type="hidden" value="<?= $title ?>" name="product">
                        <input type="hidden" value="<?= $price ?>" name="price">
                          <button type="submit"  class="mt-3 btn btn-primary w-40 text-decoration-none">Confirm Order</button>
                    </fieldset>

                </form>
            </div>
        </div>
    </div>
<?php
include('./widget/footer.php');
?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $product_title=$_POST['product'];
  $price=$_POST['price'];
  $qty=$_POST['qty'];
  $total = $price * $qty;
  $order_date=date('Y-m-d H:i:s');
  $status="Ordered";
  $name=$_POST['name'];
  $contact=$_POST['phone'];
  $email=$_POST['email'];
  $address=$_POST['address'];

  $sql= "INSERT INTO orders 
  SET product='$product_title',
  price=$price,
  qty=$qty,
  total=$total,
  order_date='$order_date',
  status='$status',
  name='$name',
  contact='$contact',
  email='$email',
  address='$address'
  ";
  
  $res=mysqli_query($conn,$sql);

  if ($res) {
    $_SESSION['noti'] = '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
       Order Added Successfully
    </div>';
    header('location: index.php');
exit;


} else {
    $_SESSION['noti'] = '
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Failed to Add Order
    </div>';
      header('location: index.php');
      exit;

}
}

?>