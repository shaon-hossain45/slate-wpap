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
    <h1 class="wp-heading-inline"><?php _e( 'Edit Template', 'slatewpap-template' ); ?><a class="add-new-h2" href="<?php echo get_admin_url( get_current_blog_id(), 'admin.php?page=templates' ); ?>"><?php _e( 'Back to templates', 'slatewpap-template' ); ?></a></h1>
    <hr class="wp-header-end">
    <form id="update_template" method="POST">
    <input type="hidden" value="<?php echo esc_html($_REQUEST['id']); ?>" name="ID">
        <div class="metabox-holder" id="templatestuff">
            <div id="post-body">
                <div id="post-body-content">
                    <div class="normal-sortables">
                    <div id="template_form_meta_box" class="postbox">
                        <div class="postbox-header">
                            <h2 class="hndle">Edit Template</h2>
                        </div>
                        <?php
                            global $wpdb;
                            $table_name = $wpdb->prefix . 'wpaptemplates'; // do not forget about tables prefix

                            if ( isset( $_REQUEST['id'] ) ) {
                                $item = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM $table_name WHERE ID = %d", $_REQUEST['id'] ), ARRAY_A );
                                if ( $item ) {
                            
                        if ( ! empty( $item['template_title'] ) ) {
                            $title = $item['template_title'];
                        } else {
                            $title = '';
                        }

                        if ( ! empty( $item['template_description'] ) ) {
                            $content = $item['template_description'];
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
                                            <input id="template_title" name="template_title" type="text" style="width: 50%" value="<?php echo esc_attr( $title ); ?>" class="code" placeholder="<?php _e( 'Template Title', 'slatewpap-template' ); ?>">
                                        </td>
                                    </tr>
                                    <tr class="form-field">
                                        <th valign="top" scope="row">
                                            <label for="content"><?php _e( 'Template Description', 'slatewpap-template' ); ?></label>
                                        </th>
                                        <td>
                                            <input id="template_description" name="template_description" type="text" style="width: 70%" value="<?php echo esc_attr( $content ); ?>" class="code" placeholder="<?php _e( 'Template Description', 'slatewpap-template' ); ?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php }
                            }; ?>
                    </div>
                    <input type="submit" value="<?php _e( 'Save Template Data', 'slatewpap-template' ); ?>" class="button-primary" name="template_submit">
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
