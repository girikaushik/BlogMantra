<?php
class Profile
{
    public function get_profile($id)
    {
        $db = new database();
        $query = "select * from users where userid = '$id' limit 1";
        return $db->read($query);
    }
}


?>