<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <h2><?php echo $title ?></h2>

    <ul>
       <?php foreach ($products as $key => $value) : ?>
       <li><a href="/products/category/<?php echo $key ?>"><?php echo $value ?></a></li>
       <?php endforeach ?>
    </ul>
</body>
</html>