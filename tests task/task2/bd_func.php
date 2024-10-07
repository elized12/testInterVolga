<?php
require_once __DIR__ . "/database.php";

/**
 * Удаляет записи категорий в которых нету продуктов (в таблице 'categories')
 * @param PDO $pdoDB экземпляр PDO подключенный к бд
 * @throws \Exception
 * @return void
 */
function clearCategoryProductDB(PDO $pdoDB): void
{
    $sqlQuery = $pdoDB->prepare("DELETE FROM categories WHERE id NOT IN (SELECT DISTINCT category_id FROM products)");

    try
    {
        $sqlQuery->execute();
    }
    catch (PDOException $ex)
    {
        throw new Exception("ошибка очистки категорий продуктов : " . $ex->getMessage());
    }
}
/**
 * Удаляет записи продуктов которых нету в наличии (в таблице 'products')
 * @param PDO $pdoDB экземпляр PDO подключенный к бд
 * @throws \Exception
 * @return void
 */
function clearMissingProducts(PDO $pdoDB): void
{
    $sqlQuery = $pdoDB->prepare("DELETE FROM products  WHERE id NOT IN (SELECT DISTINCT product_id FROM availabilities WHERE amount > 0)");
    
    try
    {
        $sqlQuery->execute();
    }
    catch (PDOException $ex)
    {
        throw new Exception("ошибка очистки отсутствующих продуктов : " . $ex->getMessage());
    }
}
/**
 * Удаляет записи складов в которых нету продуктов (в таблице 'stocks')
 * @param PDO $pdoDB экземпляр PDO подключенный к бд
 * @throws \Exception
 * @return void
 */
function clearEmptyStocks(PDO $pdoDB): void
{
    $sqlQuery = $pdoDB->prepare("SELECT * FROM stocks WHERE id NOT IN (SELECT DISTINCT stock_id FROM availabilities WHERE amount > 0)");
    
    try
    {
        $sqlQuery->execute();
    }
    catch (PDOException $ex)
    {
        throw new Exception("ошибка очистки отсутствующих продуктов : " . $ex->getMessage());
    }
}

/**
 * Получает массив всех записей в таблице
 * @param PDO $pdoDB подключение к бд
 * @param string $tableName название таблицы
 * @throws \Exception
 * @return array массив записей
 */
function getAllRecords(PDO $pdoDB, string $tableName):array
{
    $sqlQuery = $pdoDB->prepare("SELECT * FROM " . $tableName);

    try
    {
        $sqlQuery->execute();
        return $sqlQuery->fetchAll();
    }
    catch (PDOException $ex)
    {
        throw new Exception("ошибка получение всех записей в " . $tableName . " : " . $ex->getMessage());
    }
}