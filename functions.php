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
        
        // wp_enqueue_script('suggested-campaigns', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/js/suggested-campaigns.js', array('jquery'), wp_get_theme()->get('Version'), true);
    }

}

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