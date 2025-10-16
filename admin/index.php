<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/favicon-16x16.png">
    <link rel="manifest" href="icon/site.webmanifest">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Online Shop | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="/admin/admin.css">
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"> Online Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Admin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Category</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Order</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- DASHBOARD SECTION -->
    <div class="container text-center">
        <h2 class="dashboard-title">Dashboard</h2>

        <div class="row justify-content-center mt-5">
            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card py-4">
                    <h4>5</h4>
                    <p>Categories</p>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <div class="card py-4">
                    <h4>5</h4>
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

    <!-- FOOTER -->
    <div class="footer">
        All rights reserved. Designed by <span>Let's Learn Programming</span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
