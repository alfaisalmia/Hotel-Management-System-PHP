<?php

session_start();
require '../models/database.php';
$d = new Database();
$id = $_GET['gundaaa'];
$qty = $_GET['qty'];

$data = $d->view('menu', '', ['id' => $id]);
if ($data->num_rows > 0) {
    $value = $data->fetch_object();
}

if (isset($_SESSION['menuid'])) {
    $index = array_search($id, $_SESSION['menuid']);
    if ($index !== false) {
        $_SESSION['qty'][$index] = $qty;

        $total = 0;
        if ($_SESSION['price']) {
            foreach ($_SESSION['price'] as $key => $price) {
                $total += ($_SESSION['qty'][$key] * $_SESSION['price'][$key]);
            }
        }

        $arr = array(
            "status" => 2,
            "stotal" => ($value->price * $qty),
            "total" => $total
        );
    } else {
        $_SESSION['menuid'][] = $id;
        $_SESSION['qty'][] = $qty;
        $_SESSION['title'][] = $value->title;
        $_SESSION['price'][] = $value->price;
        $_SESSION['picture'][] = $value->picture;

        $total = 0;

        if ($_SESSION['price']) {
            foreach ($_SESSION['price'] as $key => $price) {
                $total += ($_SESSION['qty'][$key] * $_SESSION['price'][$key]);
            }
        }

        $arr = array(
            "title" => $value->title,
            "price" => $value->price,
            "picture" => $value->picture,
            "status" => 1,
            "stotal" => ($value->price * $qty),
            "total" => $total
        );
        // echo count($_SESSION['mdid']);
    }
} else {
    $_SESSION['menuid'][] = $id;
    $_SESSION['qty'][] = $qty;
    $_SESSION['title'][] = $value->title;
    $_SESSION['price'][] = $value->price;
    $_SESSION['picture'][] = $value->picture;

    $arr = array(
        "title" => $value->title,
        "price" => $value->price,
        "picture" => $value->picture,
        "status" => 1,
        "stotal" => ($value->price * $qty),
        "total" => ($value->price * $qty)
    );
    //echo count($_SESSION['mdid']);
}

//$arr = array(
//    $_GET['id'],
//    $_GET['qty']
//);
header('Content-Type: application/json');
echo json_encode($arr);
