<?php
/**
 * Add on for Visual Composer
 * If VC installed, this file will load
 * This add-on only use for Soledad theme
 *
 * @since 2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Soledad_VC_Admin {

	function __construct() {
		// We safely integrate with VC with this hook
		add_action( 'init', array( $this, 'integrate' ) );
	}

	/**
	 * Integrate elements (shortcodes) into VC interface
	 */
	public function integrate() {
		// Check if Visual Composer is installed
		if ( ! defined( 'WPB_VC_VERSION' ) ) {
			// Display notice that Visual Compser is required
			add_action( 'admin_notices', array( __CLASS__, 'notice' ) );

			return;
		}

		/*
		 * Register custom shortcodes within Visual Composer interface
		 *
		 * @see http://kb.wpbakery.com/index.php?title=Vc_map
		 */
		// Latest Posts
		vc_map( array(
			'name'        => __( 'Latest Posts', 'soledad' ),
			'description' => 'Display your latest posts',
			'base'        => 'latest_posts',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
			'category'    => 'Soledad',
			'params'      => array(
				array(
					'type'        => 'textfield',
					'heading'     => 'Heading Title for Latest Posts',
					'param_name'  => 'heading',
					'description' => '',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Latest Posts Layout', 'soledad' ),
					'value'       => array(
						'Standard Posts'                   => 'standard',
						'Classic Posts'                    => 'classic',
						'Overlay Posts'                    => 'overlay',
						'Grid Posts'                       => 'grid',
						'Grid 2 Columns Posts'             => 'grid-2',
						'Grid Masonry Posts'               => 'masonry',
						'Grid Masonry 2 Columns Posts'     => 'masonry-2',
						'List Posts'                       => 'list',
						'Boxed Posts Style 1'              => 'boxed-1',
						'Boxed Posts Style 2'              => 'boxed-2',
						'Mixed Posts'                      => 'mixed',
						'Mixed Posts Style 2'              => 'mixed-2',
						'Photography Posts'                => 'photography',
						'1st Standard Then Grid'           => 'standard-grid',
						'1st Standard Then Grid 2 Columns' => 'standard-grid-2',
						'1st Standard Then List'           => 'standard-list',
						'1st Standard Then Boxed'          => 'standard-boxed-1',
						'1st Classic Then Grid'            => 'classic-grid',
						'1st Classic Then Grid 2 Columns'  => 'classic-grid-2',
						'1st Classic Then List'            => 'classic-list',
						'1st Classic Then Boxed'           => 'classic-boxed-1',
						'1st Overlay Then Grid'            => 'overlay-grid',
						'1st Overlay Then List'            => 'overlay-list'
					),
					'param_name'  => 'style',
					'description' => 'Select Latest Posts Style',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Posts Per Page',
					'param_name'  => 'number',
					'description' => 'Fill the number posts per page you want here',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Exclude Categories',
					'param_name'  => 'exclude',
					'description' => 'If you want to exclude any categories, fill the categories slug here. See <a href="http://pencidesign.com/soledad/soledad-document/assets/images/magazine-2.png" target="_blank">here</a> to know what is category slug. Example: travel, life-style',
				)
			)
		) );

		// Featured Categories
		vc_map( array(
			'name'        => __( 'Featured Category', 'soledad' ),
			'description' => 'Display A Featured Category',
			'base'        => 'featured_cat',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
			'category'    => 'Soledad',
			'params'      => array(
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Featured Category Layout', 'soledad' ),
					'value'       => array(
						'Style 1 - 1st Post Grid Featured on Left' => 'style-1',
						'Style 2 - 1st Post Grid Featured on Top'  => 'style-2',
						'Style 3 - Text Overlay'                   => 'style-3',
						'Style 4 - Single Slider'                  => 'style-4',
						'Style 5 - Slider 2 Columns'               => 'style-5',
						'Style 6 - 1st Post List Featured on Top'  => 'style-6',
						'Style 7 - Grid Layout'                    => 'style-7',
						'Style 8 - List Layout'                    => 'style-8'
					),
					'param_name'  => 'style',
					'description' => '',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => __( 'Latest Posts Layout', 'soledad' ),
					'value'       => self::get_terms( 'category' ),
					'param_name'  => 'category',
					'description' => 'Select Featured Category',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Posts Display',
					'param_name'  => 'number',
					'description' => 'Fill the number posts display you want here',
				)
			)
		) );

		// Portfolio
		vc_map( array(
			'name'        => __( 'Portfolio', 'soledad' ),
			'description' => 'Display Your Portfolio',
			'base'        => 'portfolio',
			'class'       => '',
			'controls'    => 'full',
			'icon'        => get_template_directory_uri() . '/images/vc-icon.png',
			'category'    => 'Soledad',
			'params'      => array(
				array(
					'type'        => 'dropdown',
					'heading'     => 'Portfolio Style',
					'value'       => array(
						'Masonry' => 'masonry',
						'Grid'    => 'grid'
					),
					'param_name'  => 'style',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Number Portfolio Display',
					'param_name'  => 'number',
					'description' => 'Fill the number portfolio display you want here',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Number Columns',
					'value'       => array(
						'3 Columns' => '3',
						'2 Columns' => '2'
					),
					'param_name'  => 'column',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'Display Portfolio in Portfolio Categories',
					'param_name'  => 'cat',
					'description' => 'Fill the portfolio categories slug you want to display. E.g: cat-1, cat-2',
				),
				array(
					'type'        => 'dropdown',
					'heading'     => 'Display Filter?',
					'value'       => array(
						'Yes' => 'true',
						'No'  => 'false'
					),
					'param_name'  => 'filter',
					'description' => '',
				),
				array(
					'type'        => 'textfield',
					'heading'     => 'All Portfolio Text',
					'param_name'  => 'all_text',
					'description' => '',
				)
			)
		) );
	}

	/**
	 * Show notice if your plugin is activated but Visual Composer is not
	 */
	public static function notice() {
		?>

		<div class="updated">
			<p><?php _e( '<strong>Soledad VC Addon</strong> requires <strong>Visual Composer</strong> plugin to be installed and activated on your site.', 'soledad' ) ?></p>
		</div>

	<?php
	}

	/**
	 * Get category for auto complete field
	 *
	 * @param string $taxonomy Taxnomy to get terms
	 *
	 * @return array
	 */
	private static function get_terms( $taxonomy = 'category' ) {
		$cats = get_terms( $taxonomy );
		if ( ! $cats || is_wp_error( $cats ) ) {
			return array();
		}

		$categories = array();
		foreach ( $cats as $cat ) {
			$categories[] = array(
				'label' => $cat->name,
				'value' => $cat->slug,
				'group' => 'category',
			);
		}

		return $categories;
	}
}

