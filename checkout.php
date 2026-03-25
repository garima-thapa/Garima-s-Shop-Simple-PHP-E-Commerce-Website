<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Assume user is logged in and we have $_SESSION['user_id']
$user_id = $_SESSION['user_id'] ?? 1; // fallback for testing

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $total = 0;
    foreach ($_SESSION['cart'] as $id => $qty) {
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $product = mysqli_fetch_assoc($result);
        $total += $product['price'] * $qty;
    }

    // Insert order
    mysqli_query($conn, "INSERT INTO orders (user_id, total) VALUES ($user_id, $total)");
    $order_id = mysqli_insert_id($conn);

    // Insert order items
    foreach ($_SESSION['cart'] as $id => $qty) {
        $result = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
        $product = mysqli_fetch_assoc($result);
        $price = $product['price'];
        mysqli_query($conn, "INSERT INTO order_items (order_id, product_id, quantity, price) 
                             VALUES ($order_id, $id, $qty, $price)");
    }

    $_SESSION['cart'] = []; // clear cart
    echo "Order placed successfully!<a href='my_orders.php'>View my orders</a>";
}
?>

<html>
<body>
    <h1>Checkout</h1>
    <form method="post">
        <button type="submit">Confirm Order</button>
    </form>
</body>
</html>
