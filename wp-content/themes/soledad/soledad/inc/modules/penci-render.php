<?php
/**
 * Content in mega menu
 *
 * @since 1.0
 * @return HTML inner mega menu
 */
if ( ! function_exists( 'penci_return_html_mega_menu' ) ) {
	function penci_return_html_mega_menu( $catID, $row ) {
		$args             = array(
			'type'         => 'post',
			'child_of'     => $catID,
			'orderby'      => 'name',
			'order'        => 'ASC',
			'hide_empty'   => true,
			'hierarchical' => 1,
			'taxonomy'     => 'category',
		);
		$child_categories = get_categories( $args );
		$list_cats = array( esc_html__( 'All', 'soledad') => $catID );

		if( get_theme_mod( 'penci_topbar_mega_hide_alltab' ) && ! empty( $child_categories ) ):
			$list_cats = array();
		endif;

		if( !empty( $child_categories ) ):
			foreach ( $child_categories as $child_cat ) {
				$list_cats[$child_cat->name] = $child_cat->term_id;
			}
		endif;

		/* Check rows to show number posts */
		if ( ! isset ( $row ) || empty( $row ) ): $row = '1'; endif;

		$col = 'col-mn-5 mega-row-1';
		$numbers = 5;
		if( !empty($child_categories) ) { $col = 'col-mn-4 mega-row-1'; $numbers = 4; }

		if( '2' == $row ) {
			$col = 'col-mn-5 mega-row-2';
			$numbers = 10;
			if( !empty($child_categories) ) { $col = 'col-mn-4 mega-row-2'; $numbers = 8; }
		} elseif ( '3' == $row ) {
			$col = 'col-mn-5 mega-row-3';
			$numbers = 15;
			if( !empty($child_categories) ) { $col = 'col-mn-4 mega-row-3'; $numbers = 12; }
		}

		ob_start();
		?>
		<?php if( !empty( $child_categories ) ): ?>
		<div class="penci-mega-child-categories">
			<?php $i = 1; foreach( $list_cats as $child_name => $child_id ): ?>
				<a class="mega-cat-child<?php if( $i == 1 ): echo ' cat-active'; endif; ?>" href="<?php echo esc_url( get_category_link( $child_id ) ); ?>" data-id="penci-mega-<?php echo esc_attr( $child_id ); ?>"><?php echo sanitize_text_field( $child_name ); ?></a>
			<?php $i++; endforeach; ?>
		</div>
		<?php endif; ?>

		<div class="penci-content-megamenu">
			<div class="penci-mega-latest-posts <?php echo esc_attr( $col ); ?>">
				<?php $j = 1; foreach( $list_cats as $cat_name => $cat_id ): ?>
				<div class="penci-mega-row penci-mega-<?php echo esc_attr( $cat_id ); ?><?php if( $j == 1 ): echo ' row-active'; endif; ?>">
					<?php
					$attr = array(
						'post_type' => 'post',
						'showposts' => $numbers,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field'    => 'term_id',
								'terms'    =>  (int)$cat_id,
							),
						),
					);
					$latest_mega = new WP_Query( $attr );
					if( $latest_mega->have_posts() ):
					while ( $latest_mega->have_posts() ): $latest_mega->the_post();

					$category = get_the_category( get_the_ID() );
					?>
						<div class="penci-mega-post">
							<div class="penci-mega-thumbnail">
								<?php
								/* Display Review Piechart  */
								if( function_exists('penci_display_piechart_review_html') ) {
									penci_display_piechart_review_html( get_the_ID(), 'small' );
								}
								?>
								<?php if ( ! get_theme_mod( 'penci_topbar_mega_category' ) ): ?>
								<span class="mega-cat-name">
									<?php if( $numbers == 5 ) { ?>
										<?php echo sanitize_text_field( get_cat_name( $cat_id ) ); ?>
									<?php } else { ?>
										<?php if( $j == 1 && ! get_theme_mod( 'penci_topbar_mega_hide_alltab' ) ) { echo sanitize_text_field( $category[0]->cat_name ); } else { echo sanitize_text_field( $cat_name ); } ?>
									<?php } ?>
								</span>
								<?php endif; ?>
								<a class="penci-image-holder" style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), 'penci-thumb' ); ?>');" href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>">
									<?php if( has_post_thumbnail() && get_theme_mod('penci_topbar_mega_icons') ): ?>
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
							</div>
							<div class="penci-mega-meta">
								<h3 class="post-mega-title">
									<a href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"><?php echo wp_trim_words( wp_strip_all_tags( get_the_title() ), 7, '...' ); ?></a>
								</h3>
								<?php if ( ! get_theme_mod( 'penci_topbar_mega_date' ) ): ?>
								<p class="penci-mega-date"><?php the_time( get_option('date_format') ); ?></p>
								<?php endif; ?>
							</div>
						</div>
					<?php endwhile;
					wp_reset_postdata();
					endif;
					?>
				</div>
				<?php $j++; endforeach; ?>
			</div>
		</div>

		<?php
		$return = ob_get_clean();

		return $return;
	}
}