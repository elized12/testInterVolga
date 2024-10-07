<?php
require_once __DIR__ . "/comments_db.php";
?>

<?php 
function processPostRequest(&$error):void
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $commentContent = $_POST['contentComment'];

            $clearComment = trim($commentContent);

            if (!empty($clearComment))
            {
                CommentDB::addComment($clearComment);
                header("Location: " . $_SERVER['PHP_SELF']);
                exit;
            }
            else
            {
                $error = "комментарий пуст";
            }
        }
}
?>


<?php 
//для ошибок
$error = "";

//обработка post запроса
processPostRequest($error);

$comments = CommentDB::getAllComments(true);
