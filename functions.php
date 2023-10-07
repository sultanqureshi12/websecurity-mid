<?php

// function register_bootstrap(){
// 	wp_enqueue_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css',false,'1.1','all');
// 	wp_enqueue_style('bootstrap-script','https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js',false,'1.1','all');
// }
// add_action('wp_enqueue_scripts', 'register_bootstrap');

//  function register_jquery(){     
//  	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', 'true'); } 
// add_action('wp_enqueue_scripts', 'register_jquery');

// function register_stylesheet(){     
// 	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.2', 'all');
// }
// add_action('wp_enqueue_scripts','register_stylesheet');


function register_bootstrap() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css', array(), '5.3.1', 'all');
    wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.1', true);
}
add_action('wp_enqueue_scripts', 'register_bootstrap');

function register_jquery() {
    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js', array(), '3.7.0', true);
     wp_enqueue_script('formscript',  get_template_directory_uri() . '/js/form.js', array(), '3.7.0', true);
}
add_action('wp_enqueue_scripts', 'register_jquery');

function register_stylesheet() {
	 wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), '1.2', 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/main.css', array(), '1.2', 'all');
}
add_action('wp_enqueue_scripts', 'register_stylesheet');

//theme options

add_theme_support('menus');

//menus

register_nav_menus(
           array(

           'top-menu'=> 'Top Menu Location',
           'mobile-menu'=> 'Mobile Menu Location',
           'footer-menu'=> 'Footer Menu Location',

           )

);

add_action('wp_ajax_send_message_form', 'handle_message_form');
add_action('wp_ajax_nopriv_send_message_form', 'handle_message_form');

function handle_message_form(){

    if(
    ! isset($_POST['smf-nonce'])||
    !wp_verify_nonce($_POST['smf-nonce'],'send_message_form')
    ){
        wp_send_json_error([
         'message' => 'something fishy going on'
        ]);
    }

    $data =[];

    $data['username']=sanitize_user($_POST['username']);

    $data['email']= sanitize_user($POST['email']);

    $data['message']= sanitize_user($POST['message']);

    wp_send_json_success([$_POST, $data]);
}

function mytheme_enqueue_scripts() {

    // Pass variables to script.js
    wp_localize_script('my-theme-script', 'ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('send_message_form_nonce')
    ));
}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_scripts');


