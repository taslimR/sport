<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package Wordpress
 * @since   1.0
 */
get_header();
$breadcrumb = get_post_meta( get_the_ID(), 'penci_page_breadcrumb', true );
$featured_boxes = get_post_meta( get_the_ID(), 'penci_page_display_featured_boxes', true );
$page_meta = get_post_meta( get_the_ID(), 'penci_page_slider', true );
$rev_shortcode = get_post_meta( get_the_ID(), 'penci_page_rev_shortcode', true );

if( in_array( $page_meta, array('style-1', 'style-2', 'style-3', 'style-4', 'style-5', 'style-6', 'style-7', 'style-8', 'style-9', 'video', 'style-10', 'style-11' ) ) ) {
	if( $page_meta == 'video' && get_theme_mod( 'penci_featured_video_url' ) ) {
		get_template_part( 'inc/featured_slider/featured_video' );
	} else {
		if( $page_meta == 'style-10' && $rev_shortcode ){
			?>
			<div class="featured-area style-4 style-10 loaded loaded-wait">
				<?php echo do_shortcode( $rev_shortcode ); ?>
			</div>
		<?php
		} elseif( $page_meta == 'style-11' && $rev_shortcode ) {
			?>
			<div class="featured-area style-11 loaded loaded-wait">
				<?php echo do_shortcode( $rev_shortcode ); ?>
			</div>
		<?php
		}
		elseif( $page_meta == 'style-6' ) {
			get_template_part( 'inc/featured_slider/magazine_slider' );
		} elseif ( $page_meta == 'style-8' ) {
			get_template_part( 'inc/featured_slider/magazine_slider_2' );
		} elseif ( $page_meta == 'style-9' ) {
			get_template_part( 'inc/featured_slider/magazine_slider_3' );
		} elseif( $page_meta == 'style-4' || $page_meta == 'style-5' ) {
			get_template_part( 'inc/featured_slider/featured_penci_slider' );
		} else {
			get_template_part( 'inc/featured_slider/featured_slider' );
		}
	}
}

/* Display Featured Boxes */
if ( $featured_boxes == 'yes' && ! get_theme_mod( 'penci_home_hide_boxes' ) && ( get_theme_mod( 'penci_home_box_img1' ) || get_theme_mod( 'penci_home_box_img2' ) || get_theme_mod( 'penci_home_box_img3' ) || get_theme_mod( 'penci_home_box_img4' ) ) ):
	get_template_part( 'inc/modules/home_boxes' );
endif;

?>

	<?php if ( ! get_theme_mod( 'penci_disable_breadcrumb' ) && ( 'no' != $breadcrumb ) ): ?>
		<div class="container container-single-page penci-breadcrumb">
			<span><a class="crumb" href="<?php echo esc_url( home_url('/') ); ?>"><?php esc_html_e( 'Home', 'soledad' ); ?></a></span><i class="fa fa-angle-right"></i>
			<span><?php the_title(); ?></span>
		</div>
	<?php endif; ?>

	<div class="container">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php get_template_part('content', 'page'); ?>
		<?php endwhile; endif; ?>

<?php get_footer(); ?>