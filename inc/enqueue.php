<?php 

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'gainlove-boostrap' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 20 );
// END ENQUEUE PARENT ACTION

add_action('wp_enqueue_scripts', 'add_extra_scripts', 99);
function add_extra_scripts() {
    if ( is_singular( 'give_forms' ) ) {
        $parent_style = 'gainlove-boostrap';
        wp_enqueue_style( 'campaign-css', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/css/campaign.css', array( $parent_style ), wp_get_theme()->get('Version') );
        wp_enqueue_style( 'fontawesome-css', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/css/fontawesome.css', array( $parent_style ), wp_get_theme()->get('Version') );
        wp_enqueue_style( 'common-css', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/css/common.css', array( $parent_style ), wp_get_theme()->get('Version') );
        
        wp_enqueue_script('child-main', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/js/child-main.js', array('jquery'), wp_get_theme()->get('Version'), true);

        wp_localize_script( 'child-main', 'gainlove_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'loading' => __( 'Loading', 'gainlove' ),
            'pleaseWait' => __('Please wait!', 'gainlove'),
            'error' => __( 'Something went wrong', 'gainlove' ),
            'apiNonce' => wp_create_nonce('wp_rest'),
            'siteURL' => site_url('/'),
            'giveApiURL' => site_url('/wp-json/give-api/v2/'),
            'gainloveApiURL' => site_url('/wp-json/gainlove/v1/'),
        ] );
    }

}