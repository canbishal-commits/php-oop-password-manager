<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once "classes/Database.php";
require_once "classes/User.php";

$db = new Database();
$conn = $db->connect();

$user = new User($conn);

if(isset($_POST['register'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $generatedKey = openssl_random_pseudo_bytes(32);

   $iv = random_bytes(16);

$encryptedKey = openssl_encrypt(
    bin2hex($generatedKey),
    'AES-256-CBC',
    $password,
    0,
    $iv
);

    if($user->register($username, $password, $encryptedKey)) {

        echo "Registration Successful";

    } else {

        echo "Registration Failed";
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
<h1>Register</h1>

<form method="POST">

    <input type="text" name="username" placeholder="Username" required>

    <br><br>

    <input type="password" name="password" placeholder="Password" required>

    <br><br>

    <button type="submit" name="register">
        Register
    </button>

</form>
</div>

</body>
</html>