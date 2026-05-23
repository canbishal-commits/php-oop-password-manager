<?php

class User {

    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($username, $password, $user_key) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username, password, user_key)
                VALUES(:username, :password, :user_key)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':username' => $username,
            ':password' => $hashedPassword,
            ':user_key' => $user_key
        ]);
    }

    public function login($username, $password) {

        $sql = "SELECT * FROM users WHERE username = :username";

        $stmt = $this->conn->prepare($sql);

        $stmt->execute([
            ':username' => $username
        ]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}

?>