<?php

add_filter('login_headerurl', function ()
{
    return WP_HOME;
});

add_filter('login_headertitle', function ()
{
    return get_bloginfo('name');
});

add_action('login_enqueue_scripts', function ()
{
    wp_enqueue_style('login-styles', assets('css/login.css'));
});