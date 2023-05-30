<?php
session_start();
if(isset($_SESSION['email'])){
    include 'header/header.php'; 
    include 'recent.php';
}else{
    header('location:'.'/opt/lampp/htdocs/mini/error.php');
}
?>