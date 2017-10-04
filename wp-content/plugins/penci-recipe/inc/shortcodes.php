<?php
/**
 * Penci Recipe Shortcode
 * Use penci_recipe to display the recipe on single a post
 */
function penci_recipe_shortcode_function( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'id' => ''
	), $atts ) );

	$recipe_id = get_the_ID();
	if ( ! empty( $id ) && is_numeric( $id ) ) {
		$recipe_id = $id;
	}

	// Get recipe meta
	$recipe_title = get_post_meta( $recipe_id, 'penci_recipe_title', true );
	$recipe_servings = get_post_meta( $recipe_id, 'penci_recipe_servings', true );
	$recipe_cooktime = get_post_meta( $recipe_id, 'penci_recipe_cooktime', true );
	$recipe_cooktime_fm = get_post_meta( $recipe_id, 'penci_recipe_cooktime_format', true );
	$recipe_preptime = get_post_meta( $recipe_id, 'penci_recipe_preptime', true );
	$recipe_preptime_fm = get_post_meta( $recipe_id, 'penci_recipe_preptime_format', true );
	$recipe_ingredients = get_post_meta( $recipe_id, 'penci_recipe_ingredients', true );
	$recipe_instructions = get_post_meta( $recipe_id, 'penci_recipe_instructions', true );
	$recipe_note = get_post_meta( $recipe_id, 'penci_recipe_note', true );

	// Turn ingredients into an array
	$recipe_ingredients_array = '';
	if( $recipe_ingredients ):
	$recipe_ingredients_array = preg_split( '/\r\n|[\r\n]/', $recipe_ingredients );
	endif;

	$rand = rand(100, 9999);
	wp_enqueue_script('jquery-recipe-print');
	ob_start(); ?>
	
	<div class="wrapper-penci-recipe">
		<div class="penci-recipe" id="printrepcipe<?php echo $rand; ?>" itemscope itemtype="http://schema.org/Recipe">
			<div class="penci-recipe-heading">
				<?php if ( $recipe_title ) : ?>
					<h2 itemprop="name"><?php echo $recipe_title; ?></h2>
				<?php endif; ?>

				<?php if ( has_post_thumbnail() ): ?>
				<img style="display: none !important;" itemprop="image" src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" width="50" height="50"/>
				<?php endif; ?>

				<?php if ( ! get_theme_mod( 'penci_recipe_print' ) ) : ?>
					<a href="#" class="penci-recipe-print" data-print="<?php echo plugin_dir_url( __FILE__ ) . 'print.css'; ?>"><i class="fa fa-print"></i> <?php if( get_theme_mod( 'penci_recipe_print_text' ) ) { echo get_theme_mod( 'penci_recipe_print_text' ); } else { esc_html_e( 'Print This', 'soledad' ); } ?></a>
				<?php endif; ?>

				<?php if ( $recipe_servings || $recipe_cooktime || $recipe_preptime ) : ?>
					<div class="penci-recipe-meta">
						<?php if ( $recipe_servings ) : ?><span>
							<i class="fa fa-user"></i> <?php if( get_theme_mod( 'penci_recipe_serves_text' ) ) { echo get_theme_mod( 'penci_recipe_serves_text' ); } else { esc_html_e( 'Serves', 'soledad' ); } ?>: <span class="servings" itemprop="recipeYield"><?php echo $recipe_servings; ?></span>
							</span>
						<?php endif; ?>
						<?php if ( $recipe_preptime ) : ?>
							<span>
							<i class="fa fa-clock-o"></i> <?php if( get_theme_mod( 'penci_recipe_prep_time_text' ) ) { echo get_theme_mod( 'penci_recipe_prep_time_text' ); } else { esc_html_e( 'Prep Time', 'soledad' ); } ?>: <time <?php if( $recipe_preptime_fm ): echo 'datetime="PT'. $recipe_preptime_fm .'" '; endif;?>itemprop="prepTime"><?php echo $recipe_preptime; ?></time>
							</span>
						<?php endif; ?>
						<?php if ( $recipe_cooktime ) : ?>
							<span>
							<i class="fa fa-clock-o"></i> <?php if( get_theme_mod( 'penci_recipe_cooking_text' ) ) { echo get_theme_mod( 'penci_recipe_cooking_text' ); } else { esc_html_e( 'Cooking Time', 'soledad' ); } ?>: <time <?php if( $recipe_cooktime_fm ): echo 'datetime="PT'. $recipe_cooktime_fm .'" '; endif;?>itemprop="cookTime"><?php echo $recipe_cooktime; ?></time>
							</span>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if ( $recipe_ingredients ) : ?>
				<div class="penci-recipe-ingredients">
					<h3 class="penci-recipe-title"><?php if( get_theme_mod( 'penci_recipe_ingredients_text' ) ) { echo get_theme_mod( 'penci_recipe_ingredients_text' ); } else { esc_html_e( 'Ingredients', 'soledad' ); } ?></h3>
					<ul>
						<?php foreach ( $recipe_ingredients_array as $ingredient ) : ?>
							<?php if ( $ingredient ) : ?>
								<li><span itemprop="recipeIngredient"><?php echo $ingredient; ?></span></li>
							<?php endif; ?>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<?php if ( $recipe_instructions ) : ?>
				<div class="penci-recipe-method" itemprop="recipeInstructions">
					<h3 class="penci-recipe-title"><?php if( get_theme_mod( 'penci_recipe_instructions_text' ) ) { echo get_theme_mod( 'penci_recipe_instructions_text' ); } else { esc_html_e( 'Instructions', 'soledad' ); } ?></h3>
					<?php
					echo apply_filters( 'the_content', htmlspecialchars_decode( $recipe_instructions ) );
					?>
				</div>
			<?php endif; ?>

			<?php if ( $recipe_note ) : ?>
				<div class="penci-recipe-notes">
					<h3 class="penci-recipe-title"><?php if( get_theme_mod( 'penci_recipe_notes_text' ) ) { echo get_theme_mod( 'penci_recipe_notes_text' ); } else { esc_html_e( 'Notes', 'soledad' ); } ?></h3>
					<p><?php echo $recipe_note; ?></p>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

add_shortcode( 'penci_recipe', 'penci_recipe_shortcode_function' );
