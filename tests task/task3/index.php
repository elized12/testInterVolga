<?php 
    require_once __DIR__ . "/logic.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>task 3</title>
    <style>
        .comment
        {
            margin-bottom: 15px;
            width: 100%;
            background-color: aliceblue;
            padding: 10px;
            border-radius: 15px;
        }

        .comment_header
        {
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
        }

        .comment__body
        {
            padding-block: 5px;
        }
        .error-block
        {
            border-radius: 15px;
            display: inline-block;
            border: 1px solid rgb(255,0,0);
            padding: 7px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php if (!empty($error)):?>
            <div class="error-block">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name = "contentComment"></textarea>
            </div>
            <input class="btn btn-primary" type="submit" value="Отправить">
        </form>
    </div>
    <div class="container">
        <h3>Коментарии:</h3>
        <div class="comments">
            <?php foreach($comments as $comment):?>
                <div class="comment">
                    <div class="comment_header">
                        <?php echo htmlspecialchars($comment['date_create']); ?>
                    </div>
                    <div class="comment__body">
                        <?php echo htmlspecialchars($comment['comment']); ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>