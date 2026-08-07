
<div id="post" style="background-color: white";>
    <div> 
        <?php 
        $image = "";
        if(isset($user_data))
        {
            $image = $user_data['profile_image'];
        }
        else
        {    if($row_user['gender']=="male") 
            {
                $image="./assets/user_male.jpg";
            } 
            else if($row_user['gender']=="female") 
            {
                $image="./assets/user_female.jpg";
            } 
        }
?>
        <img src="<?php echo $image; ?>" style="width: 70px; margin-right: 8px;">
        </div>
            <div style="width:100%">
                <div style="font-weight: bold; color: #405d9b;">
                    <?php echo $row_user['fname']." ".$row_user['lname']; ?> 
                </div>
                <?php echo $row['post'] ?> 
                <br><br>

                <?php
                    if(file_exists($row['image']))
                    {
                        $post_image = $row['image'];
                        echo "<img src='$post_image' style='width:80%' />";
                    }

                ?>
                <br><br>
                <a href="">Like</a> . <a href="">Comment</a> . <span style="color: #aaa;"><?php $date= new DateTime($row['date']) ; echo $date->format('d-m-Y');?> </span>
                    
                <span style="float:right;">
                    <a href="">Edit</a> . 
                    <a href="delete.php?postid=<?php echo $row['postid'];?>">Delete</a>
                </span>
            
            </div>
        </div>
    
       