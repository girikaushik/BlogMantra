<?php

include ("classes/connect.php");
include ("classes/login.php");
include ("classes/user.php");
include ("classes/post.php");
include ("classes/image.php");
include ("classes/profile.php");


if (isset($_GET['postid']))
{
    $pid=$_GET['postid'];
    $db = new database();
    $query = "delete from posts where postid='$pid'";
    $db->save($query);  
}
header ("Location:profile.php");
die;
?>