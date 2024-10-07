<?php
require_once "logic.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>task4</title>
    <style>
        .error-message {
            border-radius: 15px;
            width: 100%;
            border: 1px solid rgb(255, 0, 0);
            padding-block: 15px;
            padding-inline: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Text Input Form</h1>
        <p>если я правильно понял то мы должны пройтись по всем узлам Dom дерева обрезать лишние не трогая картинки и т.д</p>
        <?php if (!empty($error)): ?>
            <p class="error-message">
                <?php echo $error; ?>
            </p>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="userInput">Введите текст:</label>
                <textarea class="form-control" id="userInput" name="userInput" rows="10" placeholder="Введите ваш текст здесь"><?php if (!empty($_POST['userInput'])) echo htmlspecialchars($_POST['userInput']); ?></textarea>
            </div>
            <input type="submit" class="btn btn-primary" value="Отпраивить">
            <button type="button" class="btn btn-primary" id="inputTemplate">Вставить тестовый вариант</button>
        </form>
        <div class="form-group mt-4">
            <label for="serverOutput">Результат:</label>
            <textarea class="form-control" id="serverOutput" rows="10" readonly><?php if (!empty($resultText)) echo htmlspecialchars($resultText); ?></textarea>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h2>Demo Visual</h2>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <h2>Вводимый текст:</h2>
                    <div class="row">
                        <?php if (!empty($_POST['userInput'])) echo $_POST['userInput'];?>
                    </div>
                </div>
            </div>
            <div class="col-6">
            <div class="row">
                    <h2>Результат:</h2>
                    <div class="row">
                        <?php if (!empty($resultText)) echo $resultText;?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        const buttonInputTest = document.getElementById('inputTemplate');
        const textAreaClientInput = document.getElementById('userInput');
        const textTest = `<p class="big"> 
    Год основания:<b>1589 г.</b> Волгоград отмечает день города в <b>2-е воскресенье сентября</b>. <br>В <b>2023 году</b> эта дата - <b>10 сентября</b>. 
</p> 
<p class="float"> 
    <img src="https://www.calend.ru/img/content_events/i0/961.jpg" alt="Волгоград" width="300" height="200" itemprop="image"> 
    <span class="caption gray">Скульптура «Родина-мать зовет!» входит в число семи чудес России (Фото: Art Konovalov, по лицензии shutterstock.com)</span> 
</p> 
<p> 
    <i><b>Великая Отечественная война в истории города</b></i></p><p><i>Важнейшей операцией Советской Армии в Великой Отечественной войне стала <a href="https://www.calend.ru/holidays/0/0/1869/">Сталинградская битва</a> (17.07.1942 - 02.02.1943). Целью боевых действий советских войск являлись оборона  Сталинграда и разгром действовавшей на сталинградском направлении группировки противника. Победа советских войск в Сталинградской битве имела решающее значение для победы Советского Союза в Великой Отечественной войне.</i> 
</p>`;

        buttonInputTest.addEventListener('click', function() {
            textAreaClientInput.value = "";
            textAreaClientInput.value = textTest;
        });
    </script>
</body>

</html>