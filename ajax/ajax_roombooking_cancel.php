<?php
include_once '../models/database.php';
$d = new Database();
$id = $_POST['id'];
if ($d->delete("roombooking", $id)) {
    echo 'Cancel Booking';
} else {
    echo "$d->ERROR";
}


