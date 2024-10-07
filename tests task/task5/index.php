<?php 
    require_once "logic.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task5</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .error-message
        {
            border-radius: 15px;
            width: 100%;
            border: 1px solid rgb(255,0,0);
            padding-block: 15px;
            padding-inline: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <?php if (!empty($errorMessage)):?>
            <p class="error-message">
                <?php foreach ($errorMessage as $error)
                {
                 echo $error;
                 echo "<br>"; 
                }
                ?>
            </p>
        <?php endif;?>
        <h1 class="text-center mb-4">func BROTHERS</h1>
        <form method="get">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="countSisters">Количество сестер</label>
                    <input type="number" class="form-control"  name="countSisters" min="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="countBrothers">Количество братьев</label>
                    <input type="number" class="form-control" name="countBrothers" min="0" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="result">Результат</label>
                    <input type="text" class="form-control" id="result" value="<?php echo htmlspecialchars($resultCountSisterForBrothers);?>" readonly>
                </div>
            </div>
            <input type="submit" class="btn btn-primary" name = "sendToFunc" value="Отправить">
        </form>
    </div>
</body>
</html>