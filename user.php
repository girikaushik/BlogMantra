<div id="friends" >
<?php 
        $image = "";
        if(file_exists($friends_row['profile_image']))
        {
            $image = $friends_row['profile_image'];
        }
        else
        {
            if($friends_row['gender']=="male") 
            {
                $image="./assets/user_male.jpg";
            } 
            else if($friends_row['gender']=="female") 
            {
                $image="./assets/user_female.jpg";
            }
        } 
?>
    <a href="profile.php?id=<?php echo $friends_row['userid'] ?>" style="text-decoration:none;">
        <img id="friends_img" src="<?php echo $image; ?>">
        <br>
        <?php  echo $friends_row['fname']." ".$friends_row['lname'];  ?>
    </a>
</div>
