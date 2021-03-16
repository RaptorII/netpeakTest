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

<form action="addReviewAction.php" method=post enctype=multipart/form-data>
    <div class="form-group">
        <label for="rev_usr_name">Revision user name</label>
        <input type="text" class="form-control" id="rev_usr_name" placeholder="Revision user name" name="rev_usr_name">
    </div>
    <div class="form-group">
        <label for="rev_estimate">Estimate </label>
        <select type="text" name="rev_estimate" class="form-control" id="rev_estimate">
            <option value="1">01</option>
            <option value="2">02</option>
            <option value="3">03</option>
            <option value="4">04</option>
            <option value="5">05</option>
            <option value="6">06</option>
            <option value="7">07</option>
            <option value="8">08</option>
            <option value="9">09</option>
            <option value="10">10</option>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="product_id" value="<?=$_GET['product_id']?>">
    </div>
    <div class="form-group">
        <label for="rev_comment">Comment </label>
        <input type="text" class="form-control" id="rev_comment" placeholder="comment" name="rev_comment">
    </div>

    <button type="submit" class="btn btn-primary">Add review</button>
</form>

</body>
</html>

