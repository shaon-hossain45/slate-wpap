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
	<h1 class="wp-heading-inline"><?php _e( 'Templates', 'slate-wpap' ); ?></h1>
	<a href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=templates&template=create' ); ?>" class="page-title-action">Create Template</a>
	<hr class="wp-header-end">
	<?php echo $message; ?>
	<?php $table->views(); ?>
	<form id="slate-wpap-table" method="GET">
		<input type="hidden" name="page" value="<?php echo $_REQUEST['page']; ?>"/>
		<?php $table->search_box( __( 'Search Templates', 'slate-wpap' ), 'nds-user-find' ); ?>
		<?php $table->display(); ?>
	</form>
</div>
