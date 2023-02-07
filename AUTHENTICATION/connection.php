<?php

declare(strict_types=1);

require "InputValueException.php";
$connection = new PDO("mysql:host=localhost;dbname=test",'root','');
try {
    if (isset($_POST['name']) and isset($_POST['password'])) {
        if ((str_contains($_POST['password'],'_') and strlen((string)$_POST['password'])) and
            (strlen($_POST['name']) >= 4)) {
            $name = htmlspecialchars($_POST['name']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);

            $query = "INSERT INTO autorization (name, password,email) 
                               VALUES      ('$name', '$password', '$email')";
            if ($connection->query($query)) {
                require "html";
            } else {
                echo throw new InputValueException('sql error');
            }
        }
        else {
            echo "<br><br>";
            throw new InputValueException('wrong params');
        }
    }

} catch (InputValueException $exception){
    exit($exception->getMessage().$exception->getLine());
}