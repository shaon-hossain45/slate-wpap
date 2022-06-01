<?php
/**
 * WP List Table
 * ============================================================================
 *
 * In this part you are going to define custom table list class,
 * that will display your database records in nice looking table
 *
 * http://codex.wordpress.org/Class_Reference/WP_List_Table
 * http://wordpress.org/extend/plugins/custom-list-table-example/
 */

if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

/**
 * Extend WP_List_Table
 */
class Custom_List_Table_Audio extends WP_List_Table {

	/**
	 * [REQUIRED] You must declare constructor and give some basic params
	 */
	function __construct() {
		global $status, $page;

		parent::__construct(
			array(
				'singular' => 'wpapaudio',
				'plural'   => 'wpapaudios',
			)
		);
	}

	/**
	 * [REQUIRED] this is a default column renderer
	 *
	 * @param $item - row (key, value array)
	 * @param $column_name - string (key)
	 * @return HTML
	 */
	function column_default( $item, $column_name ) {
		return $item[ $column_name ];
	}

	/**
	 * [OPTIONAL] this is example, how to render specific column
	 *
	 * method name must be like this: "column_[column_name]"
	 *
	 * @param $item - row (key, value array)
	 * @return HTML
	 */
	function column_age( $item ) {
		return '<em>' . $item['age'] . '</em>';
	}

	/**
	 * [OPTIONAL] this is example, how to render column with actions,
	 * when you hover row "Edit | Delete" links showed
	 *
	 * @param $item - row (key, value array)
	 * @return HTML
	 */
	function column_audio_name( $item ) {
		// Build delete row action.
		$delete_query_args = array(
			'page'   => 'audios',
			'action' => 'delete',
			'id'     => $item['ID'],
		);
		$actions           = array(
			'edit'   => sprintf( '<a href="?page=audios&action=edit&id=%s">%s</a>', $item['ID'], __( 'Edit', 'cltd_example' ) ),
			'delete' => sprintf( '<a href="%1$s">%2$s</a>', esc_url( wp_nonce_url( add_query_arg( $delete_query_args, 'admin.php' ), 'deletewpapaudio' ) ), _x( 'Delete', 'List table row action', 'wp-list-table-example' ) ),
		);

		return sprintf(
			'%s %s',
			$item['audio_name'],
			$this->row_actions( $actions )
		);
	}

	/**
	 * [REQUIRED] this is how checkbox column renders
	 *
	 * @param $item - row (key, value array)
	 * @return HTML
	 */
	function column_cb( $item ) {
		return sprintf(
			'<input type="checkbox" name="id[]" value="%s" />',
			$item['ID']
		);
	}

	/**
	 * [REQUIRED] This method return columns to display in table
	 * you can skip columns that you do not want to show
	 * like content, or description
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = array(
			'cb'               => '<input type="checkbox" />', // Render a checkbox instead of text
			'audio_name'  => __( 'Audio Name', 'cltd_example' ),
			'audio_description' => __( 'Audio Description', 'cltd_example' ),
			'audio_prounpro' => __( 'Processed / Unprocessed', 'cltd_example' ),
		);
		return $columns;
	}

	/**
	 * [OPTIONAL] This method return columns that may be used to sort table
	 * all strings in array - is column names
	 * notice that true on name column means that its default sort
	 *
	 * @return array
	 */
	function get_sortable_columns() {
		$sortable_columns = array(
			'audio_name'  => array( 'audio_name', true ),
			'audio_description' => array( 'audio_description', true ),
			'audio_processed_or_unprocessed' => array( 'processed_or_unprocessed', true ),
		);
		return $sortable_columns;
	}

	/**
	 * No items
	 *
	 * @return [type] [description]
	 */
	public function no_items() {
		_e( 'No wpap audio items found.' );
	}
	/**
	 * iTechPublic delete activity
	 */
	public static function itechpublic_delete_activity( $data ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'wpapaudios';
		$results    = $wpdb->delete( $table_name, array( 'ID' => $data ), array( '%d' ) );
	}

	/**
	 * iTechPublic get filter count
	 *
	 * @param  string $data [description]
	 * @return [type]       [description]
	 */
	protected function itechpublic_get_filter_count( $data = '' ) {
		global $wpdb;
		$table_name = $wpdb->prefix . 'wpapaudios';

		if ( $data == 1 ) {
			$results = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM $table_name WHERE audio_name = %d", 1 ) );
		} elseif ( $data == 2 ) {
			$results = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM $table_name WHERE audio_description = %d", 1 ) );
		} else {
			$results = $wpdb->get_var( "SELECT count(*) FROM $table_name" );
		}
		return $results;
	}

