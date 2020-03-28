<?php

/**
 * Adding Image Field
 * @return void 
 */
function sunipoon_category_add_image( $term ) {
	
	?>
	<div class="form-field">
		<label for="taxImage"><?php _e( 'Image URL:', 'sunipoon' ); ?></label>

		<input type="text" name="taxImage" id="taxImage" value="Paste your image link here...">
        <p class="description">Upload image(2400 x 1600) using Media (Dashboard -> Media) and copy image url from there.</p>
	</div>
<?php
}
add_action( 'category_add_form_fields', 'sunipoon_category_add_image', 10, 2 );

/**
 * Edit Image Field
 * @return void 
 */
function sunipoon_category_edit_image( $term ) {
	
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	$term_image = get_term_meta( $t_id, 'image', true ); 
	?>
	<tr class="form-field">
		<th><label for="taxImage"><?php _e( 'Image URL:', 'sunipoon' ); ?></label></th>
		 
		<td>	 
			<input type="text" name="taxImage" id="taxImage" value="<?php echo esc_attr( $term_image ) ? esc_attr( $term_image ) : 'Paste your image link here...'; ?>">
            <p class="description">Upload image(2400 x 1600) using Media (Dashboard -> Media) and copy image url from there.</p>
		</td>
	</tr>
<?php
}
add_action( 'category_edit_form_fields', 'sunipoon_category_edit_image', 10 );

/**
 * Saving Image
 */
function sunipoon_category_save_image( $term_id ) {
	
	if ( isset( $_POST['taxImage'] ) ) {
		$term_image = $_POST['taxImage'];
		if( $term_image ) {
			 update_term_meta( $term_id, 'image', $term_image );
		}

	} 
		
}  
add_action( 'edited_category', 'sunipoon_category_save_image' );  
add_action( 'create_category', 'sunipoon_category_save_image' );