<?php 
session_start();
if(isset($_SESSION['email'])){
    include 'header/header.php';
    include 'connect.php';
}else{
    header('location:'.'/opt/lampp/htdocs/mini/error.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
    <title>Sign-in</title>
    <style>
        <?php
        include 'css/style.css';
        include 'css/new.css';
        ?>
        
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="outer">
        <div class="inner">
            <div class="picture">
                <h1>Mate Space</h1>
                <h2 style="color: black;">Create your post</h2>
            </div>
            <div class="user-box" style="height:auto;">
                <h2 style="color: blue;"><center>Create Post</center></h2>

                <!-- form starts here -->
                <!-- form action to the gallery.php -->
                <!-- include enctype to multipart/form-data -->
                <form class="form-element" action="includefiles/gallery.php" method="POST" enctype="multipart/form-data">
                <br>
                    <br>
                    <center>
                    <label for="post">
                        <i class="fa fa-camera"></i>
                    </label>
                    </center>
                   <input id="post" type="file" name="file" >
                   <hr>
                   <br>
                   <input name="filename" type="text" placeholder="filename">
                   <input type="text" name="place" placeholder="Place">
                   <textarea class="text-area" name="description" placeholder="About"></textarea>
                   <input class="submit" name="submit" type="submit" value="post">
                   <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

