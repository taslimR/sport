<?php
/**
 * This is content page will display in loop of page without featured thumbnail, share box and comments
 * Don't edit this file, let create child theme and override it
 *
 * @since 1.0
 */

$pagetitle = get_post_meta( $post->ID, 'penci_page_display_title', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if( get_the_title() && ( 'no' != $pagetitle ) ): ?>
	<div class="penci-page-header">
		<h1><?php the_title(); ?></h1>
	</div>
	<?php endif; ?>

	<div class="post-entry page-has-margin">
		<div class="inner-post-entry">
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div>
	</div>

</article>