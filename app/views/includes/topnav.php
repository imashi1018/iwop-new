<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iWoP</title>

    <link rel="stylesheet" href="<?php echo URLROOT;?>/public/css/home/topnav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ribeye Marrow' rel='stylesheet'>

</head>
<body>

<div class="fade-in">
    <nav class = "navbar">
        <ul class="link-list">
            <div class='logo-container'>
                <a href="<?php echo URLROOT;?> /homes/landing" class="anchor-tag-logo">iWoP</a>
            </div>
            
            <!-- <li class="link"> 
                <a href="#" class="anchor-tag"> <i class="fa fa-bell" aria-hidden="true"></i> </a>
            </li> -->
            <li class="link"> 
                <a href="<?php echo URLROOT;?> /homes/home" class="anchor-tag"> Home </a>
            </li>
            <li class="link"> 
                <a href="<?php echo URLROOT;?> /homes/faq" class="anchor-tag"> FAQ </a>
            </li>
            <li class="link"> 
                <a href="#services" class="anchor-tag"> Services </a>
            </li>
            <li class="link"> 
                <a href="#about" class="anchor-tag"> About Us </a>
            </li>
            <li class="link"> 

            <!--------   if customer logged in  --------->
                <?php if(isset($_SESSION['cus_id'])) : ?>
                <a href="<?php echo URLROOT;?> /logins/logout" class="anchor-tag"  style="border: 1px solid #ffffff; padding: 8px 24px; border-radius:5px;"> Logout </a>
                


            <!-----  if worker logged in --------------->
                <?php elseif(isset($_SESSION['worker_id'])) : ?>
                <a href="<?php echo URLROOT;?> /logins/Workerlogout" class="anchor-tag"  style="border: 1px solid #ffffff; padding: 8px 24px; border-radius:5px;"> Logout </a>



            <!----- if company logged in ---------------->
                <?php elseif(isset($_SESSION['reg_no'])) : ?>
                <a href="<?php echo URLROOT;?> /logins/Companylogout" class="anchor-tag"  style="border: 1px solid #ffffff; padding: 8px 24px; border-radius:5px;"> Logout </a>


            <!----- if admin logged in ---------------->
                <?php elseif(isset($_SESSION['admin_id'])) : ?>
                    <a href="<?php echo URLROOT;?> /logins/Adminlogout" class="anchor-tag"  style="border: 1px solid #ffffff; padding: 8px 24px; border-radius:5px;"> Logout </a>


            <!----- if manager logged in ---------------->
                <?php elseif(isset($_SESSION['manager_id'])) : ?>
                    <a href="<?php echo URLROOT;?> /logins/Managerlogout" class="anchor-tag"  style="border: 1px solid #ffffff; padding: 8px 24px; border-radius:5px;"> Logout </a>
                
                <?php else : ?>
                    <a href="<?php echo URLROOT ;?> /logins/loginas" class="anchor-tag"  style="border: 1px solid #ffffff; padding: 8px 24px; border-radius:5px;"> Login </a>
                <?php endif; ?>
            </li>
        
            <!-- <li class="link"> 
                <a href="#" class="anchor-tag" style="font-size: 1.2em;"><i class="fa fa-user" aria-hidden="true"></i> </a>
                <div class="dropdown">
                    <button class="dropbtn" style="font-size: 1.2em;">
                    <a href="#" class="anchor-tag"><i class="fa fa-user" aria-hidden="true"></i> </a>
                    <i class="fa fa-caret-down"></i> 
                    </button>
                    <div class="dropdown-content">
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a>
                        <a href="#"><i class="fa fa-print" aria-hidden="true"></i> Post Ads</a>
                        <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                    </div> 
                </div>
            </li>  -->

            <!-- <li class="link">
            <a href="#" class='anchor-tag'>
                <img src="../../public/img/4140048.png" class='logo' alt='logo' />
            </a>
            </li>-->
        </ul>
    </nav>


