<?php
session_start();
include("db.php");

// For simplicity, no login check here — but in real use, protect this page for admin only.

$result = mysqli_query($conn, "SELECT * FROM orders ORDER BY order_date DESC");

echo "<h1>All Orders</h1>";
while ($order = mysqli_fetch_assoc($result)) {
    echo "Order #{$order['id']} - User ID: {$order['user_id']} - Total: Rs.{$order['total']} - Status: {$order['status']} - Date: {$order['order_date']} ";
    echo "<a href='update_status.php?id={$order['id']}&status=Shipped'>Mark Shipped</a> | ";
    echo "<a href='update_status.php?id={$order['id']}&status=Completed'>Mark Completed</a><br>";
}
?>
