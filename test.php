<?php 
include 'connect.php';
session_start();
?>


<?php 
    $email = $_SESSION['email'];
    $sql = "SELECT dpname FROM user_data where email = '$email' ";
    $result = mysqli_query($conn,$sql);
    if(isset($result)){
        $myresult = mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
    $imgurl = $myresult[0]['dpname'];
    mysqli_free_result($result);
    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="dp/<?php echo $imgurl; ?>" alt="myimage" width="800px">   
</body>
</html>