<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include("db.php");
if (isset($_GET['add'])){
	$product_id=(int)$_GET['add'];
	$_SESSION['cart'][$product_id]=($_SESSION['cart'][$product_id] ?? 0)+1; 

}

if (isset($_GET['remove'])){
	$product_id=(int)$_GET['remove'];
	unset($_SESSION['cart'][$product_id]);
}

echo "<h1> YOUR CART</h1>";

$total=0;
if(!empty($_SESSION['cart'])){
	foreach ($_SESSION['cart'] as $id=> $qty) {
		$result=mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
		$product=mysqli_fetch_assoc($result);

		$subtotal=$product['price']*$qty;
		$total += $subtotal;


		echo "{$product['name']} x {$qty}= Rs.{$subtotal}<br>";

		echo "<a href='cart.php?remove={$id}'>Remove</a><br>";
	}

	echo "<h3>Total:Rs.{$total}</h3>";
	echo "<a href='checkout.php'>Proceed to checkout</a>";
}
else{
	echo "cart is empty";
}
?>