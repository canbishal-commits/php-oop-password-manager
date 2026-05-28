<?php

class PasswordGenerator {

    public function generate($uppercase, $lowercase, $numbers, $special) {

        $upperChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lowerChars = "abcdefghijklmnopqrstuvwxyz";
        $numberChars = "0123456789";
        $specialChars = "!@#$%^&*";

        $password = "";

        for($i = 0; $i < $uppercase; $i++) {

            $password .= $upperChars[rand(0, strlen($upperChars)-1)];
        }

        for($i = 0; $i < $lowercase; $i++) {

            $password .= $lowerChars[rand(0, strlen($lowerChars)-1)];
        }

        for($i = 0; $i < $numbers; $i++) {

            $password .= $numberChars[rand(0, strlen($numberChars)-1)];
        }

        for($i = 0; $i < $special; $i++) {

            $password .= $specialChars[rand(0, strlen($specialChars)-1)];
        }

        return str_shuffle($password);
    }
}

?>