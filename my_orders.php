<?php
session_start();
include("db.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$result = mysqli_query($conn, "SELECT * FROM orders WHERE user_id=$user_id ORDER BY order_date DESC");

echo "<h1>My Orders</h1>";
while ($order = mysqli_fetch_assoc($result)) {
    echo "Order #{$order['id']} - Total: Rs.{$order['total']} - Status: {$order['status']} - Date: {$order['order_date']}<br>";
}
?>
