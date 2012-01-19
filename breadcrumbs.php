<?php
    // Uses the plugin: Breadcrumb NavXT

    if(class_exists('bcn_breadcrumb_trail')) {
        //Make new breadcrumb object
        $breadcrumb_trail = new bcn_breadcrumb_trail;
        //Setup our options
        //Set the home_title to Blog
        $breadcrumb_trail->opt['home_title'] = "Blog";
        //Fill the breadcrumb trail
        $breadcrumb_trail->fill();
        //Display the trail
        $breadcrumb_trail->display();
    }
?>