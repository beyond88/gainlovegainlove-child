<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

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

function add_opengraph_doctype( $output ) {
    return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
add_filter('language_attributes', 'add_opengraph_doctype');

function insert_fb_in_head() {

    global $post;
    if ( ! is_singular() )
        return;
        echo '<meta property="fb:app_id" content="Your Facebook App ID" />';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:url" content="' . get_permalink(get_the_ID()) . '"/>';
        echo '<meta property="og:site_name" content=" '.get_bloginfo().' "/>';
    
    if( ! has_post_thumbnail( $post->ID ) ) {
        $default_image="https://via.placeholder.com/400"; 
        echo '<meta property="og:image" content="' . esc_url($default_image) . '"/>';
    }else{
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
        echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
    }
    echo "";

}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

function get_similiar_campaigns( $post_id ) {

    $html = "";
    $terms = get_the_terms( $post_id, 'give_forms_category' );
	if ( empty( $terms ) ) $terms = array();
    $term_list = wp_list_pluck( $terms, 'slug' );

    $related_args = array(
        'post_type' => 'give_forms',
        'posts_per_page' => 3,
        'post_status' => 'publish',
        'post__not_in' => array( $post_id ),
        'orderby' => 'rand',
        // 'tax_query' => array(
		// 	array(
		// 		'taxonomy' => 'category',
		// 		'field' => 'slug',
		// 		'terms' => $term_list
		// 	)
		// )
    );
    
    $related = new WP_Query( $related_args );

    if( $related->have_posts() ) :

        $html .='<div class="campaign-page__container">
        <div data-v-ae4d80ee="" class="suggested-campaigns">
           <div data-v-ae4d80ee="" class="suggested-campaigns__carousel-container">
              <div data-v-ae4d80ee="" class="card-carousel__header">
                 <span data-v-ae4d80ee="">Similar campaigns</span> 
                 <a data-v-ae4d80ee="" href="#">
                    <button data-v-3bb18fd3="" data-v-ae4d80ee="" type="button" class="loading-button card-carousel__see-more-button suggested-campaigns__see-more-button loading-button--flat">
                       SEE MORE
                    </button>
                 </a>
              </div>
              <div data-v-cbd77764="" data-v-ae4d80ee="" class="scrolling-container suggested-campaigns__container">
                 <div data-v-cbd77764="" class="scrolling-container__button-container scrolling-container__button-container--left">
                    <button data-v-3bb18fd3="" data-v-cbd77764="" type="button" class="loading-button scrolling-container__button-container__button scrolling-container__button-container__button--right loading-button--flat loading-button--gray" style="">
                        <i data-v-cbd77764="" data-v-3bb18fd3="" class="fas fa-chevron-left"></i>
                    </button>
                 </div>
                 <div data-v-cbd77764="" class="scrolling-container__outer">
                    <div data-v-cbd77764="" class="scrolling-container__inner">';


        while ( $related->have_posts() ): $related->the_post();

            $img = get_the_post_thumbnail_url( get_the_ID(), 'medium' );

            $form_id = get_the_ID();
            $form        = new Give_Donate_Form($form_id);
            $goal_option = give_get_meta($form->ID, '_give_goal_option', true);
            
            $goal_format         = give_get_form_goal_format($form_id);
            $price               = give_get_meta($form_id, '_give_set_price', true);
            $color               = give_get_meta($form_id, '_give_goal_color', true);
            $show_text           = isset($args['show_text']) ? filter_var($args['show_text'], FILTER_VALIDATE_BOOLEAN) : true;
            $show_bar            = isset($args['show_bar']) ? filter_var($args['show_bar'], FILTER_VALIDATE_BOOLEAN) : true;
            $goal_progress_stats = give_goal_progress_stats($form);
            
            $income = $goal_progress_stats['raw_actual'];
            $goal   = $goal_progress_stats['raw_goal'];
            
            switch ($goal_format) {
            
                case 'donation':
                    $progress           = $goal ? round(($income / $goal) * 100, 2) : 0;
                    $progress_bar_value = $income >= $goal ? 100 : $progress;
                    break;
            
                case 'donors':
                    $progress_bar_value = $goal ? round(($income / $goal) * 100, 2) : 0;
                    $progress           = $progress_bar_value;
                    break;
            
                case 'percentage':
                    $progress           = $goal ? round(($income / $goal) * 100, 2) : 0;
                    $progress_bar_value = $income >= $goal ? 100 : $progress;
                    break;
            
                default:
                    $progress           = $goal ? round(($income / $goal) * 100, 2) : 0;
                    $progress_bar_value = $income >= $goal ? 100 : $progress;
                    break;
            
            }
            
            /**
             * Filter the goal progress output
             *
             * @since 1.8.8
             */
            $progress = apply_filters('give_goal_amount_funded_percentage_output', $progress, $form_id, $form);

            /**
             * Filter the give currency.
             *
             * @since 1.8.17
             */
            $form_currency = apply_filters('give_goal_form_currency', give_get_currency($form_id), $form_id);

            /**
             * Filter the income formatting arguments.
             *
             * @since 1.8.17
             */
            $income_format_args = apply_filters('give_goal_income_format_args', array(
                'sanitize' => false,
                'currency' => $form_currency,
                'decimal'  => false,
            ), $form_id);

            /**
             * Filter the goal formatting arguments.
             *
             * @since 1.8.17
             */
            $goal_format_args = apply_filters('give_goal_amount_format_args', array(
                'sanitize' => false,
                'currency' => $form_currency,
                'decimal'  => false,
            ), $form_id);

            // Get formatted amount.
            $income = give_human_format_large_amount(give_format_amount($income, $income_format_args), array('currency' => $form_currency));
            $goal   = give_human_format_large_amount(give_format_amount($goal, $goal_format_args), array('currency' => $form_currency));
            
            $html .='<div data-v-ae4d80ee="" data-v-cbd77764="" class="card-carousel__slide">
                <div data-v-7f9117ba="" data-v-ae4d80ee="" class="campaign-card" data-v-cbd77764="">
                <a data-v-7f9117ba="" href="'.get_permalink( get_the_ID() ).'" target="_self" class="campaign-card__link">
                    <div data-v-7f9117ba="" class="campaign-card__banner" style="background-image: url(&quot;'.$img.'&quot;);"></div>
                    <div data-v-7f9117ba="" class="campaign-card__content campaign-card__content--with-description">
                        <span data-v-7f9117ba="" class="campaign-card__footer__owner__verified-status">
                            <i data-v-7f9117ba="" class="campaign-card__footer__owner__verified-status__icon fas fa-check"></i>
                            VERIFIED
                        </span> 
                        <div data-v-7f9117ba="" class="campaign-card__content__title">'.get_the_title().'</div>
                        <div data-v-7f9117ba="" class="campaign-card__content__description">'.get_the_excerpt().'</div>
                    </div>
                    <div data-v-7f9117ba="" class="campaign-card__footer campaign-card__footer--with-owner">
                        <div data-v-7f9117ba="" class="campaign-card__footer__filler"></div>
                        <div data-v-7f9117ba="" class="campaign-card__footer__owner">
                            <div data-v-7f9117ba="">
                            By Give.Asia
                            </div>
                        </div>
                        <div data-v-7f9117ba="" class="campaign-card__footer__progress-bar">
                            <div data-v-7f9117ba="" class="campaign-card__footer__progress-bar__progress" style="width: '.esc_attr(round($progress)).'%; background-color: rgb(235, 0, 140);"></div>
                        </div>
                        <div data-v-7f9117ba="" class="campaign-card__footer__progress-text">
                            <div data-v-7f9117ba="" class="campaign-card__footer__progress-text__container">
                                <span data-v-7f9117ba="" class="campaign-card__footer__progress-text__container__progress">
                                    <span data-v-7f9117ba="">raised</span>
                                    ' . give_currency_filter($income, array('form_id' => $form_id)) . '
                                </span> 
                                <span data-v-7f9117ba="" class="campaign-card__footer__progress-text__container__target">
                                <span data-v-7f9117ba="">of</span>
                                ' . give_currency_filter($goal, array('form_id' => $form_id)) . '
                                </span>
                            </div>
                            
                        </div>
                    </div>
                </a>
                </div>
            </div>';

        endwhile;

            $html .='</div>
                    </div>
                    <div data-v-cbd77764="" class="scrolling-container__button-container scrolling-container__button-container--right">
                       <button data-v-3bb18fd3="" data-v-cbd77764="" type="button" class="loading-button scrolling-container__button-container__button scrolling-container__button-container__button--right loading-button--flat loading-button--gray" style="">
                           <i data-v-cbd77764="" data-v-3bb18fd3="" class="fas fa-chevron-right"></i>
                       </button>
                    </div>
                 </div>
              </div>
           </div>
        </div>';

        return $html; 
    else: 
        return $html; 
    endif; 
}

function get_post_info( $post_id ) {
    $post = get_post($post_id);
    return $post;
}

add_action( 'rest_api_init', 'gainlove_customize_rest_cors', 15 );
add_action( 'rest_api_init', 'gainlove_register_api', 10, 1 );

function gainlove_customize_rest_cors() {

    remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
    add_filter( 'rest_pre_serve_request', function( $value ) {
      header( 'Access-Control-Allow-Origin: *' );
      header( 'Access-Control-Allow-Methods: POST, GET' );
      header( 'Access-Control-Allow-Credentials: true' );
      header( 'Access-Control-Expose-Headers: Link', false );
      header( 'Access-Control-Allow-Headers: X-Requested-With' );
      return $value;
    } );

}

function gainlove_register_api() {

    register_rest_route( 'gainlove/v1', '/top-donors', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => 'get_top_donors',
      'permission_callback' => '__return_true'
    ]);

    // register_rest_route( $this->restBase, '/send-verify-email', [
    //   'methods'  => WP_REST_SERVER::CREATABLE,
    //   'callback' => [ $this, 'send_verify_email' ],
    //   'permission_callback' => '__return_true'
    // ]);

    // register_rest_route( $this->restBase, '/create-campaign', [
    //   'methods'  => WP_REST_SERVER::CREATABLE,
    //   'callback' => [ $this->campaignApi, 'create_campaign' ],
    //   'permission_callback' => '__return_true'
    // ]);

}


