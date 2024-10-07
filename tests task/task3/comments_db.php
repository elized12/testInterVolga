<?php 
    require_once __DIR__ . "/database.php";
?>

<?php 

class CommentDB
{
    protected function __construct()
    {

    }
    protected function __clone() {} //delete

    public function __wakeup() // detele
    {
        throw new \BadMethodCallException("Unable to deserialize");
    }

    public static function addComment(string $commentContent) : void
    {
        $pdoSql = Database::prepare("INSERT INTO comments (comment) VALUES (:comment)");

        $pdoSql->bindParam(":comment", $commentContent);

        try
        {
            $pdoSql->execute();
        }
        catch (PDOException $ex)
        {
            throw new Exception("ошибка добавления комментария : " . $ex->getMessage());
        }

    }

    public static function getAllComments(bool $sortedASC = true) : array
    {
        $stringQuery = "SELECT * FROM comments ORDER BY date_create";

        if ($sortedASC == false)
            $stringQuery .= " DESC";

        $sqlPdo = Database::prepare($stringQuery);

        try
        {
            $sqlPdo->execute();

            return $sqlPdo->fetchAll();
        }
        catch (PDOException $ex)
        {
            throw new Exception("ошибка получения всех комментариев : " . $ex->getMessage());
        }
    }

}