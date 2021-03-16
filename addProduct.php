<?php

include_once ('config.php');
include_once ('db.php');

$uploaddir = './uploads/';
$uploadfile = $uploaddir . basename($_FILES['product_img']['name']);

if (copy($_FILES['product_img']['tmp_name'], $uploadfile)) {
    echo "Файл корректен и был успешно загружен.\n";
} else {
    echo "Ошибка!\n";
    //die(' Файл некорректен.');
}

//print "<pre>";
//print_r($_POST['product_name']);
//print_r($_POST['product_img']);
//print_r($_POST['product_midprice']);
//print_r($_POST['product_usr_add']);
//print "</pre>";


$query = "INSERT INTO `product` (
  `product_name`,
  `product_img`,
  `product_midprice`,
  `product_usr_add`,
  `product_data`
  )
VALUES (
  :product_name,
  :product_img,
  :product_midprice,
  :product_usr_add,
  NOW()
)";

if ($uploadfile == $uploaddir) {
    $uploadfile = '';
}

$args = [
    'product_name' => $_POST['product_name'],
    'product_img' => $uploadfile,
    'product_midprice' => $_POST['product_midprice'],
    'product_usr_add' => $_POST['product_usr_add'],
];

(new DB)::sql($query, $args);

header("Location: index.php");
