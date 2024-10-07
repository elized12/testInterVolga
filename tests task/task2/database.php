<?php
/*
        INFO FILE:   файлик для работы с бд
*/

//настройка бд пароль пользотель и т.д
$username = 'root';
$password = 'root';
$dbName = "task2";
$propertyBD = "mysql:host=localhost;dbname={$dbName};charset=utf8";

//Переменная позволяющая работать с бд
$pdoDB;

try
{
    $pdoDB = new PDO($propertyBD,$username, $password);
}
catch (PDOException $ex)
{
    throw new Exception("ошибка подключение к базе данных");
}

