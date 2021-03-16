<?php

include_once ('dbPrj.php');

(new dbPrj())->insertColumnIntoReviews();

header("Location: index.php");
