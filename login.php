<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "classes/Database.php";
require_once "classes/User.php";

$db = new Database();
$conn = $db->connect();

$user = new User($conn);

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $user->login($username, $password);

    if($result) {

        $_SESSION['user_id'] = $result['id'];

        header("Location: dashboard.php");

    } else {

        echo "Invalid Credentials";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h1>Login</h1>

<form method="POST">

    <input type="text" name="username" placeholder="Username" required>

    <br><br>

    <input type="password" name="password" placeholder="Password" required>

    <br><br>

    <button type="submit" name="login">
        Login
    </button>

</form>
</div>

</body>
</html>