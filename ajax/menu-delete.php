<?php

session_start();
if (isset($_GET['did'])) {
    $id = $_GET['did'];
    if (count($_SESSION['menuid']) > 1) {

        $index = array_search($id, $_SESSION['menuid']);
        unset($_SESSION['menuid'][$index]);
        unset($_SESSION['qty'][$index]);
        unset($_SESSION['title'][$index]);
        unset($_SESSION['price'][$index]);
        unset($_SESSION['picture'][$index]);

        $total = 0;
        if ($_SESSION['price']) {
            foreach ($_SESSION['price'] as $key => $price) {
                $total += ($_SESSION['qty'][$key] * $_SESSION['price'][$key]);
            }
        }

        $arr = array(
            "total" => $total
        );
    } else {

        unset($_SESSION['menuid']);
        unset($_SESSION['qty']);
        unset($_SESSION['title']);
        unset($_SESSION['price']);
        unset($_SESSION['picture']);

        $arr = array(
            "total" => 0
        );
    }
}

header('Content-Type: application/json');
echo json_encode($arr);



