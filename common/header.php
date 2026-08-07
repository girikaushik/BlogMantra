
<!-- its a blue bar header -->
        <?php
                $image = "";
                if(file_exists($user_data['profile_image']))
                {
                    $image = $user_data['profile_image'];
                }
                else
                {
                    if($user_data['gender']=="male") 
                    {
                        $image="./assets/user_male.jpg";
                    } 
                    else if($user_data['gender']=="female") 
                    {
                        $image="./assets/user_female.jpg";
                    }  
                }
        ?>
<!-- <div id="blue_bar">
        <div style="width: 800px;margin:auto; font-size:30px;">
            <a href="index.php" style="text-decoration:none; color:white;">Blog-Mantra </a>
            
            
            &nbsp; &nbsp; 
            <input type="text" id="search_box" placeholder="Search for Writers">
            
            
            <img src="<?php echo $image; ?>" style="width: 50px;float: right; border-radius: 50px;">
            
            <a href ="logout.php">
                <span style="color:white; font-size:12px; float:right; margin:18px;">  Logout</span>
            </a>
        </div>
    </div> -->



      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <style>
          *{
            margin: 0;
            padding: 0;
            list-style: none;
            text-decoration: none;
            }
            #search_box
            {
            margin-left: 3%;
            margin-top: 23px;
            width: 37%;
            height: 30%;
            border-radius: 4px;
            border: none;
            padding: 4px;
            font-size: 13px;
            background-image: url(./assets/search.png);
            background-repeat: no-repeat;
            background-position: right;
            }
            nav .logo{
            color: white;
            font-size: 33px;
            font-weight: bold;
            line-height: 70px;
            padding-left: 110px;
            }
            nav{
            height: 70px;
            background: #3c5a99;
            box-shadow: 0 7px 15px rgba(0,0,0,.4);
            }
            nav ul{
            float: right;
            margin-right: 80px !important;
            }
            nav ul li{
            display: inline-block;
            border-radius: 5px;
            width:200px
            }
            #main
            {
                margin-top: 0.1%;
                background-color: rgb(197, 197, 197);
                border: 2px solid white;
                border-radius: 3%;
            }
            nav ul li a{    
            color: white;
            display: block;
            padding: 0 15px;
            line-height: 70px;
            font-size: 18px;
            font-family: sans-serif;
            font-weight: bold;
            background: #3c5a99;
            transition: .5s;
            }
            nav ul li a:hover,
            nav ul li a.active{
            background-color: white;
            color: #3c5a99;
            transition: .2s;
            }
            nav ul ul{
            position: absolute;
            top: 85px;
            border-top: 3px solid white;
            opacity: 0;
            visibility: hidden;
            }
            nav ul li:hover > ul{
            top: 65px;
            opacity: 1;
            visibility: visible;
            transition: .3s linear;
            }
            nav ul ul li{
            width: auto;
            display: list-item;
            position: relative;
            margin: 3px;
            border: 2px solid rgb(255, 255, 255);
            }
            nav ul ul li a{
            line-height: 35px;
            }
            nav ul ul ul{
            border-top: none;
            }
            nav ul ul ul li{
            position: relative;
            top: -70px;
            left: 150px;
            }
            nav ul ul li a i{
            margin-left: 45px;
            }
            section{
            background: url(bg.jpeg);
            background-position: center;
            background-size: cover;
            height: 100vh;
            }
      </style>

      <nav>
        <a href="index.php" style="text-decoration:none; color:white; font-size: 30px; margin-left: 17%; font-family: sans-serif;">Blog-Mantra </a>
        <input type="text" id="search_box" placeholder="   Search for Writers " style="font-family: sans-serif;">
         <ul>
            <li>
               <img src="<?php echo $image; ?>" alt="" style="width: 55px;float: right; border-radius: 50px;  margin-right: 100px; margin-top: 2%; margin-bottom: 2%;">
               <ul id="main">
                <li id="button"><a href="change_pimage.php?change=profile">Change Photo</a></li>
                <li id="button"><a href="change_pimage.php?change=cover">Change Cover </a></li>
                <li id="button"><a href="/BLOGMANTRA/common/home page.html">Home Page</a></li>
                <li id="button"><a href="logout.php">Logout</a></li>
                <li id="button"><a href="/BLOGMANTRA/common/contactus.html">Contact Us</a></li>
                <li id="button"><a href="/BLOGMANTRA/common/Aboutus.html">About us</a></li>
               </ul>
            </li>
         </ul>
      </nav>
