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
	<div class="icon32 icon32-posts-post" id="icon-edit"><br></div>
	<!-- add new button remove from here -->
	<h1 class="wp-heading-inline"><?php _e( 'Shortcodes', 'slate-wpap' ); ?></h1>
	<hr class="wp-header-end">
	<?php echo $message; ?>
	<?php $table->views(); ?>
	<form id="slate-wpap-table" method="GET">
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>"/>
		<?php $table->search_box( __( 'Search Shortcodes', 'slate-wpap' ), 'nds-user-find' ); ?>
		<?php $table->display(); ?>
	</form>
</div>
