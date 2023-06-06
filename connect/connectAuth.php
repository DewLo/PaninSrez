<?
session_start();
//Авторизация пользователей
include "../connect/connect.php";

$login = $_POST["Login"];
$password = $_POST["Password"];
//Запрос на получение данных из БД по логину пользователя
$sql_req = sprintf("SELECT * FROM `User` WHERE `Login`='%s'", $login);
$result = $connect->query($sql_req);

    if (!$result) {
        return die("Ошибка в полученние данных: " . $connect->error);
    }

    if ($result) {
        $user = $result->fetch_assoc();
        $hash_pass = $user["Password"];

        // Проверка соответсвия введеного пароля 
        if (password_verify($password, $hash_pass)) {
            //Успешная авторизация и перенаправление на нужную страницу
            $_SESSION["User_ID"] = $user["ID"];

            if ($user["Role"] == Admin) {
                $_SESSION["User_Role"] = "Admin";
                header("Location: ../Pages/admin.php");
                exit();
            } else {
                $_SESSION["User_Role"] = "Client";
                header("Location: ../Pages/catalogUser.php");
                exit();
            }
        }

    }
    //Неверно введенные данные
    header("Location: ../Pages/auth.php?message=Введеные данные не верны!");
    exit();

?>