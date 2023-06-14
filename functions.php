<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

define("FILEPATH", __DIR__.'/inc/');
define('ASSETS_URL', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/');

include FILEPATH . 'enqueue.php';
include FILEPATH . 'query.php';
include FILEPATH . 'others.php';
include FILEPATH . 'api.php';

function give_kindness_settings() {
    $settings = array(
        /**
         * File field setting
         */
        array(
            'name' => esc_html__( 'Give Kindness Settings', 'givelove' ),
            'type' => 'title',
        ),
        array(
            'name' => esc_html__( 'Verified short', 'givelove' ),
            'desc' => '',
            'default' => '',
            'id'   => 'give_kindness_verify_link_content',
            'type' => 'wysiwyg',
        ),
        array(
            'name' => esc_html__( 'Trust and safety', 'givelove' ),
            'desc' => '',
            'default' => '',
            'id'   => 'give_kindness_trust_safety',
            'type' => 'wysiwyg',
        ),
        array(
            'name' => esc_html__( 'Verified details', 'givelove' ),
            'desc' => '',
            'default' => '',
            'id'   => 'give_kindness_verify_details',
            'type' => 'wysiwyg',
        ),
        array(
            'name' => esc_html__( 'Boosting', 'givelove' ),
            'desc' => '',
            'default' => '',
            'id'   => 'give_kindness_boosting',
            'type' => 'wysiwyg',
        ),
        array(
            'name' => esc_html__( 'Boosting popup content', 'givelove' ),
            'desc' => '',
            'default' => '',
            'id'   => 'give_kindness_boosting_popup',
            'type' => 'wysiwyg',
        ),
        array(
            'id'   => 'file_field_setting',
            'type' => 'sectionend',
        ),
    );

    return $settings;
}

/**
 * 
 * 
 */
add_filter( 'give-settings_get_settings_pages',  'give_kindness_register_settings', 20, 1 );
function give_kindness_register_settings( $settings ) {
    require_once __DIR__ .'/class-give-kindness-settings.php';
    $settings[] = new Give_Kindness_Settings();
    return $settings;
}





