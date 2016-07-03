<?php
/**
 * Created by PhpStorm.
 * User: FOX
 * Date: 4/5/2016
 * Time: 4:06 AM
 */

// No direct access
if ( ! defined( 'ABSPATH' ) ) exit;

function ef3_media_export(){

    if(empty($_POST['page']))
        return false;

    /* setting. */
    $media_setting = array('filter' => '', 'width' => 1080, 'quality' => 50);

    /* not in. */
    $not_media = apply_filters('ef3_export_media_remove', array('video/mp4', 'video/webm', 'video/ogg'));

    if(!empty($_POST['setting'])) {

        $custom_setting = $_POST['setting'];

        $media_setting['filter'] = $custom_setting['filter'] != '' ? $custom_setting['filter'] : '' ;
        $media_setting['width'] = $custom_setting['width'] != '' ? $custom_setting['width'] : 1080 ;
        $media_setting['quality'] = $custom_setting['quality'] != '' ? $custom_setting['quality'] : 50 ;
    }

    $media_backup = ef3_import_export()->theme_dir . 'attachment';

    $upload_dir = wp_upload_dir();

    $query = array(
        'post_type'         => 'attachment',
        'posts_per_page'    => 10,
        'paged'             => $_POST['page'],
        'post_status'       => 'inherit',
        'post_mime_type'    => 'image/jpeg'
    );

    $media = new WP_Query($query);

    if(!$media->have_posts())
        return 0;

    while ($media->have_posts()) : $media->the_post();

        /* get file dir */
        $attached_file = (get_attached_file(get_the_ID()));

        if(!file_exists($attached_file))
            continue;

        /* get file name. */
        $attached_name = basename($attached_file);

        /* get file dir */
        $attached_dir = dirname($attached_file);

        /* get date folder. */
        $folder_date = str_replace($upload_dir['basedir'], '', $attached_dir);

        if(strpos($folder_date, 'revslider'))
            continue;

        /* new file. */
        $new_file = $media_backup . $folder_date . '/' . $attached_name;

        /* create date folder. */
        if(!is_dir($media_backup . $folder_date))
            wp_mkdir_p($media_backup . $folder_date);

        ef3_media_process_jpeg($attached_file ,$new_file, $media_setting);

    endwhile;

    return $media->post_count;
}

function ef3_media_process_jpeg($attached_file, $new_file, $setting){

    $im = imagecreatefromjpeg($attached_file);

    list($width, $height) = getimagesize($attached_file);

    /* resize if w > 1080px */
    if($width > $setting['width']) {

        $newheight = $height * ($setting['width'] / $width);

        $thumb = imagecreatetruecolor($setting['width'], $newheight);

        imagecopyresized($thumb, $im, 0, 0, 0, 0, $setting['width'], $newheight, $width, $height);

        $im = $thumb;
    }

    /* filter */
    if($setting['filter']) {
        imagefilter($im, IMG_FILTER_GRAYSCALE);
    }
    /* save image. */
    imagejpeg($im, $new_file, $setting['quality']);

    imagedestroy($im);
}