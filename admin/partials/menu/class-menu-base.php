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


require_once plugin_dir_path( dirname( __FILE__ ) ) . 'lib/wp-list-table.class.php';

if ( ! class_exists( 'MenuBaseSetup' ) ) {
	class MenuBaseSetup {
		/**
		 * Menu page function callback
		 *
		 * @return void
		 */
		
		public function slate_wpap_menu_page() {

			global $wpdb;
	
			$table = new Custom_List_Table();
			$table->prepare_items();
	
			$message = '';
	
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


		public function slate_wpap_sub_menu_page_templates() {

			global $wpdb;
			$table = new Custom_List_Table();
			$table->prepare_items();

			$message = '';


			if( isset( $_GET['template'] ) && ( $_GET['template'] == 'create' ) ){
				$this->template_lister_button();
			}else{
				include_once plugin_dir_path( dirname( __FILE__ ) ) . '../views/page.php';
			}
		}
	
		/**
		 * Update setting
		 *
		 * @return [type] [description]
		 */
		public function update_setting() {
	
		}
	
		/**
		 * Update setting
		 *
		 * @return [type] [description]
		 */
		public function update_template() {
			
		}
	
		public function template_lister_button() {
			?>
			<div class="wrap">
				<h1 class="wp-heading-inline"><?php _e( 'Templates', 'slatewpap-template' ); ?><a class="add-new-h2" href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=templates' ); ?>"><?php _e( 'back to list', 'slatewpap-template' ); ?></a></h1>
				<hr class="wp-header-end">
				<form id="editor_template" method="POST">
					<div class="metabox-holder" id="poststuff">
						<div id="post-body">
							<div id="post-body-content">
								<div class="normal-sortables">
								<div id="persons_form_meta_box" class="postbox">
									<div class="postbox-header">
										<h2 class="hndle">Create Template</h2>
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
														<label for="title"><?php _e( 'Template Title', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<input id="template_title" name="title_template" type="text" style="width: 50%" value="<?php echo esc_attr( $title ); ?>" class="code" placeholder="<?php _e( 'Template Title', 'slatewpap-template' ); ?>">
													</td>
												</tr>
												<tr class="form-field">
													<th valign="top" scope="row">
														<label for="content"><?php _e( 'Template Description', 'slatewpap-template' ); ?></label>
													</th>
													<td>
														<input id="template_description" name="description_template" type="text" style="width: 70%" value="<?php echo esc_attr( $title ); ?>" class="code" placeholder="<?php _e( 'Template Description', 'slatewpap-template' ); ?>">
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
}
}