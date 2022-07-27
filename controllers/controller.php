<?php

if (isset($_GET['f'])) {
    if (file_exists("views/front/{$_GET['f']}.php")) {
        require "views/front/{$_GET['f']}.php";
    } else {
        require "views/front/404.php";
    }
}
else if (isset($_GET['e']) && isset($_SESSION['type']) && ($_SESSION['type']==2 || $_SESSION['type'] == 3)) {
    if (file_exists("views/employee/{$_GET['e']}.php")) {
        require("views/employee/{$_GET['e']}.php");
    } else {
        require("views/front/404.php");
    }
}
else if (isset($_GET['a']) && isset($_SESSION['type']) && ($_SESSION['type'] == 3)) {
    if (file_exists("views/admin/{$_GET['a']}.php")) {
        require("views/admin/{$_GET['a']}.php");
    } else {
        require("views/front/404.php");
    }
}
else {
    require "views/front/home.php";
}