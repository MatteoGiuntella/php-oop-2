<?php

require_once __DIR__ . './classes./product.php';
require_once __DIR__ . './classes./food.php';
require_once __DIR__ . './classes./toys.php';
require_once __DIR__ . './classes./cage.php';

$ecommerce = [];

$singleproduct = new product('nome', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpVIOG39300LgJ7Zk2JhHJ3q7PMlYLj-1lKw&usqp=CAU', 3, 'cane', 5, 'lorem ipsum dolor construct flavour', 0);
var_dump($singleproduct);
$ecommerce[] = $singleproduct;

$singletoys = new toys('nome', 'https://www.b2x.it/rest/images/2023/11/15/1488336.jpg?imageFormat=@1x', 3, 'cane', 5, 'lorem ipsum dolor construct flavour', 0, 'plastica', false);
var_dump($singletoys);
$ecommerce[] = $singletoys;

$singlefood = new food('nome', 'https://www.ecologica.it/wp-content/uploads/2020/07/cosa-mangiano-i-pipistrelli.png', 3, 'cane', 5, 'lorem ipsum dolor construct flavour', 0, '24/12/92', 'pollo', 112);
var_dump($singlefood);
$ecommerce[] = $singlefood;

$singlecage = new cage('nome', 'https://d2h71cnfztn2l6.cloudfront.net/wp-content/uploads/2018/08/vipera.jpg', 3, 'cane', 5, 'lorem ipsum dolor construct flavour', 0, 'legno', 'medium');
var_dump($singlecage);
$ecommerce[] = $singlecage;
var_dump($ecommerce);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class=" container ">

        <h1 class=" text-center ">Pet House</h1>

        <div class=" d-flex">
            <?php
             foreach($ecommerce as $key => $product){
                
            ?>
            <div class="card m-3 " style="width: 18rem;">
                <img src="<?php
                    echo $product->image;
                    ?>" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">
                    <?php
                    echo $product->name;
                    ?>
                    </h5>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                    <?php
                    echo $product->price;
                    ?>
                    </li>
                    <li class="list-group-item">
                    <?php
                    echo $product->category;
                    ?>
                    </li>
                    <li class="list-group-item">
                    <?php
                    echo $product->descriptions;
                    ?>
                    </li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link"></a>
                    <a href="#" class="card-link"></a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>

</body>

</html>