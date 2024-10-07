<?php 
    require_once __DIR__ . "/logic.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>task2</title>
</head>

<body>
    <div class="container">
        <h2 class="mt-4">Таблица availabilities</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Product ID</th>
                    <th>Stock ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($availabilities as $availability): ?>
                    <tr>
                        <td><?= $availability['id'] ?></td>
                        <td><?= $availability['amount'] ?></td>
                        <td><?= $availability['product_id'] ?></td>
                        <td><?= $availability['stock_id'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2 class="mt-4">Таблица categories</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['title'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2 class="mt-4">Таблица products</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category ID</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['title'] ?></td>
                        <td><?= $product['category_id'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2 class="mt-4">Таблица stocks</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stocks as $stock): ?>
                    <tr>
                        <td><?= $stock['id'] ?></td>
                        <td><?= $stock['title'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <form method="post">
            <h3>Очистить записи</h3>
            <input type="submit" value = "Очистить" class = "btn btn-danger castom-btn w-100">
        </form>
    </div>
</body>

</html>