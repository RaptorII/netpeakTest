<?php

include_once ('config.php');
include_once ('db.php');

class dbPrj {

    /**
     * @return array
     */
    public function  getAllProducts(){
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
        return $res = $db::getRows($sql);
    }

    /**
     * @return mixed
     */
    public function getProductById() {
        $db = new DB;
        $sql = "SELECT * FROM `product` WHERE `id` =". $_GET['product_id'];
        $res = $db::getRow($sql);

        return $res;
    }

    /**
     * @return array
     */
    public function getAllUsers() {
        $db = new DB;
        $sql = "SELECT * FROM users";
        $resUsr = $db::getRows($sql);

        $data = [];
        foreach ($resUsr as $usr) {
            $data[$usr['id']] = $usr;
        }
        return $data;
    }

    public function getReviewById(){
        $sql = "SELECT * FROM reviews WHERE product_id =". $_GET['product_id'];
        return (new DB)::getRows($sql);
    }

    /**
     * @return mixed
     */
    public function getAVGEstimate(){
        $db = new DB;
        $sqlAvg = "SELECT 
            AVG(`rev_estimate`) 
            FROM `reviews` 
            WHERE `product_id`= " . $_GET['product_id'];
        return $db::getValue($sqlAvg);
    }

    /**
     * Insert column into table Reviews
     */
    public function insertColumnIntoReviews() {
        $query = "INSERT INTO `reviews` (
                `rev_usr_name`,
                `rev_estimate`,
                `rev_comment`,
                `product_id`,
                `rev_date`
            )
            VALUES (
                :rev_usr_name,
                :rev_estimate,
                :rev_comment,
                :product_id,
                NOW()
        )";

        $args = [
            'rev_usr_name' => $_POST['rev_usr_name'],
            'rev_estimate' => $_POST['rev_estimate'],
            'rev_comment'  => $_POST['rev_comment'],
            'product_id'   => intval($_POST['product_id']),
        ];

        (new DB)::sql($query, $args);

        // update product reviews
        $sql = "SELECT COUNT(*) cnt FROM `reviews` WHERE product_id=" . intval($_POST['product_id']);
        $cnt = (new DB)::getValue($sql);
        $sql = "UPDATE `product` SET `product_review` = ". $cnt ." WHERE id =" . intval($_POST['product_id']);
        (new DB)::sql($sql);
    }

    /**
     * Insert column into table Product
     */
    public function insertColumnIntoProduct(){
        $uploaddir = './uploads/';
        $uploadfile = $uploaddir . basename($_FILES['product_img']['name']);

        if (copy($_FILES['product_img']['tmp_name'], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";
        } else {
            echo "Ошибка!\n";
            //die(' Файл некорректен.');
        }

        $query = "INSERT 
            INTO `product` (
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
    }

}
