<?php

/**
 * dw-wallpress child functions and definitions
 *
 * @package dw-wallpress child
 */

/**
 * Activates default theme features
 *
 * @since 1.0
 */



 include_once plugin_dir_path( __FILE__ ) . "lib/wallpress-child-custom-taxonomies.php";
 // include_once plugin_dir_path( __FILE__ ) . "lib/wallpress-child-custom-widget-taxonomies.php";
 include_once plugin_dir_path( __FILE__ ) . "lib/wallpress-child-custom-widgets.php";










 /**
 * Function for adding a new RCP Template (mails).
 *
 * SINCE v0.1
 */

 function ag_rcp_email_templates( $templates ) {
     $templates['books4languages'] = __( 'Books4Languages Template' );

     return $templates;
 }

 add_filter( 'rcp_email_templates', 'ag_rcp_email_templates' );
 /** End of modified code */


 /**
 * Function for remove meta boxes
 *
 * SINCE v0.1
 * http://justintadlock.com/archives/2011/04/13/uncluttering-the-post-editing-screen-in-wordpress
 * https://codex.wordpress.org/Function_Reference/remove_meta_box
 * https://wordpress.stackexchange.com/questions/120206/hide-meta-boxes-for-non-admins
 *
 */

 if( ! current_user_can('activate_plugins') ) {
     add_action('add_meta_boxes', 'remove_my_post_metaboxes', 1000);

     add_filter( 'the_seo_framework_post_type_disabled', '__return_true' );

     function remove_my_post_metaboxes() {
         remove_meta_box('postexcerpt', 'post', 'normal');
         remove_meta_box('slugdiv', 'post', 'normal');
         remove_meta_box('postcustom', 'post', 'normal');
         remove_meta_box('rcp_meta_box', 'post', 'normal');
         // remove_meta_box('rocket_post_exclude', 'post', 'normal');
     }

 }






// https://www.wpbeginner.com/wp-tutorials/how-to-remove-wordpress-dashboard-widgets/
 function remove_dashboard_widgets() {
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    // unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_activity']);

}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );







// REDIRECTION IF USER IS LOGGED IN IN REGISTER PAGE

add_action('wp', 'add_login_check');
function add_login_check()
{
    // if ( is_user_logged_in() && is_page( [37, 11] ) ) {
    if ( current_user_can('creator') && is_page( [37] ) ) {
        wp_redirect('https://worksheet.books4languages.com/content/');
        exit;
    }
}
