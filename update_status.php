<?php
include("db.php");

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = (int)$_GET['id'];
    $status = $_GET['status'];

    mysqli_query($conn, "UPDATE orders SET status='$status' WHERE id=$id");
    echo "Order #$id updated to $status. <a href='admin_orders.php'>Back to Orders</a>";
}
?>
