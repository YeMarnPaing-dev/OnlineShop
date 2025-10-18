<?php
include('../config.php')
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online-Shop</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 pt-3 pb-3 mx-auto">
                <div class="h-25">
                    <?php
                    if(isset($_SESSION['noti'])){
                        echo $_SESSION['noti'];
                        unset($_SESSION['noti']);
                    }
                    ?>
                </div>
                <br><br>
                <div class="border p-3 rounded-3">
                    <img src="../images/logo.png" alt="" class="mx-auto d-block mb-3" style="width:30%">
                    <form action="" method="POST">
                        <div class="mb-3">
                        <label for="username" class="form-lable">UserName</label>
                        <input type="text" class="form-control" name='username' id="username" required>
                    </div>
                     <div class="mb-3">
                        <label for="password" class="form-lable">Password</label>
                        <input type="password" class="form-control" name='password' id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $username=$_POST['username'];
  $password=md5($_POST['password']);

  $sql = "SELECT * FROM admins WHERE 
  userName = '$username' AND password = '$password'
  ";

  $res =mysqli_query($conn,$sql);

  $count = mysqli_num_rows($res);
  if($count == 1){
    $_SESSION['noti'] = '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Login Successfully
                </div>';
                header('location: index.php');
  }else{
    $_SESSION['noti'] = '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                   Fail to Login
                </div>';
  }
}

?>