<?php 
session_start();
include '../connect.php';
if(isset($_POST['submit'])){

    // get the filename of the file using the post
    $newFilename = $_POST['filename'];
    if(empty($_POST['filename'])){
        $newFilename = 'gallery'; 
    } else {
        $newFilename = strtolower(str_replace(' ','_',$newFilename));
    }
    $file = $_FILES['file'];
    $description = $_POST['description'];
    $place = $_POST['place'];
    $email = $_SESSION['email'];
    $likes = 0;

    $filename = $file['name'];
    $fileType = $file['type'];
    $filesize = $file['size'];
    $fileError = $file['error'];
    $filetempname = $file['tmp_name'];

    $type = explode('.',$filename);
    $actualType = strtolower(end($type));


    $allowed = ["jpeg","png","jpg"];

    if(in_array($actualType,$allowed)){
        if($fileError === 0){
            $imagefullname = $newFilename.".".uniqid("",true). "." .$actualType;
            $fileDestination = "/opt/lampp/htdocs/mini/posts/".$imagefullname;

            $sql = "INSERT INTO post SET
            filename = '$imagefullname',
            description = '$description',
            place = '$place',
            email = '$email',
            Likes = $likes
            ";

            $res = mysqli_query($conn,$sql);
            if(isset($res)){
                header('location:'.'../post.php');
                echo "success";
            }
            move_uploaded_file($filetempname,$fileDestination);
        }else{
            //error
            exit();
        }
    }else{
        //error
        exit();
    }

}
?>