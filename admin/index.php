<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LLP Online Shop | Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #ffe0e0);
            font-family: "Poppins", sans-serif;
        }
        .navbar {
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .navbar-brand {
            font-weight: 600;
            color: #333 !important;
        }
        .dashboard-title {
            font-size: 1.8rem;
            font-weight: 600;
            margin-top: 40px;
            color: #333;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card h4 {
            font-size: 2rem;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 20px 0;
            color: #666;
            font-size: 0.9rem;
        }
        .footer span {
            color: #000;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">LLP Online Shop</a>
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
