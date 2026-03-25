<?php
session_start();
session_destroy();
echo "You have logged out. <a href='login.php'>Login again</a>";
?>
