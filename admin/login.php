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
                </div>
                        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>