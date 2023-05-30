<?php header("Content-type: text/css; charset: UTF-8"); ?>
<?php
include '../connect.php';
session_start() ?>
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

*
{
    margin: 0px;
    padding: 0px;
}
.whole
{
    
    display: flex;
    flex-direction: column;
    background-color: rgb(192, 190, 187);
    align-items: center;
}
.card 
{
    width: 100%;
    background-color: white;
    margin-bottom: 2px;
}
.profile-info
{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}
.profile-img
{
    width: 55px;
    height: 55px;
    border: 2px solid black;
    border-radius: 100%;
    background-image: url("../dp/<?php echo $imgurl ?>");
    background-position: center;
    background-size: cover;     
    margin: 0px 3px 0px 5px;
    
}
.info
{
    text-align : center;
    padding-right:40px;
    width: 230px;
    height: 40px;
}
.follow
{
    width: 80px;
    height: 40px;
    margin: 10px 20px 10px 20px;
}

.post
{
    width: 100%;
}

.footer
{
    width: 100%;
    margin: 4px 9px 4px 9px;
}

.likes
{
    width: 20px;
    font-family: monospace;
    font-weight: bold;
}
.comment
{
    width:100%;
    margin-right:30px;
    font-family: fantasy;
    color: rgb(34, 106, 239);
}
button
{
    width: 70px;
    height: 30px;
    background-color: white;
    border: 1px solid blue;
    border-radius: 3px;
    margin-bottom: 100px;
}
.post-img
{
    width: 100%;
}

button:active   
{
    background-color: blue;
    color: white;
}
.name
{
    font-weight: bold;
    font-size: large;
    font-family: monospace;
    color: rgb(21, 86, 160);
}
.place
{
    font-family: monospace;
    color: rgb(9, 149, 196);
}


@media all and (min-width:940px)
{
    .whole
    {
        width: 100%;
        display: flex;
        flex-direction: column;
        background-color: rgb(192, 190, 187);
        align-items: center;
    }
    .card
{
    width: 50%;
    background-color: white;
    margin-bottom: 2px;
}

.profile-info
{
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding: 20px 10px 20px 10px;
}

.name
{
    font-weight: bold;
    font-size: 20px;
    font-family: monospace;
    color: rgb(21, 86, 160);
}
.place
{
    font-size: 15px;
    font-family: monospace;
    color: rgb(9, 149, 196);
}
.profile-img
{
    width: 68px;
    height: 68px;
    border: 2px solid black;
    border-radius: 100%;
    background-image: url("../dp/<?php echo $imgurl ?>");
    background-position: center;
    background-size: cover;
    margin: 0px 3px 0px 5px;
    
}

button
{
    width: 90px;
    height: 40px;
    background-color: white;
    border: 1px solid blue;
    border-radius: 3px;
    margin-bottom: 100px;
    
}

.follow
{
    width: 80px;
    height: 40px;
    margin: 10px 50px 10px 20px;
}


.footer
{
    width: 100%;
    margin: 4px 14px 4px 14px;
}

.likes
{
    font-size: 15px;
    width: 100%;
    font-family: monospace;
    font-weight: bold;
}
.comment
{
    width:100%;
    margin-right:10px;
    font-size: 17px;
    font-family: fantasy;
    color: rgb(34, 106, 239);
}

}