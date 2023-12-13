<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
include_once('script.php');
$category = new Category('Laptops',['Lenovo,Macbook']);

$category->addProducts('HP');
$category->addProducts('Asus');
$category->addProducts('Dell');

echo $category->getName() . '</br>';
foreach($category->getListProducts() as $product){
    echo $product . ', ';
}
?>
</body>
</html>