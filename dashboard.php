<?php

session_start();

if(!isset($_SESSION['user_id'])) {

    header("Location: login.php");
}

?>

<h1>Dashboard</h1>

<p>Login Successful</p>

<a href="logout.php">Logout</a>