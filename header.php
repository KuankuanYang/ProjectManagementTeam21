<!doctype html>
<html lang="en-US">
        <head>
                <!-- META TAGS -->
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>KarlskronaBBS</title>

                <link rel="shortcut icon" href="images/favicon.png" />


                

                <!-- Style Sheet-->
                <link rel="stylesheet" href="style.css"/>
                <link rel='stylesheet' id='bootstrap-css-css'  href='css/bootstrap5152.css?ver=1.0' type='text/css' media='all' />
                <link rel='stylesheet' id='responsive-css-css'  href='css/responsive5152.css?ver=1.0' type='text/css' media='all' />
                <link rel='stylesheet' id='pretty-photo-css-css'  href='js/prettyphoto/prettyPhotoaeb9.css?ver=3.1.4' type='text/css' media='all' />
                <link rel='stylesheet' id='main-css-css'  href='css/main5152.css?ver=1.0' type='text/css' media='all' />
                <link rel='stylesheet' id='custom-css-css'  href='css/custom5152.html?ver=1.0' type='text/css' media='all' />


                <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
                <script src="js/html5.js"></script></script>
                <![endif]-->

        </head>

        <body>

                <!-- Start of Header -->
                <div class="header-wrapper">
                        <header>
                                <div class="container">


                                        <div class="logo-container">
                                                <!-- Website Logo -->
                                                <a href="index.php">
                                                        <img src="images/ka.png">
                                                </a>
                                        </div>


                                        <!-- Start of Main Navigation -->
                                        <nav class="main-nav">
                                                <div class="menu-top-menu-container">
                                                    <ul id="menu-top-menu" class="clearfix">
                                                        <li>
														<a href="index.php">Home</a>
														</li>	
                                                        <?php if (isset($_SESSION["log"]) != 1){ ?>
														<li>
														<a href="logIn.php">Log In</a>
														</li>
														<li>
														<a href="signUp.php">Sign Up</a>
														</li>	
                                                        <?php } else { ?>
														<li>
														<a href="user.php?id=<?php echo $uid;?>">
                                                        <?php echo $name;?></a>
														</li>
                                                        <?php if ($admin==1){ ?>
														<li>
														<a href="admin.php">Administrate</a>
														</li>
                                                        <?php } ?>
														<li>
														<a href="inc/logout.php">Log Out</a>
														</li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>
                                        </nav>
                                        <!-- End of Main Navigation -->

                                </div>
                        </header>
                </div>
                <!-- End of Header -->

