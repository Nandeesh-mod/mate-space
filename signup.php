<?php 
session_start();
include('connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.1">
    <title>Sign-up</title>
    <link rel="stylesheet" href="css/signup.css">
    <!-- to add the image logo -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        <?php
        include('css/new.css');
        ?>
    </style>
</head>
<body>
    <div class="outer">
        <div class="inner">
            <div class="picture">
                <h1>Mate Space</h1>
                <h2 style="color: black;">Connect with your friends</h2>
            </div>
            <div class="user">
                <h2><center class="sign-up">Sign-up</center></h2>
                <form class="form-element" method="POST" enctype="multipart/form-data">
                    
                    <input  id="name" type="text" name="name" placeholder="User Name" required>
                    <input  id="email" type="email" name="email" placeholder="E-mail" required>
                    <input id="age" type="number" name="age" placeholder="Age" required>
                    <input  id="password" type="password" name="password" placeholder="password" required>
                    <input  id="confirmpassword" type="password" name="conpassword" placeholder="confirm password" required>  
                    <!-- display post -->
                    <br>
                    <center>
                    <label for="post">
                        <i class="fa fa-camera"></i>
                    </label>
                    </center>
                   <input id="post" type="file" name="DpProfile" >
                   <!-- display post end -->
                    <!-- name of the file -->
                   <input  id="name" type="text" name="dpname" placeholder="File Name" required>
                    <hr>
                    <center><span><label id="accept" for="confirm">I Accept the privacy policy</label>
                        <input name="check" value="true" type="checkbox"></span></center>
                   <center><input name="submit" id="sign-up" type="submit" value="sign-up"></center>
                </form>
               <h5 style="color: red;"><center> <?php
            //    used for the error detection and directs to the page it require
                if(isset($_SESSION['pass'])){
                    echo $_SESSION['pass'];
                    session_unset();
                    die();
                }
                if(isset($_SESSION['sql'])){
                    echo $_SESSION['sql'];
                    session_unset();
                }
                if(isset($_SESSION['privacy'])){
                    echo $_SESSION['privacy'];
                    session_unset();
                }
                if(isset($_SESSION['error'])){
                    echo $_SESSION['error'];
                    session_unset();
                }
                
                ?></center></h5>
                <h5 style="color:blue; margin-left: 3px;"><a href="signin.php">Sign-in</a></h5>
            </div>
        </div>
    </div>


<!-- php section controller -->
    <?php 
// name , email,age , password, check , submit
if(isset($_POST['submit'])){
    // to check for the sql injection characters
    $username = htmlspecialchars($_POST['name']);
    // if(preg_match('/?\<>/i',$username)){
    //     $_SESSION['error'] = "Invalid username";
    //     header('location:'.'http://localhost/mini/signup.php');
    //     die();
    // }
    $email = $_POST['email'];
    // to check for existing email
    $mysql = "SELECT * FROM `user_data` WHERE email='$email'";
    $mail_result = mysqli_query($conn,$mysql);
    if(mysqli_num_rows($mail_result) > 0){
        $getmail = mysqli_fetch_assoc($mail_result);
        if(strcmp($getmail['email'],$email)==0){
            $_SESSION['error'] = "email already exist";
            header('location:'.'http://localhost/mini/signup.php');
            die();
        }
    }
    $age = $_POST['age'];
    $password = md5($_POST['password']);
    $check = $_POST['check'];
    $conpassword = $_POST['conpassword'];
    if(!isset($check)){
        $_SESSION['privacy']="Accept the terms";
        header('location:'.'http://localhost/mini/signup.php');
        die();
    }


    if(strcmp($_POST['password'],$_POST['conpassword'])){
        $_SESSION['pass'] = "Password does'nt match";
        header('location:'.'http://localhost/mini/signup.php');
        die();
    }
    $filename = $_POST['dpname'];
    // $newFilename = strtolower(str_replace(' ','_',$newFilename));
    $dpname = strtolower(str_replace(' ','_',$filename));
    $file = $_FILES['DpProfile'];

    $imagename = $file['name'];
    $imagetype = $file['type'];
    $imageErroe = $file['error'];
    $filetmpname = $file['tmp_name'];

    $type = explode('.',$imagename);
    $acceptedfiles = ['jpg','png','jpeg'];
    $actualtype = strtolower(end($type));
    if(in_array($actualtype,$acceptedfiles)){
        // $imagefullname = $newFilename.".".uniqid("",true). "." .$actualType;
        // $fileDestination = "/opt/lampp/htdocs/mini/posts/".$imagefullname;
        $uniquefilename = $dpname . ".".uniqid("",true) . "." . $actualtype;
        $fileDestination = "/opt/lampp/htdocs/mini/dp/".$uniquefilename;
    }




    $sql = "INSERT INTO user_data SET
    username = '$username',
    email = '$email',
    age = '$age',
    password = '$password',
    dpname = '$uniquefilename'
    ";

    $res = mysqli_query($conn,$sql);
    if(isset($res)){
        move_uploaded_file($filetmpname,$fileDestination);
        $_SESSION['sql'] = "Success";
        header('location:'.'http://localhost/mini/signup.php');
    }else{
        $_SESSION['sql'] = "failed";
        header('location:'.'http://localhost/mini/signup.php');
    }
}
?>
</body>
</html>