<?php
function basic_theme_setup() {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'basic-theme'),
	));
	add_theme_support('custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
	));
}
add_action('after_setup_theme', 'basic_theme_setup');

function basic_theme_scripts() {
	wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
	wp_enqueue_style('basic-theme-style', get_stylesheet_uri());
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'basic_theme_scripts');

function basic_theme_widgets_init() {
	register_sidebar(array(
		'name'          => __('Sidebar', 'basic-theme'),
		'id'            => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'basic_theme_widgets_init');
