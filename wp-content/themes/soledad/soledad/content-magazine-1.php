<?php
/**
 * Template loop for list style
 */
?>
<li class="list-post magazine-layout magazine-1">
	<article id="post-<?php the_ID(); ?>" class="item">

		<?php if ( has_post_format( 'gallery' ) ) : ?>
			<?php $images = get_post_meta( get_the_ID(), '_format_gallery_images', true ); ?>
			<?php if ( $images ) : ?>
				<div class="thumbnail">
					<div class="penci-slick-slider" data-auto-height="true">
						<?php foreach ( $images as $image ) : ?>

							<?php $the_image = wp_get_attachment_image_src( $image, 'penci-thumb' ); ?>
							<?php $the_caption = get_post_field( 'post_excerpt', $image ); ?>
							<figure class="penci-image-holder" alt="<?php the_title(); ?>"<?php if ($the_caption) : ?> title="<?php echo esc_attr( $the_caption ); ?>"<?php endif; ?> style="background-image: url('<?php echo esc_url( $the_image[0] ); ?>');">
							</figure>

						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>

		<?php elseif ( has_post_thumbnail() ) : ?>
			<div class="thumbnail">
				<?php
				/* Display Review Piechart  */
				if( function_exists('penci_display_piechart_review_html') ) {
					penci_display_piechart_review_html( get_the_ID() );
				}
				?>
				<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-thumb' ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
				</a>
				<?php if( ! get_theme_mod('penci_grid_icon_format') ): ?>
					<?php if ( has_post_format( 'video' ) ) : ?>
						<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-play"></i></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'audio' ) ) : ?>
						<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-music"></i></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'link' ) ) : ?>
						<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-link"></i></a>
					<?php endif; ?>
					<?php if ( has_post_format( 'quote' ) ) : ?>
						<a href="<?php the_permalink() ?>" class="icon-post-format"><i class="fa fa-quote-left"></i></a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<div class="content-list-right<?php if ( ! has_post_thumbnail() ) : echo ' fullwidth'; endif; ?>">
			<div class="header-list-style">
				<?php if ( ! get_theme_mod( 'penci_grid_cat' ) ) : ?>
					<span class="cat"><?php penci_category( '' ); ?></span>
				<?php endif; ?>

				<h2 class="grid-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

				<?php if ( ! get_theme_mod( 'penci_grid_date' ) || ! get_theme_mod( 'penci_grid_author' ) ) : ?>
					<div class="grid-post-box-meta">
						<?php if ( ! get_theme_mod( 'penci_grid_author' ) ) : ?>
							<span class="author-italic"><?php esc_html_e( 'by ', 'soledad' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a></span>
						<?php endif; ?>
						<?php if ( ! get_theme_mod( 'penci_grid_date' ) ) : ?>
							<span><?php the_time( get_option('date_format') ); ?></span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="item-content">
				<?php the_excerpt(); ?>
			</div>
		</div>

	</article>
</li>