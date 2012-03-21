<?php 
// Remove junk from head -----------------------------------------------------------
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
function remove_recent_comments_style() {  
    global $wp_widget_factory;  
    remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );  
}  
add_action( 'widgets_init', 'remove_recent_comments_style' );

// Get Template Hook --------------------------------------------------------------
function get_simple_fields_template_hook ($postID){
	$templateIndexFields = simple_fields_get_post_group_values($postID,"_template-index", true, 1);
	$templateHook = "";
	foreach ( $templateIndexFields as $key => $value ) {
    $template_hook = "_template-hook-".$key;
  	if(is_array(simple_fields_get_post_group_values($postID, $template_hook, true, 1)) ){
  		$templateHook = $key;
  		break;
  	}
  }
  return $templateHook;
}
?>