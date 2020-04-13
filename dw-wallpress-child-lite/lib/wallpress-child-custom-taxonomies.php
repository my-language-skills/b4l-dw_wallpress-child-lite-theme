<?php
/**
 * Custom taxonomies
 *
 * Description. (use period)
 *
 * @link URL
 *
 * @package wallpress-child
 * @subpackage wallpress-child/wallpress-child-custom-taxonomies
 * @since 0.1
 */


 /**
 * Units taxonomy (category)
 *
 * @since 0.1
 *
 */

 add_action( 'init', 'register_taxonomy_objectlanguage' );

 function register_taxonomy_objectlanguage() {

     $labels = array(
         'name' => _x( 'Object language', 'objectlanguage' ),
         'singular_name' => _x( 'Object language', 'objectlanguage' ),
         'search_items' => _x( 'Search Object languages', 'objectlanguage' ),
         'popular_items' => _x( 'Popular Object language', 'objectlanguage' ),
         'all_items' => _x( 'Object languages', 'objectlanguage' ),
         'parent_item' => _x( 'Parent Object language', 'objectlanguage' ),
         'parent_item_colon' => _x( 'Parent Object language:', 'objectlanguage' ),
         'edit_item' => _x( 'Edit Object language', 'objectlanguage' ),
         'update_item' => _x( 'Update Object language', 'objectlanguage' ),
         'add_new_item' => _x( 'Add New Object language', 'objectlanguage' ),
         'new_item_name' => _x( 'New Object language', 'objectlanguage' ),
         'separate_items_with_commas' => _x( 'Separate Object languages with commas', 'objectlanguage' ),
         'add_or_remove_items' => _x( 'Add or remove Object language', 'objectlanguage' ),
         'choose_from_most_used' => _x( 'Choose from the most used Object languages', 'objectlanguage' ),
         'menu_name' => _x( 'Object language', 'objectlanguage' ),
     );

     $args = array(
         'labels' => $labels,
         'public' => true,
         'show_in_nav_menus' => true,
         'show_ui' => true,
         'show_tagcloud' => true,
         'show_admin_column' => true,
         'hierarchical' => true,

     // Add capabilities for specific role
         'capabilities' => array (
         'manage_terms' => 'manage_options', // only admin
         'edit_terms' => 'manage_options', // only admin
         'delete_terms' => 'manage_options', // only admin
         'assign_terms' => 'read' // anyone can assign terms
          ),

         'rewrite' => true,
         'query_var' => true
     );

     register_taxonomy( 'objectlanguage', array('post'), $args );
 }

/**
* grammar taxonomy (category)
*
* @since 0.1
*
*/


add_action( 'init', 'register_taxonomy_metalanguage' );

function register_taxonomy_metalanguage() {

   $labels = array(
       'name' => _x( 'Metalanguage', 'metalanguage' ),
       'singular_name' => _x( 'Metalanguage', 'metalanguage' ),
       'search_items' => _x( 'Search Metalanguages', 'metalanguage' ),
       'popular_items' => _x( 'Popular Metalanguages', 'metalanguage' ),
       'all_items' => _x( 'Metalanguages', 'metalanguage' ),
       'parent_item' => _x( 'Parent Metalanguage', 'metalanguage' ),
       'parent_item_colon' => _x( 'Parent Metalanguage:', 'metalanguage' ),
       'edit_item' => _x( 'Edit Metalanguage', 'metalanguage' ),
       'update_item' => _x( 'Update Metalanguage', 'metalanguage' ),
       'add_new_item' => _x( 'Add New Metalanguage', 'metalanguage' ),
       'new_item_name' => _x( 'New Metalanguage', 'metalanguage' ),
       'separate_items_with_commas' => _x( 'Separate Metalanguages with commas', 'metalanguage' ),
       'add_or_remove_items' => _x( 'Add or remove Metalanguage', 'metalanguage' ),
       'choose_from_most_used' => _x( 'Choose from the most used Metalanguage', 'metalanguage' ),
       'menu_name' => _x( 'Metalanguage', 'metalanguage' ),
   );

   $args = array(
       'labels' => $labels,
       'public' => true,
       'show_in_nav_menus' => true,
       'show_ui' => true,
       'show_tagcloud' => true,
       'show_admin_column' => true,
       'hierarchical' => true,

   // Add capabilities for specific role
       'capabilities' => array (
       'manage_terms' => 'manage_options', // only admin
       'edit_terms' => 'manage_options', // only admin
       'delete_terms' => 'manage_options', // only admin
       'assign_terms' => 'read' // anyone can assign terms
        ),

       'rewrite' => true,
       'query_var' => true
   );

   register_taxonomy( 'metalanguage', array('post'), $args );
}

/**
* Add an automatic default custom taxonomy for custom post type.
* If no story (taxonomy) is set, the comic post will be sorted as “draft” and won’t return an offset error.
* https://silentcomics.com/wordpress/automatic-default-taxonomy-for-a-custom-post-type/
*
*/
function set_default_objectlanguage_terms( $post_id, $post ) {
    if ( 'publish' === $post->post_status && $post->post_type === 'post' ) {
        $defaults = array(
            'objectlanguage' => array( 'uncategorized' )
            );
        $taxonomies = get_object_taxonomies( $post->post_type );
        foreach ( (array) $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy );
            if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
            }
        }
    }
}
add_action( 'save_post', 'set_default_objectlanguage_terms', 0, 2 );

/**
* Add an automatic default custom taxonomy for custom post type.
* If no story (taxonomy) is set, the comic post will be sorted as “draft” and won’t return an offset error.
* https://silentcomics.com/wordpress/automatic-default-taxonomy-for-a-custom-post-type/
*
*/
    function set_default_metalanguage_terms( $post_id, $post ) {
        if ( 'publish' === $post->post_status && $post->post_type === 'post' ) {
            $defaults = array(
                'metalanguage' => array( 'uncategorized' )
                );
            $taxonomies = get_object_taxonomies( $post->post_type );
            foreach ( (array) $taxonomies as $taxonomy ) {
                $terms = wp_get_post_terms( $post_id, $taxonomy );
                if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
                    wp_set_object_terms( $post_id, $defaults[$taxonomy], $taxonomy );
                }
            }
        }
    }
    add_action( 'save_post', 'set_default_metalanguage_terms', 0, 2 );





// https://wordpress.stackexchange.com/questions/193543/how-to-not-allow-users-to-create-new-tags-but-allow-to-them-to-use-existing-one
function disallow_insert_term($term, $taxonomy) {

$user = wp_get_current_user();

if ( $taxonomy === 'post_tag' && in_array('creator', $user->roles) ) {

    return new WP_Error(
        'disallow_insert_term',
        __('Your role does not have permission to add terms to this taxonomy')
    );

}

return $term;

}

add_filter('pre_insert_term', 'disallow_insert_term', 10, 2);
?>
