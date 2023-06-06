<?php
include ("../connect/connect.php");
?>

<?php
session_start();

// Проверка роли пользователя
    if ($_SESSION['User_Role'] !== 'Admin') {
    //Если роль не соответсвует, то перенаправляем пользователя на страницу авторизации
    header('Location: ../Pages/auth.php?message=У вас нет прав доступа');
    exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>MusicHouse</title>
</head>
<body>
    <?php
    include ("../template/headerAdmin.php");
    ?>
   
    <main>
        
        
    </main>

    <?php
    include ("../template/footer.php");
    ?>

</body>
</html>