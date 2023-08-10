<?php
/**
 * Website common functions
 * Php version 8.1
 *
 * @category Fox_PKG
 * @package  Fox_PKG
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     Fox_PKG
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 *
 * @return void
 */
function Fox_PKG_Pingback_header()
{
    if (is_singular() && pings_open() ) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('wp_head', 'Fox_PKG_Pingback_header');


/**
 * Add support for svg images.
 *
 * @param array $file_types file types.
 *
 * @return array $file_types
 */
function Fox_PKG_Mime_types($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}
add_filter('upload_mimes', 'Fox_PKG_Mime_types');

/**
 * Enable upload for webp image files.
 *
 * @param $existing_mimes object.
 *
 * @return void.
 * Fox_PKG_Webp_Is_displayable
 */
function Fox_PKG_Webp_Upload_mimes($existing_mimes)
{
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'Fox_PKG_Webp_Upload_mimes');
