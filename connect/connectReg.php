<?php
include ("../connect/connect.php");

// Проверка на уникальность логина
$login = $_POST["Login"];
$checkQuery = "SELECT * FROM `User` WHERE Login = '$login'";
$checkResult = $connect->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        //Логин уже занят, происходит перезагрузка страницы и вывод сообщения
        return header("Location:../Pages/reg.php?message=Такой Логин уже занят.");
    }

// Хеширование пароля
$password = $_POST["Password"];
$hash_pass = password_hash($password, PASSWORD_DEFAULT);

// Регистрация пользователя
$sql_req = sprintf("INSERT INTO `User` VALUES (NULL, '%s','%s','%s','%s','%s','%s','%s','%s');",
    $_POST["Name"], $_POST["Lastname"], $_POST["Patronymic"], $_POST["Login"], $_POST["Email"], $hash_pass, $_POST["ReapeatPass"], "Client");

    if (!$connect->query($sql_req)) {
        return die("Ошибка" . $connect->error);
    }

return header("Location:../Pages/auth.php?message=Регистрация успешна");
?>