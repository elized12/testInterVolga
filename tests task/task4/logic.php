<?php
require_once "helper_func.php";


function processPostRequest(&$error, &$resultText)
{
    if ($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $userText = $_POST['userInput'] ?? "";

        if (empty($userText))
        {
            $error = "поле пустое";
            return;
        }

        try
        {
            $resultText = truncateText($userText, 29);
        }
        catch (Exception $ex)
        {
            $error = "Ошибка выполения преобразование";
            $resultText = "";
            return ;
        }
    }
}

$resultText = "";
$error = "";

processPostRequest($error,$resultText);


?>