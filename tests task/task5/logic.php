<?php

/**
 * Возвращает количество сестер для произвольного брата
 * @param int $countSisters кол-во сестер
 * @param int $countBrothers кол-во братьев
 * @throws \Exception
 * @return int количество сестер для произвольного брата
 */
function getSistersForBrothers(int $countSisters, int $countBrothers):int
{
    if ($countSisters < 0)
        throw new Exception("Количество сестер не может быть отрицательным");

    if ($countBrothers < 0)
        throw new Exception("Количество братьев не может быть отрицательным");

    
    //если братьев нету, то и для них сестер тоже нет
    if ($countBrothers == 0)
        return 0;


    // возвращаем количество сестер у Алисы + сама алиса
    return $countSisters + 1;

}

function isInteger($str):bool 
{
    return filter_var($str, FILTER_VALIDATE_INT);
}



//сообщение ошибки
$errorMessage = [];

//результат функции
$resultCountSisterForBrothers = "";

if (!empty($_GET['sendToFunc']))
{

    $countSisters = $_GET['countSisters'] ?? 0;
    
    $countBrothters = $_GET['countBrothers'] ?? 0;
    
    if (!isInteger($countSisters))
        $errorMessage['errorSister'] = "неверное количество сестер";
    
    if (!isInteger($countBrothters))
        $errorMessage['errorBrothrer'] = "неверное количество братьев";
    
    if (empty($errorMessage))
    {
        try
        {
            $resultCountSisterForBrothers = getSistersForBrothers($countSisters,$countBrothters);
        }
        catch (Exception $ex)
        {
            $errorMessage['errorFunc'] = "ошибка : " . $ex->getMessage(); 
            $resultCountSisterForBrothers = "";
        }
    }
}



