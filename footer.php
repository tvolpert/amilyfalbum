<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package AmilyFalbum
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">

	</footer><!-- #colophon -->
<section id="bottom-drawer"><a href="#bottom-drawer" id="drawerpull">Add +</a><a href="#" class="escape"></a><aside id="post-form"><?php echo do_shortcode('[wpuf_form id="31"]') ?><?php if ( is_active_sidebar( 'drawer_login' ) ) : ?>
	<ul id="sidebar">
		<?php dynamic_sidebar( 'drawer_login' ); ?>
	</ul>
<?php endif; ?></aside></section>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
