<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../cssPractise.css">
    <title>Document</title>
</head>
<body>
<div>
    <fieldset class="fieldset">
        <legend><strong>Authorization</strong></legend>
        <form action="" method="post" enctype="multipart/form-data">
            <label><strong></strong>
                <abbr title="name"><input class="input" type="text" name="name" placeholder="userName"></abbr><br>
            </label><br>
            <label><strong></strong>
                <abbr title="password"><input class="input" type="password" name='password'
                                              placeholder="userPassword"></abbr><br>

            </label>
            <label>
                <input class="submit" type="submit" value="Authorization"><br>
            </label>
            <label>
                <a class="login" href="../MY_WEB.php">Registration</a>
            </label>
        </form>
    </fieldset>
    <?php
    session_start();
    if (isset($_POST['name']) and isset($_POST['password'])) {
        $name       = htmlspecialchars($_POST['name']);
        $password   = htmlspecialchars($_POST['password']);
        $connection = new PDO("mysql:host=localhost;dbname=test", 'root', '');
        $query      = "SELECT *
                          FROM autorization 
                          WHERE password='$password' and name='$name'";
        $sql   = $connection->query($query);
        $count = $sql->rowCount();
            if ($count >= 1) {
                $_SESSION['name'] = $name;
        } else {
            echo 'wrong info';
            exit();
        }
    }
    if (isset($_SESSION['name'])) {
        $name = $_SESSION['name'];
        require "html2";
        echo "<br> WELCOME AGAIN ($name)";
        echo "<br><a href='logout.php'>Logout</a>";
    } else {
        echo "empty form";
        exit();
    }
    ?>
</body>
</html>