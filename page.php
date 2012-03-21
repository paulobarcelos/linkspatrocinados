<?php	$template = get_simple_fields_template_hook(get_the_ID()); ?>
<?php get_header(); ?>
<?php
	$template_page = "page_".$template.".php";
	include($template_page);
?>
<?php get_footer(); ?>