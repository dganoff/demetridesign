<!DOCTYPE html>
<html lang='en'> 

<head>
    
    <title><?php wp_title(''); ?></title>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />

    <link rel="icon" href="/favicon.png"/>

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/stylesheets/screen.css" type="text/css">
    
    <!-- fonts: -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Adamina&subset=latin" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="<?php bloginfo('template_url'); ?>/scripts/modernizr.min.js"></script>
    <![endif]-->
    
    <?php wp_head(); ?>
</head>

<body>

<header class="page-wrap">
    
    <a href="<?php echo home_url(); ?>" class="logo"></a>

    <nav class="main">
    	
        <?php wp_nav_menu(array( 
				//'menu' => 'main-menu', 
				'theme_location' => 'main-menu', // calls the menu selected as "Main Menu" in the admin panel
				'menu_class' => 'main', 
				'menu_id' => 'navigation', 
				'container' => false, 
				'link_before' => '<h5>', 
				'link_after' => '</h5><div></div>', 
				'show_home' => '1'
			));
        ?>
        
    </nav>
    
</header>