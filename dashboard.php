<?php

session_start();

if(!isset($_SESSION['user_id'])) {

    header("Location: login.php");
}

?>

<h1>Dashboard</h1>

<p>Login Successful</p>

<a href="generate_password.php">
    Generate Password
</a>

<br><br>

<a href="save_password.php">
    Save Password
</a>

<br><br>

<a href="logout.php">
    Logout
</a>