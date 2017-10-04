<?php
/**
 * Template display for featured category style 4
 *
 * @since 2.0
 */
?>

<li class="mag-single-slider">
	<div class="magcat-thumb">
		<a href="<?php the_permalink(); ?>" class="mag-single-slider-overlay"></a>
		<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-slider-thumb' ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
		</a>
		<div class="magcat-detail">
			<h3 class="magcat-titlte"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php if ( ! get_theme_mod( 'penci_home_featured_cat_author' ) || ! get_theme_mod( 'penci_home_featured_cat_date' ) ): ?>
				<div class="grid-post-box-meta mag-meta">
					<?php if ( ! get_theme_mod( 'penci_home_featured_cat_author' ) ) : ?>
						<span><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
					<?php endif; ?>
					<?php if ( ! get_theme_mod( 'penci_home_featured_cat_date' ) ) : ?>
						<span><?php the_time( get_option('date_format') ); ?></span>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</li>