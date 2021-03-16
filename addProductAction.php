<?php

include_once ('dbPrj.php');

(new dbPrj())->insertColumnIntoProduct();

header("Location: index.php");
