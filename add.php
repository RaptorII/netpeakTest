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
$sql = "SELECT * FROM users";
$res = $db::getRows($sql);
?>

<form action="addProduct.php" method=post enctype=multipart/form-data>
    <div class="form-group">
        <label for="product_name">Product name</label>
        <input type="text" class="form-control" id="product_name" placeholder="product name" name="product_name">
    </div>
    <div class="form-group">
        <label for="product_img">Product img</label>
        <input type="file" name="product_img" class="form-control" id="product_img">
    </div>
    <div class="form-group">
        <label for="product_midprice">Product midprice</label>
        <input type="text" class="form-control" id="product_midprice" placeholder="product_midprice" name="product_midprice">
    </div>
    <div class="form-group">
        <label for="product_usr_add">Whu add poduct</label>
        <select class="form-control" id="product_usr_add" name="product_usr_add">
            <?php
            foreach ($res as $item) :
            ?>
            <option value="<?=$item['id']?>"><?=$item['user_name']?></option>
            <?php
            endforeach;
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add product</button>
</form>

</body>
</html>
<?php



//header("Location: index.php");
?>
