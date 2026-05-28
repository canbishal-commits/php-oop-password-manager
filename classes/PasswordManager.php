<?php

class PasswordManager {

    private $conn;

    public function __construct($db) {

        $this->conn = $db;
    }

    public function savePassword($userId, $website, $password) {

        $sql = "INSERT INTO passwords(user_id, website_name, saved_password)
                VALUES(:user_id, :website_name, :saved_password)";

        $stmt = $this->conn->prepare($sql);

        return $stmt->execute([
            ':user_id' => $userId,
            ':website_name' => $website,
            ':saved_password' => $password
        ]);
    }
}

?>