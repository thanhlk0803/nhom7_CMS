<!doctype html>
<html class="no-js" lang="<?php language_attributes(); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Header Section Start -->
        <header class="main-header">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="d-flex justify-end">
                                <div class="left mr-auto">
                                    <ul class="clearfix">
                                        <li>Phone: <a href="tel:+98698547258">+98 698 547 258</a></li>
                                        <li>Open hours: 9.00 -6.00 SAT-MON</li>
                                    </ul>
                                </div>
                                <div class="right l-height">
                                    <ul class="clearfix d-inblock">
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="registration.html">Regester</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <div id="active-sticky" class="navgation-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="d-flex justify-end">
                                <div class="logo mr-auto">
                                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="Cultura" /></a> -->
                                    <?php
                                    if(is_home()){
                                        printf('<h1><a style="font-size: 24px;color: #6d6d6d;" href="%1$s">%2$s</a></h1>',esc_url(home_url()),get_bloginfo('sitename'));
                                    }
                                    else{
                                        printf('<p><a style="font-size: 24px;color: #6d6d6d;" href="%1$s">%2$s</a></p>',esc_url(home_url()),get_bloginfo('sitename'));
                                    }
                                    ?>
                                </div>
                                <!-- Static navbar -->
                                <nav class="mainmenu">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div id="navbar" class="navbar-collapse collapse no-padding">
                                        <?php
                                        if(has_nav_menu( 'glw_primary_menu' )){
                                            wp_nav_menu( array(
                                                'theme_location'    => 'glw_primary_menu',
                                                'container'         => false,
                                                'fallback_cb'       => false,
                                                'depth'             => 5,
                                                'menu_class'        => 'navbar-nav dropdown',
                                              //  'walker'            => new GLW_Custom_Nav_Walker()
                                            ));
                                        }
                                        ?>
                                    </div>
                                    <!--/.nav-collapse -->
                                </nav>
                                <div class="search-toggle pull-right">
                                    <i class="zmdi zmdi-search"></i>
                                </div>
                                <div class="courses-searching">
                                    <div class="close-search"></div>
                                    <form action="#">
                                        <input type="text" name="search" placeholder="Courses Search..." />
                                        <button id="close" type="submit"><i class="zmdi zmdi-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
        </header>
        <!-- Header Section End -->