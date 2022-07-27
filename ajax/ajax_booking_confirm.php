<?php
include_once '../models/database.php';
$data = array(
    "price" => $_POST['price'],
    "discount" => $_POST['discount'],
    "vat" => $_POST['vat'],
    "roomid" => $_POST['roomid'],
    "userid" => $_POST['userid'],
    "startdate" =>$_POST['checkin'],
    "enddate" => $_POST['checkout'],
    "couponid" => $_POST['couponid'],
    "paymentid" => $_POST['paymentid']
);
$d = new Database();
if ($d->insert("roombooking", $data)) {
    echo 'Your Booking is Confirmed.';
} else {
    echo "Please select required field";
}