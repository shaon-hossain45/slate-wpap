<?php

/**
 * Provide a admin area view for the plugin
 *
 * @link       https://github.com/shaon-hossain45/
 * @since      1.0.0
 *
 * @package    Slate_Wpap
 * @subpackage Slate_Wpap/admin/partials
 */


require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/wp-list-table-template.class.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/wp-list-table-audio.class.php';
require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/wp-list-table-shortcode.class.php';

if ( ! class_exists( 'MenuBaseSetup' ) ) {
	class MenuBaseSetup {

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string $plugin_name       The name of this plugin.
	 * @param      string $version    The version of this plugin.
	 */
		public function __construct( ) {

			add_action( 'admin_post_template_insert_setting', array( $this, 'template_insert_setting' ) );
			add_action( 'admin_post_nopriv_template_insert_setting', array( $this, 'template_insert_setting' ) );

			add_action( 'admin_post_template_update_setting', array( $this, 'template_update_setting' ) );
			add_action( 'admin_post_nopriv_template_update_setting', array( $this, 'template_update_setting' ) );

			add_action( 'admin_post_audio_insert_setting', array( $this, 'audio_insert_setting' ) );
			add_action( 'admin_post_nopriv_audio_insert_setting', array( $this, 'audio_insert_setting' ) );

			add_action( 'admin_post_audio_update_setting', array( $this, 'audio_update_setting' ) );
			add_action( 'admin_post_nopriv_audio_update_setting', array( $this, 'audio_update_setting' ) );

		}

		/**
		 * Menu page function callback
		 *
		 * @return void
		 */
		public function slate_wpap_menu_page() {

			// global $wpdb;
	
			// $table = new Custom_List_Table_Template();
			// $table->prepare_items();
	
			// $message = '';
	
			// if ( isset( $_GET['action'] ) && ( $_GET['action'] == 'edit' ) ) {
			// 	//$address = wd_ac_get_address( $_GET['id'] );
			// 	// Include the edit markup.
			// 	//include plugin_dir_path( dirname( __FILE__ ) ) . 'views/update-page.php';
			// }else if( isset( $_GET['action'] ) && ( $_GET['template'] == 'create' ) ){
			// 	echo "create";
			// } else {
			// 	// Include the view markup.
			// 	//include plugin_dir_path( dirname( __FILE__ ) ) . 'views/page.php';
			// }
		}

		/**
		 * Template sub menu page
		 *
		 * @return [type] [description]
		 */
		public function slate_wpap_sub_menu_page_templates() {

			global $wpdb;
			$table = new Custom_List_Table_Template();
			$table->prepare_items();

			$message = '';


			if( isset( $_GET['template'] ) && ( $_GET['template'] == 'create' ) ){
				$this->template_lister_create();
			}else if( isset( $_GET['action'] ) && ( $_GET['action'] == 'edit' ) ){
				include plugin_dir_path( dirname( __FILE__ ) ) . '../views/template-update-page.php';
			}else{
				include_once plugin_dir_path( dirname( __FILE__ ) ) . '../views/template-page.php';
			}
		}

	
		public function template_lister_create() {
			?>
			<div class="wrap">
				<h1 class="wp-heading-inline"><?php _e( 'Templates', 'slatewpap-template' ); ?><a class="add-new-h2" href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=templates' ); ?>"><?php _e( 'Back to templates', 'slatewpap-template' ); ?></a></h1>
				<hr class="wp-header-end">
				<form id="editor_template" method="POST">
					<div class="metabox-holder" id="templatestuff">
						<div id="post-body">
							<div id="post-body-content">
								<div class="normal-sortables">
								<div id="template_form_meta_box" class="postbox">
									<div class="postbox-header">
										<h2 class="hndle">Create Template</h2>
									</div>
									<div class="inside">
										<table cellspacing="2" cellpadding="5" style="width: 100%;" class="form-table">
											<tbody>
											<tr class="form-field">
													<th valign="top" scope="row">
														<label for="title"><?php _e( 'Template Title', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<input id="template_title" name="template_title" type="text" style="width: 50%" value="" class="code" placeholder="<?php _e( 'Template Title', 'slatewpap-template' ); ?>">
													</td>
												</tr>
												<tr class="form-field">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Template Description', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<input id="template_description" name="template_description" type="text" style="width: 70%" value="" class="code" placeholder="<?php _e( 'Template Description', 'slatewpap-template' ); ?>">
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<input type="submit" value="<?php _e( 'Save Template Data', 'slatewpap-template' ); ?>" class="button-primary" name="template_submit">
							</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
		}

	/**
	 * Template insert setting
	 *
	 * @return [type] [description]
	 */
	public function template_insert_setting() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'wpaptemplates'; // do not forget about tables prefix

		// this is default $item which will be used for new records

		// here we are verifying does this request is post back and have correct nonce
		if ( isset( $_POST ) && wp_verify_nonce( $_POST['security'], 'ntter_template' ) ) {

		// String to array
		parse_str( $_POST['value'], $itechArray );

		//$last_db_id = $wpdb->get_var( $wpdb->prepare( "SELECT * FROM $table_name ORDER BY ID DESC LIMIT 1" ) );
		//var_dump($last_db_id);
//if($last_db_id == NULL){
	//$last_db_id = "0";
//}


// $get_id = $wpdb->get_row(SELECT AUTO_INCREMENT
// FROM information_schema.TABLES
// WHERE TABLE_SCHEMA = "yourDatabaseName"
// AND TABLE_NAME = "yourTableName");
// $last_id = $get_id>Auto_increment;
// $next_id = $last_id + 1;
//[template label="'.$last_db_id.'"]


//var_dump($get_id);

//$last_db_id = get_option( 'last_template_id' )+1;


		// combine our default item with request params
		// Collect data from - form request array
			$items = array(
				//'ID'               => $itechArray['ID'],
				'template_title'  => $itechArray['template_title'],
				'template_description' => $itechArray['template_description'],
				'template_shortcode' => '',
				// 'created' => '22nd February, 2021'
			);

		// validate data, and if all ok save item to database
		// if id is zero insert otherwise update
			$response = array();
				$result = $wpdb->insert($table_name, $items);

				$lastid = $wpdb->insert_id;

				if ( $result ) {

					if ( !empty($lastid) || !is_null($lastid) ) {
						//$item = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE ID = %d", $lastid ), ARRAY_A );
						//if ( $item ) {
							$items = array(
								//'ID'               => $itechArray['ID'],
								//'template_title'  => $itechArray['template_title'],
								//'template_description' => $itechArray['template_description'],
								'template_shortcode' => '[shortcode label="'.$lastid.'"]',
								// 'created' => '22nd February, 2021'
							);

							$where = array(
								'ID'	=> $lastid
							);
							$result_update = $wpdb->update( $table_name, $items, $where);
						//}
					}
					//update_option( 'last_template_id', $lastid );

					add_flash_notice( __( 'Template item updated.' ), 'success', true );
					$response['updated'] = 'success';
					$response['url']     = admin_url( 'admin.php?page=templates&updated=true' );
				} else {
					add_flash_notice( __( 'There was an error while updating item [Need something modify data]' ), 'error', true );
					$response['url'] = admin_url( 'admin.php?page=templates&action=edit&id=' . $itechArray['ID'] );
				}
			

				$return_success = array(
					'exists' => $response,
				);
				wp_send_json_success( $return_success );
		}
	}


	/**
	 * Template update setting
	 *
	 * @return [type] [description]
	 */
public function template_update_setting(){
	global $wpdb;
	$table_name = $wpdb->prefix . 'wpaptemplates'; // do not forget about tables prefix

	// this is default $item which will be used for new records

	// here we are verifying does this request is post back and have correct nonce
	if ( isset( $_POST ) && wp_verify_nonce( $_POST['security'], 'ntterupd_template' ) ) {

	// String to array
	parse_str( $_POST['value'], $itechArray );

	// combine our default item with request params
	// Collect data from - form request array
		$items = array(
			// 'ID'               => $itechArray['ID'],
			'template_title'  => $itechArray['template_title'],
			'template_description' => $itechArray['template_description'],
			// 'IP' => '::1',
			// 'created' => '22nd February, 2021'
		);

	// validate data, and if all ok save item to database
	// if id is zero insert otherwise update
		$response = array();

			$where = array(
				'ID'	=> $itechArray['ID']
			);
			$result = $wpdb->update( $table_name, $items, $where);

			if ( $result ) {
				add_flash_notice( __( 'Template item updated.' ), 'success', true );
				$response['updated'] = 'success';
				$response['url']     = admin_url( 'admin.php?page=templates&updated=true' );
			} else {
				add_flash_notice( __( 'There was an error while updating item [Need something modify data]' ), 'error', true );
				$response['url'] = admin_url( 'admin.php?page=templates&action=edit&id=' . $itechArray['ID'] );
			}
		

			$return_success = array(
				'exists' => $response,
			);
			wp_send_json_success( $return_success );
	}
}






		/**
		 * Audio sub menu page
		 *
		 * @return [type] [description]
		 */

		public function slate_wpap_sub_menu_page_audio() {
			
			global $wpdb;
			$table = new Custom_List_Table_Audio();
			$table->prepare_items();

			$message = '';


			if( isset( $_GET['audio'] ) && ( $_GET['audio'] == 'create' ) ){
				$this->audio_lister_button();
			}else if( isset( $_GET['action'] ) && ( $_GET['action'] == 'edit' ) ){
				include_once plugin_dir_path( dirname( __FILE__ ) ) . '../views/audio-page-update.php';
			}else{
				include_once plugin_dir_path( dirname( __FILE__ ) ) . '../views/audio-page.php';
			}
		}


		public function audio_lister_button() {
			?>
			<div class="wrap">
				<h1 class="wp-heading-inline"><?php _e( 'Audios', 'slatewpap-template' ); ?><a class="add-new-h2" href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=audios' ); ?>"><?php _e( 'Back to audios', 'slatewpap-template' ); ?></a></h1>
				<hr class="wp-header-end">
				<form id="editor_audio" method="POST" enctype="multipart/form-data">
					<div class="metabox-holder" id="poststuff">
						<div id="post-body">
							<div id="post-body-content">
								<div class="normal-sortables">
								<div id="audio_form_meta_box" class="postbox">
									<div class="postbox-header">
										<h2 class="hndle">Create Audio</h2>
									</div>
									<?php
										$options = get_option( 'description_template_store' );
									if ( ! empty( $options['description_template_title'] ) ) {
										$title = $options['description_template_title'];
									} else {
										$title = '';
									}
	
									if ( ! empty( $options['description_template_content'] ) ) {
										$content = $options['description_template_content'];
									} else {
										$content = '';
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
														<input id="audio_description" name="audio_description" type="text" style="width: 70%" value="<?php echo esc_attr( $title ); ?>" class="code" placeholder="<?php _e( 'Audio Description', 'slatewpap-template' ); ?>">
													</td>
												</tr>
												<tr class="form-field">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Processed / Unprocessed', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<select id="audio_proorunpro" name="audio_proorunpro">
														<option value="" selected>Select Type</option>
															<option value="processed">Processed</option>
															<option value="unprocessed">Unprocessed</option>
														</select>
													</td>
												</tr>
												<tr class="form-field">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Preset', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<select id="audio_preset" name="audio_preset">
														<option value="" selected>Select Preset</option>
															<option value="1">1</option>
															<option value="2">2</option>
															<option value="3">3</option>
														</select>
													</td>
												</tr>
												<tr class="form-field">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Select Template', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<select id="audio_template" name="audio_template">
														<option value="" selected>Select Template</option>
														<?php
														global $wpdb;
														$table_name = $wpdb->prefix . 'wpaptemplates'; // do not forget about tables prefix
														$results = $wpdb->get_results("SELECT * FROM $table_name");
														if(!empty($results)){
															foreach( $results as $result ) {
															
															echo '<option value="'.$result->ID.'">'.$result->template_title.'</option>';
															
															}
														}
														?>
														</select>
													</td>
												</tr>
												<tr class="form-field">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Audio File Upload', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<div class="csf-placeholder">
															<input type="text" name="prefix_custom_options" id="meta-image" value="" class="csf--url" readonly="readonly" data-depend-id="opt-media-1" placeholder="Not selected" style="width: 25%;">
															<a class="button button-primary csf--button" data-library="" data-preview-size="thumbnail">Upload</a>
															<a class="button button-secondary csf-warning-primary csf--remove hidden">Remove</a>
														</div>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<input type="submit" value="<?php _e( 'Save Audio Data', 'slatewpap-template' ); ?>" class="button-primary" name="audio_submit">
							</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<?php
		}


	/**
	 * Audio insert setting
	 *
	 * @return [type] [description]
	 */
	public function audio_insert_setting() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'wpapaudios'; // do not forget about tables prefix

		// this is default $item which will be used for new records

		// here we are verifying does this request is post back and have correct nonce
		if ( isset( $_POST ) && wp_verify_nonce( $_POST['security'], 'nt55ter_audio' ) ) {
			//var_dump($_POST['value']);
		// String to array
		parse_str( $_POST['value'], $itechArray );

		// combine our default item with request params
		// Collect data from - form request array
			$items = array(
				//'ID'               => $itechArray['ID'],
				'audio_name'  => $itechArray['audio_title'],
				'audio_description' => $itechArray['audio_description'],
				'audio_prounpro' => $itechArray['audio_proorunpro'],
				'audio_preset' => $itechArray['audio_preset'],
				'template' => $itechArray['audio_template'],
				'audio_file' => $itechArray['prefix_custom_options']
			);

		// validate data, and if all ok save item to database
		// if id is zero insert otherwise update
			$response = array();
				$result = $wpdb->insert($table_name, $items);

				if ( $result ) {
					add_flash_notice( __( 'Audio item updated.' ), 'success', true );
					$response['updated'] = 'success';
					$response['url']     = admin_url( 'admin.php?page=audios&updated=true' );
				} else {
					add_flash_notice( __( 'There was an error while updating item [Need something modify data]' ), 'error', true );
					$response['url'] = admin_url( 'admin.php?page=audios&action=edit&id=' . $itechArray['ID'] );
				}
			

				$return_success = array(
					'exists' => $response,
				);
				wp_send_json_success( $return_success );
		}
	}


	/**
	 * Audio update setting
	 *
	 * @return [type] [description]
	 */
	public function audio_update_setting() {

		global $wpdb;
		$table_name = $wpdb->prefix . 'wpapaudios'; // do not forget about tables prefix

		// this is default $item which will be used for new records


		//var_dump($_POST['value']);
		// here we are verifying does this request is post back and have correct nonce
		if ( isset( $_POST ) && wp_verify_nonce( $_POST['security'], 'ntte5555r_audio' ) ) {

		// String to array
		parse_str( $_POST['value'], $itechArray );

		// combine our default item with request params
		// Collect data from - form request array
			$items = array(
				//'ID'               => $itechArray['ID'],
				'audio_name'  => $itechArray['audio_title'],
				'audio_description' => $itechArray['audio_description'],
				'audio_prounpro' => $itechArray['audio_proorunpro'],
				'audio_preset' => $itechArray['audio_preset'],
				'template' => $itechArray['audio_template'],
				'audio_file' => $itechArray['prefix_custom_options']
			);

		// validate data, and if all ok save item to database
		// if id is zero insert otherwise update
			$response = array();
				$where = array(
				'ID'	=> $itechArray['ID']
			);
			$result = $wpdb->update( $table_name, $items, $where);

				if ( $result ) {
					add_flash_notice( __( 'Audio item updated.' ), 'success', true );
					$response['updated'] = 'success';
					$response['url']     = admin_url( 'admin.php?page=audios&updated=true' );
				} else {
					add_flash_notice( __( 'There was an error while updating item [Need something modify data]' ), 'error', true );
					$response['url'] = admin_url( 'admin.php?page=audios&action=edit&id=' . $itechArray['ID'] );
				}
			

				$return_success = array(
					'exists' => $response,
				);
				wp_send_json_success( $return_success );
		}
	}


	/**
		 * Shortcode sub menu page
		 *
		 * @return [type] [description]
		 */
		public function slate_wpap_sub_menu_page_shortcode() {

			global $wpdb;
			$table = new Custom_List_Table_Shortcode();
			$table->prepare_items();

			$message = '';


			if( isset( $_GET['template'] ) && ( $_GET['template'] == 'create' ) ){
				$this->template_lister_create();
			}else if( isset( $_GET['action'] ) && ( $_GET['action'] == 'edit' ) ){
				include plugin_dir_path( dirname( __FILE__ ) ) . '../views/template-update-page.php';
			}else{
				include_once plugin_dir_path( dirname( __FILE__ ) ) . '../views/template-page.php';
			}
		}

	}
}