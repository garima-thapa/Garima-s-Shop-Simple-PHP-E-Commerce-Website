
<?php
include("db.php");
$result=mysqli_query($conn,"SELECT * FROM products");
?>

<html>
<head>
	<title>GARIMA'S SHOP</title>
	<style> 
	.products{display: flex; flex-wrap: wrap;}
	.product{border: 1px solid #ccc; padding:10px; margin:10px;width:200px;}
	img{max-width:100%;}
</style>
</head>
<body>
	<h1>HELLO EVERYBODY, WELCOME TO MY SHOP!</h1>
	<div class="products">
		<?php while($row=mysqli_fetch_assoc($result)) { ?>
			<div class="product">
				<h2><?php echo htmlspecialchars($row['name']); ?></h2>
				<p><?php echo htmlspecialchars ($row['description']); ?></p>
				<p>Price:Rs.<?php echo $row['price']; ?></p>
				<img src="assets/<?php echo $row['image']; ?>" width="100">
<br>
				<a href="cart.php?add=<?php echo $row['id']; ?>">Add to Cart</a></div>
		<?php } ?>
	</div>
</body>
</div>