		/**
		 * Show SubSub Filter
		 */
	protected function get_views() {
		$views   = array();
		$current = ( ! empty( $_REQUEST['filter'] ) ? $_REQUEST['filter'] : 'all' );

		// All Actions
		$class        = ( $current == 'all' ? ' class="current"' : '' );
		$all_url      = remove_query_arg( array( 'filter', 's', 'paged', 'alert', 'user' ) );
		$views['all'] = "<a href='{$all_url }' {$class} >" . __( 'All', 'cltd_example' ) . ' <span class="count">(' . number_format( $this->itechpublic_get_filter_count() ) . ')</span></a>';
		$views_item   = array(
			'audio_name' => array(
				'name'      => __( 'Audio Name', 'cltd_example' ),
				'status_id' => 1,
			),
			'audio_description' => array(
				'name'      => __( 'Audio Description', 'cltd_example' ),
				'status_id' => 2,
			),
		);
		foreach ( $views_item as $k => $v ) {
			$custom_url  = add_query_arg( 'filter', $k, remove_query_arg( array( 's', 'paged', 'alert' ) ) );
			$class       = ( $current == $k ? ' class="current"' : '' );
			$views[ $k ] = "<a href='{$custom_url}' {$class} >" . $v['name'] . ' <span class="count">(' . number_format( $this->itechpublic_get_filter_count( $v['status_id'] ) ) . ')</span></a>';
		}

		return $views;
	}

	/**
	 * [OPTIONAL] Return array of bult actions if has any
	 *
	 * @return array
	 */
	function get_bulk_actions() {
		$actions = array(
			'bulk-delete'         => 'Delete',
			//'bulk-edit' => 'Edit',
		);
		return $actions;
	}

