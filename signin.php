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
    <title>Sign-in</title>
    <style>
        <?php
        include 'css/style.css';
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
            <div class="user-box">
                <h2 style="color: blue;"><center>Sign-in</center></h2>
                <form class="form-element" method="POST">
                    <input  id="email" type="email" name="email" placeholder="E-mail" required>
                    <input  id="password" type="password" name="password" placeholder="password" required>  
                    <input class="submit" type="submit" name="submit" value="SignIn">
                   <center><a class="password-but" href="password.html">forgot password</a> </center>
                   <hr>
                    <center>
                        <h5 style="color: red;"> <?php 
                    if(isset($_SESSION['auth'])){
                        echo $_SESSION['auth'];
                        session_destroy();
                    }
                    ?></h5>
                    </center>
                   <br>
                   <br>
                </form>
                <form method="POST" >
                         <center><input name="signup" id="sign-up" type="submit" value="sign-up"></center>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
    if(isset($_POST['signup'])){
        $location = "http://localhost/mini/signup.php";
        header('location:'.$location);
    }
?>
<!-- php code goes here -->
<?php
// get the email and password
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // create the sql statement
    $sql = "SELECT * FROM `user_data` WHERE email='$email'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $userdata = mysqli_fetch_assoc($result);
        $authpassword = $userdata['password'];
        $name = $userdata['username'];
        echo $name;
        echo $authpassword;
        echo "   ";
        echo $password;
        // after sign in main page build in new folder
        if(strcmp($password,$authpassword)==0){
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['username'] = $name;
            header('location:'.'http://localhost/mini/recentpost.php');
        }else{
            $_SESSION['auth'] = "Invalid password";
            header('location:'.'http://localhost/mini/signin.php');
        }
    }else{
        $_SESSION['auth'] = "User doesnot exist";
        header('location:'.'http://localhost/mini/signin.php');

    }
}


?>