<?php
/*
Plugin Name: WordPress Ionic Login Authorisation
Plugin URI: https://github.com/RogerShenAU/wp-ionic-login-auth
Description: Integrate with ionic login(https://github.com/RogerShenAU/ionic-login) starter app, provide server-side auth to ionic app.
Version: 1.0.0
Author: Roger
Author URI: https://github.com/RogerShenAU
Text Domain:
Domain Path: 
*/

register_deactivation_hook(__FILE__, 'wp_ionic_login_authorisation_plugin_activate'); 

function wp_ionic_login_authorisation_plugin_activate () {
	flush_rewrite_rules();
}

//1. define a path for later
define('WP_IONIC_LOGIN_AUTH_PLUG_PATH', WP_PLUGIN_DIR . '/' . basename(dirname(__FILE__)));

//2. add a wp query variable to redirect to
add_action('query_vars','wp_ionic_login_auth_plugin_set_query_var');
function wp_ionic_login_auth_plugin_set_query_var($vars) {
    array_push($vars, 'wp_ionic_login_auth'); // ref url redirected to in add rewrite rule

    return $vars;
}

//3. Create a redirect
add_action('init', 'wp_ionic_login_auth_plugin_plugin_add_rewrite_rule');
function wp_ionic_login_auth_plugin_plugin_add_rewrite_rule(){
    add_rewrite_rule('^wp-ionic-login-auth$','index.php?wp_ionic_login_auth=1','top');
}

//4.return the file we want...
add_filter('template_include', 'wp_ionic_login_auth_plugin_plugin_include_template');
function wp_ionic_login_auth_plugin_plugin_include_template($template){

    // see above 2 functions..
    if(get_query_var('wp_ionic_login_auth')){
        //path to your template file
        $new_template = WP_IONIC_LOGIN_AUTH_PLUG_PATH.'/login.php';
        if(file_exists($new_template)){
            $template = $new_template;
        } 
    }    
    return $template;    
}