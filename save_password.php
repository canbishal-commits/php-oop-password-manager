<?php

session_start();

require_once "classes/Database.php";
require_once "classes/PasswordManager.php";

$db = new Database();
$conn = $db->connect();

$passwordManager = new PasswordManager($conn);

if(isset($_POST['save'])) {

    $website = $_POST['website'];
    $password = $_POST['password'];

    if($passwordManager->savePassword(
        $_SESSION['user_id'],
        $website,
        $password
    )) {

        echo "Password Saved";
    }
}

?>

<h1>Save Password</h1>

<form method="POST">

    Website Name:
    <input type="text" name="website" required>

    <br><br>

    Password:
    <input type="text" name="password" required>

    <br><br>

    <button type="submit" name="save">
        Save Password
    </button>

</form>