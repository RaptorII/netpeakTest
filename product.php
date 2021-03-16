<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

<?php

include_once ('config.php');
include_once ('db.php');

$db = new DB;

$sql = "SELECT * FROM product WHERE id =". $_GET['product_id'];
$res = $db::getRow($sql);

//print_r($res);
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php if ($res['product_img']) :?>
                <img class="prd_img" src="<?=$res['product_img']?>" alt="...">
            <?php endif; ?>
        </div>
        <div class="col-md-6">
            <div class="box">
                <div class="box__name">
                    <?=$res['product_name']?>
                </div>
                <div class="box__estimate">
                    Oценка: <span> 8.4 </span>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <a href="addReview.php" type="button" class="btn btn-primary" role="button">Add review</a>
        <a href="index.php" type="button" class="btn btn-primary" role="button">To main</a>
    </div>
</div>



</body>
</html>