	/**
	 * Process buk action
	 *
	 * @return [type] [description]
	 */
	public function process_bulk_action() {

		// Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {
			// In our file that handles the request, verify the nonce.
			$nonce = esc_attr( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'deletewpapaudio' ) ) {
				die( 'Go get a life script kiddies' );
			} else {
				self::itechpublic_delete_activity( absint( $_REQUEST['id'] ) );

				add_flash_notice( __( '1 wpapaudio item permanently deleted.' ), 'success', true );
				$redirect_to = admin_url( 'admin.php?page=audios&deleted=true' );
				wp_redirect( $redirect_to );
				exit;
			}
		}

		// If the delete bulk action is triggered
		if ( 'bulk-delete' === $this->current_action() ) {
			$delete_ids = isset( $_REQUEST['id'] ) ? $_REQUEST['id'] : array();
			if ( ! empty( $delete_ids ) ) {
				// loop over the array of record IDs and delete them
				foreach ( $delete_ids as $id ) {
					self::itechpublic_delete_activity( $id );
				}
				// Array required for count
				$counter = count( $_REQUEST['id'] );
				if ( $counter > 1 ) {
					$counter = $counter . ' wpapaudio items';
				} else {
					$counter = $counter . ' wpapaudio item';
				}
				add_flash_notice( __( $counter . ' permanently deleted.' ), 'success', true );
				$redirect_to = admin_url( 'admin.php?page=audios&deleted=true' );
				wp_redirect( $redirect_to );
				exit;
			} else {
				add_flash_notice( __( 'Something wrong.' ), 'error', true );
				$redirect_to = admin_url( 'admin.php?page=audios&deleted=false' );
				wp_redirect( $redirect_to );
				exit;
			}
		}
		if ( 'email_to_template' === $this->current_action() ) {
			$select_ids = isset( $_REQUEST['id'] ) ? $_REQUEST['id'] : array();
			if ( ! empty( $select_ids ) ) {
				// loop over the array of record IDs and delete them
				foreach ( $select_ids as $id ) {
					$this->itechpublic_sub_wp_mail( $id );
				}
			}
		}
	}

	/**
	 * Email verify by WordPress mail
	 *
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	// public function itechpublic_sub_wp_mail( $data ) {
	// 	global $wpdb;
	// 	$table_name       = $wpdb->prefix . 'wpapaudios';
	// 	$template_email = $wpdb->get_var( $wpdb->prepare( "SELECT template_email FROM $table_name WHERE ID = %d", $data ) );
	// 	$site_name        = get_bloginfo( 'name' );
	// 	$options          = get_option( 'email_template_store' );
	// 	$htmltitle        = $options['email_template_title'];
	// 	$htmlcontent      = $options['email_template_content'];

	// 	$subject = sprintf( __( '[%1$s] %2$s' ), $site_name, $htmltitle );
	// 	$headers = array( 'Content-Type: text/html; charset=UTF-8', 'From: iTechPublic <https://itechpublic.com>' );
	// 	$wp_mail = wp_mail( $template_email, $subject, $htmlcontent, $headers );

	// 	if ( ! is_wp_error( $wp_mail ) ) {
	// 		add_flash_notice( __( 'Email sent successfull.' ), 'success', true );
	// 		$redirect_to = admin_url( 'admin.php?page=wpapaudios' );
	// 			wp_redirect( $redirect_to );
	// 			exit;
	// 	}
	// }

	/**
	 * [REQUIRED] This is the most important method
	 *
	 * It will get rows from database and prepare them to be showed in table
	 */
	function prepare_items() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'wpapaudios'; // do not forget about tables prefix

		$per_page = 10; // constant, how much records will be shown per page

		$columns  = $this->get_columns();
		$hidden   = array();
		$sortable = $this->get_sortable_columns();

		// here we configure table headers, defined in our methods
		$this->_column_headers = array( $columns, $hidden, $sortable );

		// [OPTIONAL] process bulk action if any
		$this->process_bulk_action();

		// will be used in pagination settings
		$total_items = $wpdb->get_var( "SELECT COUNT(id) FROM $table_name" );

		// prepare query params, as usual current page, order by and order direction
		$paged   = isset( $_REQUEST['paged'] ) ? max( 0, intval( $_REQUEST['paged'] - 1 ) * $per_page ) : 0;
		$orderby = ( isset( $_REQUEST['orderby'] ) && in_array( $_REQUEST['orderby'], array_keys( $this->get_sortable_columns() ) ) ) ? $_REQUEST['orderby'] : 'ID';
		$order   = ( isset( $_REQUEST['order'] ) && in_array( $_REQUEST['order'], array( 'asc', 'desc' ) ) ) ? $_REQUEST['order'] : 'desc';

		// check if a search was performed.
		$user_search_key = isset( $_REQUEST['s'] ) ? wp_unslash( trim( $_REQUEST['s'] ) ) : '';

		// [REQUIRED] define $items array
		// notice that last argument is ARRAY_A, so we will retrieve array
		if ( isset( $_GET['filter'] ) && ( $_GET['filter'] == 'audio_name' ) ) {
			$this->items = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE audio_name= %d ORDER BY $orderby $order LIMIT %d OFFSET %d", 1, $per_page, $paged ), ARRAY_A );
			$total_items = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM $table_name WHERE audio_name = %d", 1 ) );
		} elseif ( isset( $_GET['filter'] ) && ( $_GET['filter'] == 'audio_description' ) ) {
			$this->items = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE audio_description= %d ORDER BY $orderby $order LIMIT %d OFFSET %d", 1, $per_page, $paged ), ARRAY_A );
			$total_items = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM $table_name WHERE audio_description = %d", 1 ) );
		} else {
			$this->items = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged ), ARRAY_A );
			$total_items = $wpdb->get_var( "SELECT COUNT(id) FROM $table_name" );
		}

		if ( $user_search_key ) {
			$this->items = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE audio_name LIKE %s OR audio_description LIKE %s", $wpdb->esc_like( $user_search_key ), $wpdb->esc_like( $user_search_key ) ), ARRAY_A );
			$total_items = $wpdb->get_var( $wpdb->prepare( "SELECT count(*) FROM $table_name WHERE audio_name LIKE %s OR audio_description LIKE %s", $wpdb->esc_like( $user_search_key ), $wpdb->esc_like( $user_search_key ) ) );
		}

		// [REQUIRED] configure pagination
		$this->set_pagination_args(
			array(
				'total_items' => $total_items, // total items defined above
				'per_page'    => $per_page, // per page constant defined at top of method
				'total_pages' => ceil( $total_items / $per_page ), // calculate pages count
			)
		);
	}
}
