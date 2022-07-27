<?php
session_start();
if(isset($_GET['halfbonus'])){
       
       $_SESSION['one'] = 50;
         echo 50;
         
         
   
}


if(isset($_GET['fullbonus'])){
       
       $_SESSION['one'] = 100;
         echo 100;
         
         
   
}


if(isset($_GET['bonusremove'])){
       unset($_SESSION['one']);
       echo 1;
       
       
}


