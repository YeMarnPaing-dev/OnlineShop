<?php include_once('widget/header.php'); ?>

<!-- Search Section -->
<div class="container p-4">
    <h2 class="text-center text-white d-none d-lg-block mb-4">Search Products</h2>

    <form action="search-product.php" method="GET" class="d-flex justify-content-center mb-4">
        <input 
            type="text" 
            name="search" 
            class="form-control w-50 p-2 rounded-start-4 border-primary" 
            placeholder="Search for products..." 
            value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
            required
        >
        <button type="submit" class="btn btn-primary rounded-end-4 px-4">Search</button>
    </form>
</div>

<!-- Product Results Section -->
<div class="container pb-5">
    <div class="row">
        <?php
   
        $products = [
            ['name' => 'Shampoo', 'price' => 2.3, 'image' => 'images/shamboo.svg', 'description' => 'Gentle daily hair shampoo'],
            ['name' => 'Lipstick', 'price' => 2.3, 'image' => 'images/lipstick.svg', 'description' => 'Matte long-lasting lipstick'],
            ['name' => 'Conditioner', 'price' => 3.5, 'image' => 'images/shamboo.svg', 'description' => 'Smooth & silky conditioner'],
        ];

      
        if (!empty($products)) {
            foreach ($products as $product) {
                echo '
                <div class="col-md-6 col-lg-4 p-2">
                    <div class="p-3 border-0 rounded-4 bg-body shadow-sm h-100">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="' . $product['image'] . '" class="rounded-4 mt-2" width="120" height="120" alt="' . $product['name'] . '">
                            <div class="p-3">
                                <h4>' . htmlspecialchars($product['name']) . '</h4>
                                <p class="fw-bold text-primary">$' . number_format($product['price'], 2) . '</p>
                                <p class="text-muted small">' . htmlspecialchars($product['description']) . '</p>
                                <a href="order.php?product=' . urlencode($product['name']) . '" class="btn btn-primary mt-2">Order Now</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        } else {
            echo '<p class="text-center text-muted mt-5">No products found for your search.</p>';
        }
        ?>
    </div>
</div>

<?php include_once('widget/footer.php'); ?>
