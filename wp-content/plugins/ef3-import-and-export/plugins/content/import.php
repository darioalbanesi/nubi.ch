<?php
/**
 * Created by PhpStorm.
 * User: FOX
 * Date: 4/4/2016
 * Time: 3:17 PM
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

function ef3_content_import($folder)
{
    $folder = trailingslashit($folder . 'content');

    /* folder not exists. */
    if(!is_dir($folder))
        return;

    // Load Importer API
    require_once ABSPATH . 'wp-admin/includes/import.php';

    if ( ! class_exists( 'WP_Importer' ) )
        require_once ABSPATH . 'wp-admin/includes/class-wp-importer.php';

    // include WXR file parsers
    require ef3_import_export()->plugin_dir . 'plugins/content/parsers.php';

    /* class WP_Import not exists */
    if(!class_exists('WP_Import'))
        require_once ef3_import_export()->plugin_dir . 'plugins/content/wordpress-importer.php';

    $wp_import = new WP_Import();

    /* get all files demo .xml */
    $files = scandir($folder);

    $files = array_diff($files, array('..', '.'));

    /* add image placeholder */
    $attachment = ef3_add_placeholder_image();

    /* import files. */
    ob_start();

    foreach ($files as $_f){
        $wp_import->import($folder . $_f, $attachment);
    }

    return ob_get_clean();
}

function ef3_add_placeholder_image(){

    $attachment_exists = get_page_by_title(esc_html__('Image Placeholder', 'ef3-import-and-export'), OBJECT, 'attachment');

    if($attachment_exists)
        return $attachment_exists->ID ;

    $wp_upload_dir = wp_upload_dir();

    $_default_image = apply_filters('ef3-placeholder-image', ef3_import_export()->acess_dir . 'ef3-placeholder-image.jpg');

    copy($_default_image, $wp_upload_dir['path'] . '/ef3-placeholder-image.jpg');

    $attachment = array(
        'guid'           => $wp_upload_dir['url'] . '/ef3-placeholder-image.jpg',
        'post_mime_type' => 'image/jpeg',
        'post_title'     => esc_html__('Image Placeholder', 'ef3-import-and-export'),
        'post_status'    => 'inherit'
    );

    $attachment_id = wp_insert_attachment($attachment, $wp_upload_dir['url'] . '/ef3-placeholder-image.jpg');
    wp_update_attachment_metadata( $attachment_id, wp_generate_attachment_metadata( $attachment_id, $wp_upload_dir['url'] . '/ef3-placeholder-image.jpg' ) );

    return $attachment_id;
}

/**
 * replace content.
 *
 * @param $content
 * @param $attachment
 */
function ef3_replace_content($content, $attachment){

    $_replaces = apply_filters('ef3-replace-content', array(), $attachment);

    foreach ($_replaces as $pattern => $_replace){
        $content = preg_replace($pattern, $_replace, $content);
    }

    return $content;
}