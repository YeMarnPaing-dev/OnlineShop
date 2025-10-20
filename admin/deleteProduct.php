<?php
include('../config.php');

if (isset($_GET['id']) && isset($_GET['image'])) {
    $id = intval($_GET['id']); 
    $image = $_GET['image'];

  
    if (!empty($image)) {
        $path = "../images/products/" . basename($image);
        if (file_exists($path)) {
            unlink($path);
        }
    }

    
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $res = $stmt->execute();

    if ($res) {
        $_SESSION['noti'] = '
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Products deleted successfully.
        </div>';
    } else {
        $_SESSION['noti'] = '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Failed to delete products.
        </div>';
    }

    header('location: manageCategory.php');
    exit();
} else {
    $_SESSION['noti'] = '
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Invalid request.
    </div>';
    header('location: manageCategory.php');
    exit();
}
?>

