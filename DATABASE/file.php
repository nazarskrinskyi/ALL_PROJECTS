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
<?php
echo "<pre>";
$host = 'localhost';
$userNAme = 'root';
$db = 'db';

/** ANOTHER WAY */
/*$sql = "SELECT
            countries.name as country_name,
            countries.id   as country_id,
            cities.name    as city_name,
            cities.id      as city_id
        FROM countries INNER JOIN cities WHERE countries.id = cities.country_id";*/
/**Цепочка связанных таблиц*/
/*
$sql = "SELECT
            seas.name            as sea_name,
            seas.id              as sea_id,
            rivers.name          as river_name,
            rivers.id            as river_id,
            rivers.sea_id        as river_sea_id,
            users_river.name     as users_name,
            users_river.river_id as user_river_id
        FROM seas
            LEFT JOIN rivers      on seas.id = rivers.sea_id
            LEFT JOIN users_river on rivers.id = users_river.river_id";*/
/**Связывание через таблицу связи в PHP*/
/*$sql = "SELECT
	        owners.name as owner_name,
	        cars.name   as car_name
        FROM owners
            LEFT JOIN owners_cars ON owners_cars.owner_id = owners.id
            LEFT JOIN cars        ON owners_cars.car_id   = cars.id";*/
/**Родственные связи данных в PHP*/
/*$sql = "SELECT
	cities.name as city_name,
	country.name as country_name
FROM
	cities
INNER JOIN cities as country ON country.id = cities.country_id";*/
/**Несколько потомков в родственных связях в PHP*//*
$sql = "SELECT
	cities.name as city_name,
	country_id.name as country_name
FROM
	cities
LEFT JOIN cities as country_id ON country_id.id=cities.country_id";
/*$sql = "SELECT
        cars.name as car,
        owners.name as owner
FROM owners_cars
INNER JOIN owners ON owners.id = owners_cars.owner_id
INNER JOIN cars   ON cars.id   = owners_cars.car_id
";*/
/**Двойная связь с одной таблицей в PHP*/

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$db", $userNAme, "",
        [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false #dont allow duplicate VALUES(:data,:data) => error
        ]
    );

    /**DELETION FROM TABLE*/
    if (isset($_GET['del'])) {
        $sql = "DELETE FROM users2 where users2.id=$_GET[del]";
        $conn->prepare($sql);
            $conn->query($sql) ?? die("query error");
    }
    // SHORT VERSION OF INPUT
    function input($name, array $params = null): string
    {
        $value = $_POST[$name] ?? '';
        if (!empty($params)) {
            $addition = '';
            foreach ($params as $key => $value2) {
                $addition .= " $key=\"$value2\"";
            }
            return "<input name=\"$name\" value=\"$value\"$addition>";
        } else {
            return "<input name=\"$name\" value=\"$value\">";
        }
    }

    // Сохранение нового (до получения!):
    if ((isset($_POST['age']) and isset($_POST['name'])) and isset($_POST['date'])) {
        $name = htmlspecialchars($_POST['name']);
        $age = htmlspecialchars($_POST['age']);
        $date = htmlspecialchars($_POST['date']);
        $sql = "INSERT INTO users2 (id,name,age,date)
                   values (null,'$name','$age','$date')";
            $conn->query($sql) ?? die("query error");
    }

    // update params this version is work
    if (isset($_POST['id'])) {
        $sql = '';
        $new_name = htmlspecialchars($_POST['newName']);
        $sql .= "UPDATE users2 SET users2.name='$new_name',";
        $new_age = htmlspecialchars($_POST['newAge']);
        $sql .= "users2.age='$new_age',";

        $new_date = htmlspecialchars($_POST['newDate']);
        $sql .= "users2.date='$new_date' where users2.id=$_POST[id]";
            $conn->query($sql) ?? die("query error");
    }
    ?>
    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>age</th>
            <th>date</th>
            <th>delete</th>
        </tr>
        <?php
        /////pages
        $page = $_GET['page'] ?? 1;
        $elements = 5;
        $from = ($page - 1) * $elements;

        $sql = "SELECT * FROM users2 LIMIT $from,$elements";

        $tag = '';
        $users = $conn->query($sql)->fetchAll();

        /////how many elem
        $sql = "SELECT count(*) as count FROM users2";
        $counter = $conn->query($sql)->fetchAll();


        foreach ($users as $value) {
            $tag .= "<tr>";
            $tag .= "<td>$value[id]</td>";
            $tag .= "<td>$value[name]</td>";
            $tag .= "<td>$value[age]</td>";
            $tag .= "<td>$value[date]</td>";
            if (isset($_GET['page'])) {
                $tag .= "<td><a href =\"?page=$_GET[page]&del=$value[id]\">удалить</a></td>";
            }
            else {
                $tag .= "<td><a href =\"?del=$value[id]\">удалить</a></td>";
            }
            $tag .= "</tr>";
        }
        echo $tag;

        ?>
    </table>
    <div style="text-align: center">
        <?php
        $prev = ($page - 1);
        $next = ($page + 1);

        echo "<a href='?page=$prev'><<<</a> ";
        for ($i = 1; $i <= ceil($counter[0]['count'] / $elements); $i++) {
            if ($i == $page) {
                echo "<a href='?page=$i' class='active' style='color: red'>active[page#$i]</a> ";
            } else {
                echo "<a href='?page=$i'>page#$i</a> ";
            }
        }
        if ($page >= ceil($counter[0]['count'] / $elements)) {
            $page = 0;
            $next = ($page + 1);
            echo "<a href='?page=$next'>>>></a>";
        } else {
            echo "<a href='?page=$next'>>>></a>";
        }
        $_GET['page'] = $page;
        ?>
    </div>
    <fieldset style="width: 500px;display: flex">
        <legend style="text-align: center;font-size: x-large">ADD USER</legend>
        <form method="post" style="text-align: justify;">
            <label>
                <?php
                echo input('name', ['type' => 'text', "style" => "cursor: pointer"]); ?>
            </label>
            <label>
                <?php
                echo input('age', ['type' => 'number', "style" => "cursor: pointer"]); ?>
            </label>
            <label>
                <?php
                echo input('date', ['type' => 'datetime-local', "style" => "cursor: pointer"]); ?>
            </label><br>
            <input type="submit" value="add_user" style="cursor: pointer">
        </form>
    </fieldset>
    <fieldset style="width: 500px;display: flex">
        <legend style="text-align: center;font-size: x-large">ALTER USER</legend>
        <form method="post" style="text-align: justify">
            <label>
                <?php
                echo input('id', ['type' => 'number', "style" => "cursor: pointer"]); ?>
            </label>
            <label>
                <?php
                echo input('newName', ['type' => 'text', "style" => "cursor: pointer"]); ?>
            </label>
            <label>
                <?php
                echo input('newAge', ['type' => 'number', "style" => "cursor: pointer"]); ?>
            </label>
            <label>
                <?php
                echo input('newDate', ['type' => 'datetime-local', "style" => "cursor: pointer"]); ?>
            </label><br>
            <input type="submit" value="alter_user" style="cursor: pointer">

        </form>
    </fieldset>
    <hr>
    <?php

    /*$res = [];
    foreach ($users as $elem) {
        $res[$elem['owner']][] = $elem['car'];
    }
    var_dump($res);
    echo "<ul>";
    foreach ($res as $key => $value) {
        $implode = implode(',', $value);
        echo "<li>$key:$implode</li><br>";
    }
    echo "</ul>";*/
//$conn->commit();
} catch (PDOException $exception) {
    echo $exception->getFile() . $exception->getMessage() . $exception->getLine();
}
?>
</body>
</html>



