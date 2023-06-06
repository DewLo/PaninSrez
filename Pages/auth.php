<?php
include "../connect/connect.php";
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
    include ("../template/header.php");
    ?>
    
    <main>
        <form class="AuthRegForm" method="POST" action="../connect/connectAuth.php">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Введите логин</label>
                <input type="text" class="form-control" name="Login" required id="" aria-describedby="">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Введите пароль</label>
                <input type="password" class="form-control" name="Password" required id="" aria-describedby="">
            </div>
    
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>
    </main>

    <?php
    include ("../template/footer.php");
    ?>

</body>
</html>