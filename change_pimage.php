<?php
session_start();

include ("classes/connect.php");
include ("classes/login.php");
include ("classes/user.php");
include ("classes/post.php");
include ("classes/image.php");



$login = new login();
$user_data = $login->check_login($_SESSION['blog_userid']);



if($_SERVER['REQUEST_METHOD'] == "POST")
{
    if($_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == "image/jpg")
    {

        $allowed_size = (1024 * 1024) * 3;

        if($_FILES['file']['size'] < $allowed_size)
        {

        
            if(isset($_FILES['file']['name']) && $_FILES['file']['tmp_name'] != "")
            {

                $filename = "uploads/".  $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'],$filename);
              
                

                //check for mode
                if(isset($_GET['change']))
                {
                    $change = $_GET['change'];

                } 
                $image = new image();
                
            

                if($change == "cover")
                {
                    $image->crop_image($filename,$filename,1366,488);
                }

                else
                {
                    $image->crop_image($filename,$filename,800,800); 
                }

              
               
               

                if(file_exists($filename))
                { 
                    $userid = $user_data['userid'];


                    if($change == "profile")
                    {
                        $query ="update users set profile_image = '$filename' where userid = '$userid' limit 1";
                    }



                    else if($change == "cover")
                    {
                        $query ="update users set cover_image = '$filename' where userid = '$userid' limit 1";
                    }


                    $db = new database();
                    $db -> save($query);

                    header("Location:profile.php");
                    die;
                }
            }
            else
            {
                    echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey'>";
                    echo "ADD A VALID IMAGE";
                    echo "</div>";
            }
        }
        else
        {
            echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey'>";
            echo "FILE SIZE EXCEEDS 3 MB LIMIT ";
            echo "</div>";
        }
    }
    else
    {
        echo "<div style ='text-align:center;font-size:12px;color:white;background-color:grey'>";
        echo "NOT A VALID FORMAT";
        echo "</div>";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Profile Image | Blog-Mantra</title>
    <link rel="stylesheet" href="./style/timeline.css">
</head>
    
<body style="font-family: Tahoma, Geneva, Verdana, sans-serif; background-color: #222831;">
    
    <!-- top bar -->
   
    <?php include("common/header.php");?>

    <!-- cover page -->

    <div id="cover_area" >

       


         <!-- content page  -->
        <div style="display: flex;">

          
            <!-- posts -->
               
            <div style="min-height: 400px; flex: 2.5;padding: 20px; padding-right: 0px;">
                <div style="background-color: white; border: solid 1px #aaa; padding: 10px;">
                   
                    <form method="post" enctype="multipart/form-data">
                        <input type="file" name="file">

                        <input id="post_button" value="CHANGE" type="submit" style="width:130px">
                        <br>
                    </form>
                </div>       
            </div>
        </div>
    </div>

</body>
</html>
