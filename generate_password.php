<?php

require_once "classes/PasswordGenerator.php";

$password = "";

if(isset($_POST['generate'])) {

    $generator = new PasswordGenerator();

    $password = $generator->generate(
        $_POST['uppercase'],
        $_POST['lowercase'],
        $_POST['numbers'],
        $_POST['special']
    );
}

?>

<h1>Password Generator</h1>

<form method="POST">

    Uppercase Letters:
    <input type="number" name="uppercase" required>

    <br><br>

    Lowercase Letters:
    <input type="number" name="lowercase" required>

    <br><br>

    Numbers:
    <input type="number" name="numbers" required>

    <br><br>

    Special Characters:
    <input type="number" name="special" required>

    <br><br>

    <button type="submit" name="generate">
        Generate Password
    </button>

</form>

<h2><?php echo $password; ?></h2>