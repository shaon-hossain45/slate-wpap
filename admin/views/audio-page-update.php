<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/admin/views
 */
?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php _e( 'Audios', 'slatewpap-template' ); ?><a class="add-new-h2" href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=audios' ); ?>"><?php _e( 'Back to audios', 'slatewpap-template' ); ?></a></h1>
	<hr class="wp-header-end">
	<form id="update_audio" method="POST" enctype="multipart/form-data">
	<input type="hidden" value="<?php echo esc_html($_REQUEST['id']); ?>" name="ID">
		<div class="metabox-holder" id="poststuff">
			<div id="post-body">
				<div id="post-body-content">
					<div class="normal-sortables">
					<div id="audio_form_meta_box" class="postbox">
						<div class="postbox-header">
							<h2 class="hndle">Edit Audio</h2>
						</div>
						<?php
                            global $wpdb;
                            $table_name = $wpdb->prefix . 'wpapaudios'; // do not forget about tables prefix

                            if ( isset( $_REQUEST['id'] ) ) {
                                $item = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE ID = %d", $_REQUEST['id'] ), ARRAY_A );
                                if ( $item ) {
                            
                        if ( ! empty( $item['audio_name'] ) ) {
                            $title = $item['audio_name'];
                        } else {
                            $title = '';
                        }

                        if ( ! empty( $item['audio_description'] ) ) {
                            $content = $item['audio_description'];
                        } else {
                            $content = '';
                        }

						if ( ! empty( $item['audio_file'] ) ) {
                            $filepath = $item['audio_file'];
                        } else {
                            $filepath = '';
                        }
						if ( ! empty( $item['audio_filep1'] ) ) {
                            $filepath1 = $item['audio_filep1'];
                        } else {
                            $filepath1 = '';
                        }
						if ( ! empty( $item['audio_filep2'] ) ) {
                            $filepath2 = $item['audio_filep2'];
                        } else {
                            $filepath2 = '';
                        }
						if ( ! empty( $item['audio_filep3'] ) ) {
                            $filepath3 = $item['audio_filep3'];
                        } else {
                            $filepath3 = '';
                        }

						if ( ! empty( $item['audio_prounpro'] ) ) {
                            $prounpro = $item['audio_prounpro'];
                        } else {
                            $prounpro = '';
                        }

						if ( ! empty( $item['audio_preset'] ) ) {
                            $preset = $item['audio_preset'];
                        } else {
                            $preset = '';
                        }


						if ( ! empty( $item['template'] ) ) {
                            $template = $item['template'];
                        } else {
                            $template = '';
                        }

                        ?>
						<div class="inside">
							<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
								<tbody>
								<tr class="form-field">
										<th valign="top" scope="row">
											<label for="title"><?php _e( 'Audio Name', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<input id="audio_title" name="audio_title" type="text" style="width: 50%" value="<?php echo esc_attr( $title ); ?>" class="code" placeholder="<?php _e( 'Audio Name', 'slatewpap-template' ); ?>">
										</td>
									</tr>
									<tr class="form-field">
										<th valign="top" scope="row">
											<label for="content"><?php _e( 'Audio Description', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<input id="audio_description" name="audio_description" type="text" style="width: 70%" value="<?php echo esc_attr( $content ); ?>" class="code" placeholder="<?php _e( 'Audio Description', 'slatewpap-template' ); ?>">
										</td>
									</tr>
									<tr class="form-field">
										<th valign="top" scope="row">
											<label for="content"><?php _e( 'Select Template', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<select id="audio_template" name="audio_template">
											<option value="">Select Template</option>
											<?php
											global $wpdb;
											$table_name = $wpdb->prefix . 'wpaptemplates'; // do not forget about tables prefix
											$results = $wpdb->get_results("SELECT * FROM $table_name");

											if(!empty($results)){
												foreach( $results as $result ) {

													if($template == $result->ID){ $outselect ="selected";}
												
												echo '<option value="'.$result->ID.'"'.$outselect.'>'.$result->template_title.'</option>';
												
												}
											}
											?>
											</select>
										</td>
									</tr>
									<tr class="form-field">
										<th valign="top" scope="row">
											<label for="content"><?php _e( 'Processed / Unprocessed', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<select id="audio_proorunpro" name="audio_proorunpro">
											<option value="">Select Type</option>
												<option value="processed" <?php if($prounpro == "processed"){ echo "selected";}; ?>>Processed</option>
												<option value="unprocessed" <?php if($prounpro == "unprocessed"){ echo "selected";}; ?>>Unprocessed</option>
											</select>
										</td>
									</tr>
									<tr class="form-field p12 hidden">
										<th valign="top" scope="row">
											<label for="content"><?php _e( 'Preset', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<select id="audio_preset" name="audio_preset">
											<option value="0">Select Preset</option>
												<option value="p1" <?php if($preset == "p1"){ echo "selected";}; ?>>1</option>
												<option value="p2" <?php if($preset == "p2"){ echo "selected";}; ?>>2</option>
												<option value="p3" <?php if($preset == "p3"){ echo "selected";}; ?>>3</option>
											</select>
										</td>
									</tr>
									<tr class="form-field p123 hidden" data-pid="p1">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Audio File Upload Preset 1', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<div class="csf-placeholder">
															<input type="text" name="prefix_custom_options1" id="meta-image1" value="<?php echo esc_url($filepath1)?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-1" placeholder="Not selected" style="width: 25%;">
															<a class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
															<a class="button button-secondary csf-warning-primary csf--remove hidden">Remove</a>
														</div>
													</td>
												</tr>
												<tr class="form-field p123 hidden" data-pid="p2">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Audio File Upload Preset 2', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<div class="csf-placeholder">
															<input type="text" name="prefix_custom_options2" id="meta-image2" value="<?php echo esc_url($filepath2)?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-1" placeholder="Not selected" style="width: 25%;">
															<a class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
															<a class="button button-secondary csf-warning-primary csf--remove hidden">Remove</a>
														</div>
													</td>
												</tr>
												<tr class="form-field p123 hidden" data-pid="p3">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Audio File Upload Preset 3', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<div class="csf-placeholder">
															<input type="text" name="prefix_custom_options3" id="meta-image3" value="<?php echo esc_url($filepath3)?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-1" placeholder="Not selected" style="width: 25%;">
															<a class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
															<a class="button button-secondary csf-warning-primary csf--remove hidden">Remove</a>
														</div>
													</td>
												</tr>
									<tr class="form-field p1234 hidden">
										<th valign="top" scope="row">
											<label for="content"><?php _e( 'Audio File Upload', 'slatewpap-template' ); ?></label>
										</th>
										<td>
											<div class="csf-placeholder">
												<input type="text" name="prefix_custom_options" id="meta-image" value="<?php echo esc_url($filepath)?>" class="csf--url" readonly="readonly" data-depend-id="opt-media-1" placeholder="Not selected" style="width: 25%;">
												<a class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
												<a class="button button-secondary csf-warning-primary csf--remove hidden">Remove</a>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<?php }
					};?>
					</div>
					<input type="submit" value="<?php _e( 'Save Audio Data', 'slatewpap-template' ); ?>" class="button-primary" name="audio_submit">
				</div>
				</div>
			</div>
		</div>
	</form>
</div>