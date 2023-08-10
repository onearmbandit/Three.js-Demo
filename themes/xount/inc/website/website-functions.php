<?php
/**
 * Frontend website functions
 * Php version 8.1
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

/**
 * Common Function File Include
 */
foreach ( glob(THEMEPATH . '/inc/website/common/*.php') as $filename ) {
    include $filename;
}

foreach ( glob(THEMEPATH . '/inc/website/post-types/*.php') as $filename ) {
    include $filename;
}