function top_donors_query( $form_id, $per_page = NULL, $page_no = 1 ) {

    global $wpdb;
    $donation_meta_table = $wpdb->prefix . 'give_donationmeta';

    if( ! isset( $per_page ) ){
        $per_page = 2; 
    }

    if( ! isset( $page_no ) ) {
        $page = "1";
    }else {
        $page = $page_no;
    }

    $start    = ($page - 1) * $per_page;
    $query = '';

    $query = $wpdb->get_results($wpdb->prepare("SELECT a.donation_id, b.meta_value AS amount, c.meta_value AS first_name, d.meta_value AS last_name, e.meta_value AS email, f.meta_value AS donation_date, g.meta_value AS currency FROM ".$donation_meta_table." a 
    LEFT JOIN ".$donation_meta_table." b ON a.donation_id = b.donation_id
    LEFT JOIN ".$donation_meta_table." c ON a.donation_id = c.donation_id
    LEFT JOIN ".$donation_meta_table." d ON a.donation_id = d.donation_id
    LEFT JOIN ".$donation_meta_table." e ON a.donation_id = e.donation_id
    LEFT JOIN ".$donation_meta_table." f ON a.donation_id = f.donation_id
    LEFT JOIN ".$donation_meta_table." g ON a.donation_id = g.donation_id
    WHERE b.meta_key = '_give_payment_total' 
    AND c.meta_key = '_give_donor_billing_first_name'
    AND d.meta_key = '_give_donor_billing_last_name'
    AND e.meta_key = '_give_payment_donor_email'
    AND f.meta_key = '_give_completed_date'
    AND g.meta_key = '_give_payment_currency'
    AND a.meta_key = '_give_payment_form_id' AND a.meta_value = %d ORDER BY amount DESC LIMIT %d, %d", $form_id
                                ,$start, $per_page), ARRAY_A);
    return $query; 

}