new Soledad_VC_Admin();


class Soledad_VC_Shortcodes {
	/**
	 * Add shortcodes
	 */
	public static function init() {
		$shortcodes = array(
			'latest_posts',
			'featured_cat'
		);

		foreach ( $shortcodes as $shortcode ) {
			add_shortcode( $shortcode, array( __CLASS__, $shortcode ) );
		}
	}

	/**
	 * Retrieve HTML markup of latest_posts shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	public static function latest_posts( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'style'   => 'standard',
			'heading' => '',
			'number'  => '10',
			'exclude' => ''
		), $atts ) );

		$return = '';

		if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '10'; endif;
		$paged = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );
		$args  = array( 'post_type' => 'post', 'paged' => $paged, 'posts_per_page' => $number );
		if ( ! empty( $exclude ) ):
			$exclude_cats      = str_replace( ' ', '', $exclude );
			$exclude_array     = explode( ',', $exclude_cats );
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'slug',
					'terms'    => $exclude_array,
					'operator' => 'NOT IN'
				)
			);
		endif;

		$query_custom = new WP_Query( $args );
		if ( $query_custom->have_posts() ) :
			ob_start();
			?>

			<?php if ( $heading ) : ?>
				<div class="penci-border-arrow penci-homepage-title">
					<h3 class="inner-arrow"><?php echo sanitize_text_field( $heading ); ?></h3>
				</div>
			<?php endif; ?>

			<?php if ( in_array( $style, array( 'mixed', 'mixed-2', 'overlay-grid', 'overlay-list', 'photography', 'grid', 'grid-2', 'list', 'boxed-1', 'boxed-2', 'boxed-3', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1', 'magazine-1', 'magazine-2' ) ) ) : ?><ul class="penci-grid penci-shortcode-render"><?php endif; ?>
			<?php if ( in_array( $style, array( 'masonry', 'masonry-2' ) ) ) : ?>
			<div class="penci-wrap-masonry">
			<div class="masonry penci-masonry"><?php endif; ?>
			<?php /* The loop */
			while ( $query_custom->have_posts() ) : $query_custom->the_post();
				include( locate_template( 'content-' . $style . '.php' ) );
			endwhile;
			?>
			<?php if ( in_array( $style, array( 'masonry', 'masonry-2' ) ) ) : ?></div></div><?php endif; ?>
			<?php if ( in_array( $style, array( 'mixed', 'mixed-2', 'overlay-grid', 'overlay-list', 'photography', 'grid', 'grid-2', 'list', 'boxed-1', 'boxed-2', 'boxed-3', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list', 'classic-boxed-1', 'magazine-1', 'magazine-2' ) ) ) : ?></ul><?php endif; ?>

			<?php echo penci_pagination_numbers( $query_custom ); ?>
		<?php
		endif; wp_reset_postdata();

		$return = ob_get_clean();

		return $return;
	}

	/**
	 * Retrieve HTML markup of featured_cat shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	public static function featured_cat( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'style'    => 'style-1',
			'category' => '',
			'number'   => '5',
		), $atts ) );

		$return = '';
		if ( ! isset( $number ) || ! is_numeric( $number ) ): $number = '5'; endif;
		$fea_oj = get_category_by_slug( $category );

		if( ! empty ( $fea_oj ) ) {

			$fea_cat_id = $fea_oj->term_id;
			$fea_cat_name = $fea_oj->name;
			$cat_meta   = get_option( "category_$fea_cat_id" );
			$cat_ads_code = isset( $cat_meta['mag_ads'] ) ? $cat_meta['mag_ads'] : '';

			$attr       = array(
				'post_type' => 'post',
				'showposts' => $number,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'slug',
						'terms'    => $category
					)
				)
			);
			$fea_query = new WP_Query( $attr );
			$numers_results = $fea_query->post_count;

			if ( $fea_query->have_posts() ) :
			ob_start();
			?>
			<?php if ( $style == 'style-2' ) { ?>
				<div class="home-featured-cat mag-cat-style-2">
			<?php } else { ?>
				<section class="home-featured-cat mag-cat-<?php echo esc_attr( $style ); ?>">
			<?php } ?>
				<div class="penci-border-arrow penci-homepage-title penci-magazine-title">
					<h3 class="inner-arrow"><a href="<?php echo esc_url( get_category_link( $fea_cat_id ) ); ?>"><?php echo sanitize_text_field( $fea_cat_name ); ?></a></h3>
				</div>
					<div class="home-featured-cat-content <?php echo esc_attr( $style ); ?>">
					<?php if ( $style == 'style-4' ): ?>
				<div class="penci-slider penci-single-mag-slider" data-smooth="true" data-control="false" data-dir="true" data-auto="true" data-autotime="5000" data-speed="600">
				<ul class="slides">
			<?php endif; ?>
				<?php if ( $style == 'style-5' ): ?>
				<div class="penci-carousel penci-magcat-carousel" data-auto="true" data-dots="false" data-arrows="true">
			<?php endif; ?>
				<?php if ( $style == 'style-7' || $style == 'style-8' ): ?>
				<ul class="penci-grid penci-grid-maglayout">
			<?php endif; ?>
				<?php
				$m = 1;
				while ( $fea_query->have_posts() ): $fea_query->the_post();
					include( locate_template( 'inc/modules/magazine-' . $style . '.php' ) );
					$m ++; endwhile;
				?>
			<?php if ( $style == 'style-7' || $style == 'style-8' ): ?>
				</ul>
			<?php endif; ?>
			<?php if ( $style == 'style-5' ): ?>
				</div>
			<?php endif; ?>
			<?php if ( $style == 'style-4' ): ?>
				</ul>
				</div>
			<?php endif; ?>
				</div>
					<?php if ( get_theme_mod( 'penci_home_featured_cat_seemore' ) ): ?>
				<div class="penci-featured-cat-seemore">
					<a href="<?php echo esc_url( get_category_link( $fea_cat_id ) ); ?>"><?php esc_html_e( 'See More', 'soledad' ); ?>
						<i class="fa fa-angle-double-right"></i></a>
				</div>
			<?php endif; ?>

			<?php if ( $cat_ads_code ): ?>
				<div class="penci-featured-cat-custom-ads">
					<?php echo stripslashes( $cat_ads_code ); ?>
				</div>
			<?php endif; ?>

			<?php if ( $style == 'style-2' ) { ?>
				</div>
			<?php }
			else { ?>
			</section>
			<?php } ?>

			<?php
			endif; wp_reset_postdata();
		}

		$return = ob_get_clean();

		return $return;
	}
}

if ( ! is_admin() ) {
	Soledad_VC_Shortcodes::init();
}