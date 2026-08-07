<?php

class post
{
    private $error = "";
    public function create_post( $userid , $data ,$files )
    {
        if (!empty($data['post']) || !empty($files['file']['name']))
        {

            $myimage = "";
            $has_image = 0;
            $is_profile = 0;
            $is_cover = 0;


           
                if (!empty($files['file']['name']))
                {
                    
                    $folder = "uploads/" . $userid."/";

                    // create folder
                    if(!file_exists($folder))
                    {
                        mkdir($folder,0777,true); // true means create upload folder if not found
                    }
                    
                    $image_class = new image();
                    
                    
                    $myimage = $folder .  $image_class->change_file_name(25).".jpg";
                    move_uploaded_file($_FILES['file']['tmp_name'], $myimage);
                
                    $image_class->crop_image( $myimage, $myimage,1500,1500);

                    $has_image = 1;
                }
            

            $post = "";

            if(isset($data['post']))
            {
                $post = addslashes($data['post']);
            }
            $postid = $this->create_postid();
        
            $query = "insert into posts (post,postid,userid,image,has_image) values ('$post','$postid','$userid','$myimage','$has_image')";
            $DB = new database();
            $DB->save($query);
            
        }
        else
        {
            $this->error = "POST CAN'T BE EMPTY";

        }
        return $this->error;
    }
    private function create_postid()
    {
       $length = rand (4,19);
       $number = "";
       for ($i = 0; $i < $length; $i++ )
       {
           $new_rand = rand(0,9);
           $number = $number . $new_rand;
       }

       return $number;
    }
    public function get_post( $id  )
    {
        $query = "select * from posts where userid = '$id' order by id desc limit 10";
        $DB = new database();
        $result = $DB->read($query);
        
        if($result)
        {
            return $result;
        }
        else
        {
            return false;
        }
    }
}

?>