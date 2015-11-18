<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Movie_store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
        <!-- start plugins -->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: true,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <!-- start plugins -->
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <div class="container">
            <div class="container_wrap">
                <div class="header_top">
                    <div class="col-sm-3 logo"><a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt=""/></a></div>
                    <div class="col-sm-6 nav">
                        <ul>
                            <li> <span class="simptip-position-bottom simptip-movable" data-tooltip="comic"><a href="movie.html"> </a></span></li>
                            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="movie"><a href="movie.html"> </a> </span></li>
                            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="video"><a href="movie.html"> </a></span></li>
                            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="game"><a href="movie.html"> </a></span></li>
                            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="tv"><a href="movie.html"> </a></span></li>
                            <li><span class="simptip-position-bottom simptip-movable" data-tooltip="more"><a href="movie.html"> </a></span></li>
                        </ul>
                    </div>
                    <div class="col-sm-3 header_right">
                        <?php
                        if ($this->session->username) {
                            ?>
                            <ul class="header_right_box">
                                <li><div class="profile_wrapper"><img src="<?php echo base_url() . $member_info['pic']; ?>" alt="<?php echo $member_info['full_name']; ?>"/></div></li>
                                <?php
                                if ($this->session->rights == 1):
                                    echo '<li><p><span class="simptip-position-bottom simptip-movable" data-tooltip="' . $member_info['full_name'] . '"><a href="'. base_url() .'Moderator_dashboard">'.$member_info['username'].'</a></span></p></li>';
                                elseif ($this->session->rights == 2):
                                    echo '<li><p><span class="simptip-position-bottom simptip-movable" data-tooltip="' . $member_info['full_name'] . '"><a href="'. base_url() .'ad">' . $member_info['username'] . '</a></span></p></li>';
                                    
                                else:
                                    echo '<li><p><span class="simptip-position-bottom simptip-movable" data-tooltip="' . $member_info['full_name'] . '"><a href="'. base_url() .'Dashboard">' . $member_info['username'] . '</a></span></p></li>';
                                    
                                endif;
                                ?>
                                <li class="last"><i class="edit"> </i></li>
                                <div class="clearfix"> </div>
                            </ul>
                            <?php
                        } else {
                            echo anchor('Users/registration', 'Create an Account', array('title' => 'Create an Account', 'class' => 'acount-btn'));
                            echo " ";
                            echo anchor('Users/login', ' Login', array('title' => 'Login', 'class' => 'acount-btn'));
                        }
                        ?>
                    </div>
                    <div class="clearfix"> </div>
                </div>