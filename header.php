<!DOCTYPE html>
<html lang='en'> 

<head> 
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/stylesheets/screen.css" type="text/css">
    
    <!-- fonts: -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lusitana:400,700' rel='stylesheet' type='text/css'>
    
    <!-- FlexSlider pieces -->
	<link href="<?php bloginfo('stylesheet_directory'); ?>/css/flexslider.css" rel="stylesheet" type="text/css" media="screen" />
    
    <?php wp_head(); ?>
</head>

<body>

<header class="page-wrap">
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