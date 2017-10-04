<?php
/**
 * Hook to create meta box in categories edit screen
 *
 * @since 1.0
 */

// Create markup
if ( ! function_exists( 'penci_category_fields_meta' ) ) {
	add_action( 'edit_category_form_fields', 'penci_category_fields_meta' );
	function penci_category_fields_meta( $tag ) {
		$t_id             = $tag->term_id;
		$penci_categories = get_option( "category_$t_id" );
		$mag_layout = isset( $penci_categories['mag_layout'] ) ? $penci_categories['mag_layout'] : 'style-1';
		$mag_ads = isset( $penci_categories['mag_ads'] ) ? $penci_categories['mag_ads'] : '';
		$cat_layout = isset( $penci_categories['cat_layout'] ) ? $penci_categories['cat_layout'] : '';
		?>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="cat_layout"><?php esc_html_e( 'Select Layout For This Category', 'soledad' ); ?></label>
			</th>
			<td>
				<select name="penci_categories[cat_layout]" id="penci_categories[cat_layout]">
					<option value="" <?php selected( $cat_layout, '' ); ?>>None</option>
					<option value="standard" <?php selected( $cat_layout, 'standard' ); ?>>Standard Posts</option>
					<option value="classic" <?php selected( $cat_layout, 'classic' ); ?>>Classic Posts</option>
					<option value="overlay" <?php selected( $cat_layout, 'overlay' ); ?>>Overlay Posts</option>
					<option value="grid" <?php selected( $cat_layout, 'grid' ); ?>>Grid Posts</option>
					<option value="grid-2" <?php selected( $cat_layout, 'grid-2' ); ?>>Grid 2 Columns Posts</option>
					<option value="masonry" <?php selected( $cat_layout, 'masonry' ); ?>>Grid Masonry Posts</option>
					<option value="masonry-2" <?php selected( $cat_layout, 'masonry-2' ); ?>>Grid Masonry 2 Columns Posts</option>
					<option value="list" <?php selected( $cat_layout, 'list' ); ?>>List Posts</option>
					<option value="boxed-1" <?php selected( $cat_layout, 'boxed-1' ); ?>>Boxed Posts Style 1</option>
					<option value="boxed-2" <?php selected( $cat_layout, 'boxed-2' ); ?>>Boxed Posts Style 2</option>
					<option value="mixed" <?php selected( $cat_layout, 'mixed' ); ?>>Mixed Posts</option>
					<option value="mixed-2" <?php selected( $cat_layout, 'mixed-2' ); ?>>Mixed Posts Style 2</option>
					<option value="photography" <?php selected( $cat_layout, 'photography' ); ?>>Photography Posts</option>
					<option value="standard-grid" <?php selected( $cat_layout, 'standard-grid' ); ?>>1st Standard Then Grid</option>
					<option value="standard-grid-2" <?php selected( $cat_layout, 'standard-grid-2' ); ?>>1st Standard Then Grid 2 Columns</option>
					<option value="standard-list" <?php selected( $cat_layout, 'standard-list' ); ?>>1st Standard Then List</option>
					<option value="standard-boxed-1" <?php selected( $cat_layout, 'standard-boxed-1' ); ?>>1st Standard Then Boxed</option>
					<option value="classic-grid" <?php selected( $cat_layout, 'classic-grid' ); ?>>1st Classic Then Grid</option>
					<option value="classic-grid-2" <?php selected( $cat_layout, 'classic-grid-2' ); ?>>1st Classic Then Grid 2 Columns</option>
					<option value="classic-list" <?php selected( $cat_layout, 'classic-list' ); ?>>1st Classic Then List</option>
					<option value="classic-boxed-1" <?php selected( $cat_layout, 'classic-boxed-1' ); ?>>1st Classic Then Boxed</option>
					<option value="overlay-grid" <?php selected( $cat_layout, 'overlay-grid' ); ?>>1st Overlay Then Grid</option>
					<option value="overlay-list" <?php selected( $cat_layout, 'overlay-list' ); ?>>1st Overlay Then List</option>
				</select>
				<p class="description">This option will override with layout you selected on General Options > Archive Layout</p>
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="mag_layout"><?php esc_html_e( 'Select Featured Layout for Magazine Layout', 'soledad' ); ?></label>
			</th>
			<td>
				<select name="penci_categories[mag_layout]" id="penci_categories[mag_layout]">
					<option value="style-1" <?php selected( $mag_layout, 'style-1' );?>><?php esc_html_e( 'Style 1 - 1st Post Grid Featured on Left', 'soledad' ); ?></option>
					<option value="style-2" <?php selected( $mag_layout, 'style-2' );?>><?php esc_html_e( 'Style 2 - 1st Post Grid Featured on Top', 'soledad' ); ?></option>
					<option value="style-3" <?php selected( $mag_layout, 'style-3' );?>><?php esc_html_e( 'Style 3 - Text Overlay', 'soledad' ); ?></option>
					<option value="style-4" <?php selected( $mag_layout, 'style-4' );?>><?php esc_html_e( 'Style 4 - Single Slider', 'soledad' ); ?></option>
					<option value="style-5" <?php selected( $mag_layout, 'style-5' );?>><?php esc_html_e( 'Style 5 - Slider 2 Columns', 'soledad' ); ?></option>
					<option value="style-6" <?php selected( $mag_layout, 'style-6' );?>><?php esc_html_e( 'Style 6 - 1st Post List Featured on Top', 'soledad' ); ?></option>
					<option value="style-7" <?php selected( $mag_layout, 'style-7' );?>><?php esc_html_e( 'Style 7 - Grid Layout', 'soledad' ); ?></option>
					<option value="style-8" <?php selected( $mag_layout, 'style-8' );?>><?php esc_html_e( 'Style 8 - List Layout', 'soledad' ); ?></option>
				</select>
				<p class="description">When you chose HomePage layout is Magazine Layout, this options for change featured layout for categories display featured</p>
			</td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top">
				<label for="mag_ads"><?php esc_html_e( 'Add Google Adsense Code/Custom HTML below this category', 'soledad' ); ?></label>
			</th>
			<td>
				<textarea name="penci_categories[mag_ads]" id="penci_categories[mag_ads]" rows="5" cols="50"><?php echo stripslashes( $mag_ads ); ?></textarea>
				<p class="description"><?php esc_html_e( 'Note: If you are using featured layout style 2, you should not use google adsense code here', 'soledad' ); ?></p>
			</td>
		</tr>
	<?php
	}
}

// Save data
if ( ! function_exists( 'penci_save_category_fileds_meta' ) ) {
	add_action( 'edited_category', 'penci_save_category_fileds_meta' );
	function penci_save_category_fileds_meta( $term_id ) {
		if ( isset( $_POST['penci_categories'] ) ) {
			$t_id             = $term_id;
			$penci_categories = get_option( "category_$t_id" );
			$cat_keys         = array_keys( $_POST['penci_categories'] );
			foreach ( $cat_keys as $key ) {
				if ( isset( $_POST['penci_categories'][$key] ) ) {
					$penci_categories[$key] = $_POST['penci_categories'][$key];
				}
			}
			//save the option array
			update_option( "category_$t_id", $penci_categories );
		}
	}
}