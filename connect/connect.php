<?php
    $connect = new mysqli("localhost", "root", "", "MusicHousePanin");
    $connect->set_charset("utf8");

        if ($connect->connect_error)
            die("Ошибка подключения");
?>