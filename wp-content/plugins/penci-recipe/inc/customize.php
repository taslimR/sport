<?php
/**
 * Customize for Penci Recipe
 * @since 1.0
 */
function penci_soledad_recipe_customizer( $wp_customize ) {
	// Add Sections
	$wp_customize->add_section( 'penci_new_section_recipe' , array(
		'title'      => 'Recipe Options',
		'description'=> '',
		'priority'   => 49,
	) );

	// Add settings
	$wp_customize->add_setting( 'penci_recipe_print', array(
		'default'           => false,
		'sanitize_callback' => 'penci_recipe_sanitize_checkbox_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_print', array(
		'label'    => 'Hide Print Button',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_print',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );

	$wp_customize->add_setting( 'penci_recipe_border_color', array(
		'default'           => '#dedede',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_border_color', array(
		'label'    => 'Recipe Border Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_border_color',
		'priority' => 2
	) ) );

	$wp_customize->add_setting( 'penci_recipe_title_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_title_color', array(
		'label'    => 'Recipe Title Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_title_color',
		'priority' => 3
	) ) );

	$wp_customize->add_setting( 'penci_recipe_print_button', array(
		'default'           => '#6eb48c',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_print_button', array(
		'label'    => 'Recipe Print Button Accent Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_print_button',
		'priority' => 3
	) ) );

	$wp_customize->add_setting( 'penci_recipe_meta_icon_color', array(
		'default'           => '#aaaaaa',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_meta_icon_color', array(
		'label'    => 'Recipe Meta Icons Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_meta_icon_color',
		'priority' => 4
	) ) );

	$wp_customize->add_setting( 'penci_recipe_meta_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_meta_color', array(
		'label'    => 'Recipe Meta Text Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_meta_color',
		'priority' => 4
	) ) );

	$wp_customize->add_setting( 'penci_recipe_section_title_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_section_title_color', array(
		'label'    => 'Recipe Section Title Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_section_title_color',
		'priority' => 5
	) ) );

	$wp_customize->add_setting( 'penci_recipe_note_title_color', array(
		'default'           => '#888888',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_note_title_color', array(
		'label'    => 'Recipe Notes Title Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_note_title_color',
		'priority' => 5
	) ) );

	$wp_customize->add_setting( 'penci_recipe_note_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'recipe_note_color', array(
		'label'    => 'Recipe Notes Text Color',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_note_color',
		'priority' => 6
	) ) );

	$wp_customize->add_setting( 'penci_recipe_print_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_print_text', array(
		'label'    => 'Custom "Print This" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_print_text',
		'type'     => 'text',
		'priority' => 7
	) ) );

	$wp_customize->add_setting( 'penci_recipe_serves_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_serves_text', array(
		'label'    => 'Custom "Serves" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_serves_text',
		'type'     => 'text',
		'priority' => 8
	) ) );

	$wp_customize->add_setting( 'penci_recipe_prep_time_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_prep_time_text', array(
		'label'    => 'Custom "Prep Time" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_prep_time_text',
		'type'     => 'text',
		'priority' => 9
	) ) );

	$wp_customize->add_setting( 'penci_recipe_cooking_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_cooking_text', array(
		'label'    => 'Custom "Cooking Time" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_cooking_text',
		'type'     => 'text',
		'priority' => 10
	) ) );

	$wp_customize->add_setting( 'penci_recipe_ingredients_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_ingredients_text', array(
		'label'    => 'Custom "INGREDIENTS" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_ingredients_text',
		'type'     => 'text',
		'priority' => 11
	) ) );

	$wp_customize->add_setting( 'penci_recipe_instructions_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_instructions_text', array(
		'label'    => 'Custom "INSTRUCTIONS" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_instructions_text',
		'type'     => 'text',
		'priority' => 12
	) ) );

	$wp_customize->add_setting( 'penci_recipe_notes_text', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'recipe_notes_text', array(
		'label'    => 'Custom "NOTES" text',
		'section'  => 'penci_new_section_recipe',
		'settings' => 'penci_recipe_notes_text',
		'type'     => 'text',
		'priority' => 13
	) ) );

}
add_action( 'customize_register', 'penci_soledad_recipe_customizer' );

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 *
 * @return string default value if type is not exists
 */
function penci_recipe_sanitize_checkbox_field( $input ) {
	if ( $input == 1 ) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Customize colors
 * @since 3.0
 */
function penci_recipe_customizer_css() {
	?>
	<style type="text/css">
		<?php if(get_theme_mod( 'penci_recipe_border_color' )) : ?>.penci-recipe, .penci-recipe-heading, .penci-recipe-ingredients, .penci-recipe-notes { border-color:<?php echo get_theme_mod( 'penci_recipe_border_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_title_color' )) : ?>.post-entry .penci-recipe-heading h2 { color:<?php echo get_theme_mod( 'penci_recipe_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_print_button' )) : ?>.post-entry .penci-recipe-heading a.penci-recipe-print { color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; } .post-entry .penci-recipe-heading a.penci-recipe-print { border-color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; } .post-entry .penci-recipe-heading a.penci-recipe-print:hover { background-color:<?php echo get_theme_mod( 'penci_recipe_print_button' ); ?>; } .post-entry .penci-recipe-heading a.penci-recipe-print:hover { color:#fff; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_icon_color' )) : ?>.penci-recipe-heading .penci-recipe-meta span i { color:<?php echo get_theme_mod( 'penci_recipe_meta_icon_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_meta_color' )) : ?>.penci-recipe-heading .penci-recipe-meta { color:<?php echo get_theme_mod( 'penci_recipe_meta_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_section_title_color' )) : ?>.post-entry .penci-recipe-title { color:<?php echo get_theme_mod( 'penci_recipe_section_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_note_title_color' )) : ?>.post-entry .penci-recipe-notes .penci-recipe-title { color:<?php echo get_theme_mod( 'penci_recipe_note_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'penci_recipe_note_color' )) : ?>.post-entry .penci-recipe-notes, .post-entry .penci-recipe-notes p { color:<?php echo get_theme_mod( 'penci_recipe_note_color' ); ?>; }<?php endif; ?>
	</style>
<?php
}
add_action( 'wp_head', 'penci_recipe_customizer_css' );