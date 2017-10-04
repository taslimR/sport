<?php
/**
 * Popular Posts in Homepage
 */

$query = array(
	'posts_per_page' => 10,
	'post_type'      => 'post',
	'meta_key'       => 'penci_post_views_count',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC'
);

if( get_theme_mod( 'penci_home_popular_type' ) == 'week' ) {
	$query = array(
		'posts_per_page' => 10,
		'post_type'      => 'post',
		'meta_key'       => 'penci_post_week_views_count',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC'
	);
} elseif ( get_theme_mod( 'penci_home_popular_type' ) == 'month' ) {
	$query = array(
		'posts_per_page' => 10,
		'post_type'      => 'post',
		'meta_key'       => 'penci_post_month_views_count',
		'orderby'        => 'meta_value_num',
		'order'          => 'DESC'
	);
}

$popular_cat = get_theme_mod( 'penci_home_popular_cat' );
if( $popular_cat && '0' != $popular_cat ):
	$query['cat'] = $popular_cat;
endif;

$popular = new WP_Query( $query );

if( $popular->have_posts() ) {

$popular_title = get_theme_mod( 'penci_home_popular_title' );
?>
<div class="container penci-home-popular-posts">
	<h2 class="home-pupular-posts-title">
		<span>
			<?php if( ! $popular_title && $popular_title == 'Popular Posts' ) { esc_html_e( 'Popular Posts', 'soledad' ); } else { echo sanitize_text_field( $popular_title ); } ?>
		</span>
	</h2>
	<div class="penci-carousel penci-related-carousel penci-home-popular-post" data-auto="false" data-dots="true" data-arrows="false">
		<?php while ( $popular->have_posts() ) : $popular->the_post(); ?>
			<div class="item-related">
				<?php if ( ( function_exists( 'has_post_thumbnail' ) ) && ( has_post_thumbnail() ) ) : ?>
					<a class="related-thumb penci-image-holder" href="<?php the_permalink() ?>" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-thumb' ); ?>');">
						<?php if( has_post_thumbnail() && get_theme_mod('penci_enable_home_popular_icons') ): ?>
							<?php if ( has_post_format( 'video' ) ) : ?>
								<i class="fa fa-play"></i>
							<?php endif; ?>
							<?php if ( has_post_format( 'audio' ) ) : ?>
								<i class="fa fa-music"></i>
							<?php endif; ?>
							<?php if ( has_post_format( 'link' ) ) : ?>
								<i class="fa fa-link"></i>
							<?php endif; ?>
							<?php if ( has_post_format( 'quote' ) ) : ?>
								<i class="fa fa-quote-left"></i>
							<?php endif; ?>
							<?php if ( has_post_format( 'gallery' ) ) : ?>
								<i class="fa fa-picture-o"></i>
							<?php endif; ?>
						<?php endif; ?>
					</a>
				<?php endif; ?>

				<h3><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 7, '...' ); ?></a></h3>
				<?php if ( ! get_theme_mod( 'penci_hide_date_home_popular' ) ) : ?>
					<span class="date"><?php the_time( get_option( 'date_format' ) ); ?></span>
				<?php endif; ?>
			</div>
		<?php
		endwhile;
		?>
	</div>
</div>
<?php
}
wp_reset_postdata();
?>