function get_top_donors( WP_REST_Request $request ) {

    
    $form_id = $request['form_id'];
    $data = [];
    $query = top_donors_query( $form_id, 5, 1);

    $html = '';
    if( ! empty( $query ) ){
        foreach( $query as $item ) {

            $date = date_create($item['date']);
            $since = date_format($date,"m d, Y");
    
            $html .='
                <div data-v-699f71c4="">
                    <div data-v-3697e608="" data-v-699f71c4="" class="top-donors-item">
                        <div data-v-3697e608="" class="top-donors-item__thumbnail-container">
                            <a data-v-3697e608="" href="#" class="top-donors-item__user-link">
                                <div data-v-3697e608="" class="top-donors-item__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                            </a>
                        </div>
                        <div data-v-3697e608="" class="top-donors-item__content">
                            <div data-v-3697e608="" class="top-donors-item__content__info">
                                <span data-v-3697e608="" class="top-donors-item__content__info__amount">
                                '.$item['currency'].' '.number_format($item['amount'], 0).'
                                </span>
                                by
                                <span data-v-3697e608="">
                                    <a data-v-3697e608="" href="#" target="_blank" class="top-donors-item__content__info__donor">
                                    '.$item['first_name'].' '.$item['last_name'].'
                                    </a>
                                </span> 
                                <span data-v-3697e608="" class="top-donors-item__content__info__rank">
                                
                                </span>
                            </div>
                            <div data-v-3697e608="" class="top-donors-item__content__info__registered-at">
                                Giver since '.$since.'
                            </div>
                            <div data-v-3697e608="" class="top-donors-item__content__comment"></div>
                        </div>
                    </div>
                </div>';  
        }
    } else {
        $html .='
            <div data-v-3697e608="" data-v-699f71c4="" class="top-donors-item">
                <div data-v-3697e608="" class="top-donors-item__content">
                    <div data-v-3697e608="" class="top-donors-item__content__info">
                        <span data-v-3697e608="" class="top-donors-item__content__info__amount"></span>
                        <span data-v-3697e608="">
                            <a data-v-3697e608="" href="#" target="_blank" class="top-donors-item__content__info__donor donors-not-found">
                                '.__('There\'s no donor on this campaign yet. Be the first to donate to this campaign!', 'gainlove').'
                            </a>
                        </span> 
                        <span data-v-3697e608="" class="top-donors-item__content__info__rank"></span>
                    </div>
                    <div data-v-3697e608="" class="top-donors-item__content__info__registered-at"></div>
                    <div data-v-3697e608="" class="top-donors-item__content__comment"></div>
                </div>
            </div>';
    }

    $response['html'] = $html;
    $response['target_div'] = ".campaign-top-donors__feed";

    return new WP_REST_Response($response, 123);
}

if( ! function_exists('gainlove_time_ago') ) {
function gainlove_time_ago($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}
}