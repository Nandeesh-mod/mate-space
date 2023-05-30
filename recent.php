<?php 
include 'connect.php';
?>
<?php 
$email = $_SESSION['email'];
$name = $_SESSION['username'];
$sql = "SELECT  * FROM post WHERE email = '$email' ";
$result = mysqli_query($conn,$sql);
if(isset($result)){
    $content = mysqli_fetch_all($result,MYSQLI_ASSOC);
}
mysqli_close($conn);
?>


<link rel="stylesheet" href="css/gamble.php">
<body>
    <div class="whole">

        
        <?php foreach($content as $result){?>
            <div class="card">
            <div class="profile-info">
                <div class="profile-img"></div>
                <div class="info"> 
                    <p class="name"><?php echo $name; ?></p>
                    <p class="place"><?php echo $result['place']?></p>
                </div>
            </div>
    
            <div class="post">
               <img class="post-img" src="posts/<?php echo $result['filename']; ?>" alt="profile1">
            </div>
            
            <div class="footer">
                <div class="likes"><?php echo $result['Likes']?> Likes</div>
                <div class="comment"><h3><?php echo $result['description']; ?></h3></div>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>