<?php
    add_action('wp_enqueue_scripts', 'flowersandtoys_scripts');

    
    function flowersandtoys_scripts(){
        
        wp_enqueue_style('flowersandtoys-style', get_stylesheet_uri());
        wp_enqueue_script('flowersandtoys-scripts', get_template_directory_uri() . '/assets/js/main.min.js',
        array(),null, true);
    };

    add_theme_support('custom-logo');
	add_theme_support('post-thumbnails');
	
?>
