<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">    
    <title>App Mysql e Front Docker</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css"/>
</head>
<body>
    <?php
        $result = file_get_contents("http://ct-node:9001");
        $products = json_decode($result);
    ?>

    <div class="container">    
        <table class="table">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product): ?>
                    <tr>
                        <td><?php echo $product->nome; ?></td>
                        <td><?php echo $product->preco; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
