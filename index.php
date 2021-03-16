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

    $sql = "SELECT * FROM product";
    switch ($_GET['sort']) {
        case 'sort_id':
            $sql = $sql . " ORDER BY id";
            break;
        case 'product_name':
            $sql = $sql . " ORDER BY product_name";
            break;
        case 'product_img':
            $sql = $sql . " ORDER BY product_img";
            break;
        case 'product_data':
            $sql = $sql . " ORDER BY product_data";
            break;
        case 'product_usr_add':
            $sql = $sql . " ORDER BY product_usr_add";
            break;
        case 'product_review':
            $sql = $sql . " ORDER BY product_review";
            break;
    }

    $res = $db::getRows($sql);

    $sql = "SELECT * FROM users";
    $resUsr = $db::getRows($sql);

    $dataUsrs = [];
    foreach ($resUsr as $usr) {
        $dataUsrs[$usr['id']] = $usr;
    }

?>
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>id <a href="?sort=sort_id"><i class="fas fa-sort-down"></i></a></th>
            <th>product_name <a href="?sort=product_name"><i class="fas fa-sort-down"></i></a></th>
            <th>product_img <a href="?sort=product_img"><i class="fas fa-sort-down"></i></a></th>
            <th>product_data <a href="?sort=product_data"><i class="fas fa-sort-down"></i></a> </th>
            <th>product_usr_add <a href="?sort=product_usr_add"><i class="fas fa-sort-down"></i></a></th>
            <th>product_review <a href="?sort=product_review"><i class="fas fa-sort-down"></i></a></th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach ($res as $item) {
    ?>
        <tr>
            <th scope="row"><?= $item['id']?></th>
            <td>
                <a href="product.php?product_id=<?=$item['id']?>">
                    <?=$item['product_name']?>
                </a>
            </td>
            <td>
                <?php if ($item['product_img']) :?>
                    <img class="tab-img" src="<?=$item['product_img']?>" alt="...">
                <?php endif; ?>
            </td>
            <td><?=$item['product_data']?></td>
            <td><?=$dataUsrs[$item['product_usr_add']]['user_name']?></td>
            <td><?=$item['product_review']?></td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>

<a href="add.php" type="button" class="btn btn-primary">Add item</a>

</body>
</html>
