<?php

function extension($data) {
    if ($data) {
        $ext = pathinfo($data);
        $ext = stripslashes(strtolower($ext['extension']));
        if ($ext != "jpg" && $ext != "jpeg" && $ext != "png" && $ext != "gif") {
            return "";
        } else {
            return $ext;
        }
    } else {
        return "";
    }
}
function RandStr($length){
    $arr = array_merge(range("A", "Z"), range("a", "z"), range(0, 9));
    $str = "";
    while ($length > 0){
        $str .= $arr[rand(0, count($arr)-1)];
        $length--;
    }
    return $str;
}


function Redirect($url){
    echo "<script>self.location='$url';</script>";
}


function new_file($name, $data) {
    $fh = fopen($name, "w");
    fwrite($fh, $data);
    fclose($fh);
}

function read_file($name){
    $fh = fopen($name, "r");
    $data = fread($fh, filesize($name));
    fclose($fh); 
    
    return $data;
}