<?php
include("db.php");
if ($_SERVER['REQUEST_METHOD']=='POST'){
	$username=$_POST['username'];
	$password=password_hash($_POST['password'],PASSWORD_DEFAULT);
	$email=$_POST['email'];

	$sql = "INSERT INTO users (username, password,email) VALUES ('$username', '$password','$email')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful! <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<html>
<body>
    <h1>Register</h1>
    <form method="post">
        Username: <input type="text" name="username" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="text" name="email" required><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>