<?php
/**
 home page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package AmilyFalbum
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

	<?php get_attachment_files(); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
?>