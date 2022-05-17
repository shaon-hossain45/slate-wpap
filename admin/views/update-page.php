<?php

/**
 * PART 4. Form for adding andor editing row
 * ============================================================================
 *
 * In this part you are going to add admin page for adding andor editing items
 * You cant put all form into this function, but in this example form will
 * be placed into meta box, and if you want you can split your form into
 * as many meta boxes as you want
 *
 * http://codex.wordpress.org/Data_Validation
 * http://codex.wordpress.org/Function_Reference/selected
 */

?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Templates', 'slatewpap-template' ); ?><a class="add-new-h2 itech-headline" href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=templates' ); ?>"><?php _e( 'back to list', 'slatewpap-template' ); ?></a></h1>
	<form id="editor_form" method="POST">
		<input type="hidden" name="ID" value="<?php echo esc_attr( $address->ID ); ?>"/>	
		<div class="metabox-holder" id="poststuff">
			<div id="post-body">
				<div id="post-body-content">
					<?php
					global $wpdb;
					$table_name = $wpdb->prefix . 'templates';
					if ( isset( $_REQUEST['id'] ) ) {
						$item = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE ID = %d", $_REQUEST['id'] ), ARRAY_A );
						if ( $item ) {
							?>
					<div class="normal-sortables">
					<div id="persons_form_meta_box" class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">Templates Data</h2>
						</div>
						<div class="inside">
							<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
								<tbody>
								<tr class="form-field">
										<th valign="top" scope="row">
											<label for="name"><?php _e( 'Templates Title', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<input id="templates_name" name="templates_name" type="text" style="width: 95%" value="<?php echo esc_attr( $item['templates_name'] ); ?>" class="code" placeholder="<?php _e( 'Templates Name', 'slatewpap-template' ); ?>">
										</td>
									</tr>
									<tr class="form-field">
										<th valign="top" scope="row">
											<label for="email"><?php _e( 'Templates Description', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<input id="templates_description" name="templates_description" type="text" style="width: 95%" value="<?php echo esc_attr( $item['templates_description'] ); ?>" class="code" placeholder="<?php _e( 'Templates Description', 'slatewpap-template' ); ?>">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<input type="submit" value="<?php _e( 'Save', 'slatewpap-template' ); ?>" id="submit" class="button-primary" name="submit">
				</div>
						<?php } else { ?>
							<div class="normal-sortables">
					<div id="persons_form_meta_box" class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">template Data</h2>
						</div>
						<div style="border-left: 4px solid red;">
							<table cellspacing="2" cellpadding="5" style="width: 100%; margin-bottom: .5em;" class="form-table">
								<tbody>
									<tr class="form-field">
										<td>template item not found.</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
							<?php
						}
					};
					?>
				</div>
			</div>
		</div>
	</form>
</div>
