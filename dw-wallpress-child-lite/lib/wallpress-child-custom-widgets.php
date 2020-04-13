<?php
/**
 * Custom widgets
 *
 * Description. (use period)
 *
 * @link URL
 *
 * @package wallpress-child
 * @subpackage wallpress-child/wallpress-child-custom-widgets
 * @since 0.1
 */

 /**
 * Register widget area
 *
 * @since 0.1
 *
 * @internal https://digwp.com/2010/02/how-to-widgetize-wordpress-theme/
 * @internal https://www.templatemonster.com/blog/add-widget-areas-to-wordpress-guide/
 * @internal https://premium.wpmudev.org/blog/how-to-widgetize-a-page-post-header-or-any-other-template-in-wordpress/?utm_expid=3606929-94.Ie3dH-CaRwe6MU3VrZsdvw.0&utm_referrer=https%3A%2F%2Fwww.google.es%2F
 *
 * @internal https://code.tutsplus.com/tutorials/dynamically-adding-four-footer-widget-areas--cms-22168
 *
 */

if ( function_exists ('register_sidebar')){
// Base Widget Area. Empty by default.
    register_sidebar( array(
       'name' => __( 'Content Widget Area', 'books4languages' ),
       'id' => 'content-books4languages-widget-area',
       'description' => __( 'Content Widget Area', 'books4languages' ),
       'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
       'after_widget' => '</div>',
       'before_title' => '<h3 class="widget-title">',
       'after_title' => '</h3>',
    ) );
}

?>
