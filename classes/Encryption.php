<?php

class Encryption {

    public static function encryptPassword($password, $key) {

        $iv = substr(hash('sha256', $key), 0, 16);

        return openssl_encrypt(
            $password,
            'AES-256-CBC',
            $key,
            0,
            $iv
        );
    }

    public static function decryptPassword($password, $key) {

        $iv = substr(hash('sha256', $key), 0, 16);

        return openssl_decrypt(
            $password,
            'AES-256-CBC',
            $key,
            0,
            $iv
        );
    }
}

?>