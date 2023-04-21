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
        'posts_per_page' => -1,
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

            $html .='<div data-v-ae4d80ee="" data-v-cbd77764="" class="card-carousel__slide">
                <div data-v-7f9117ba="" data-v-ae4d80ee="" class="campaign-card" data-v-cbd77764="">
                <a data-v-7f9117ba="" href="'.get_permalink( get_the_ID() ).'" target="_self" class="campaign-card__link">
                    <div data-v-7f9117ba="" class="campaign-card__banner" style="background-image: url(&quot;'.$img.'&quot;);"></div>
                    <div data-v-7f9117ba="" class="campaign-card__content campaign-card__content--with-description">
                        <span data-v-7f9117ba="" class="campaign-card__footer__owner__verified-status">
                            <i data-v-7f9117ba="" class="campaign-card__footer__owner__verified-status__icon fas fa-check"></i>
                            VERIFIED
                        </span> 
                        <div data-v-7f9117ba="" class="campaign-card__content__title">Empower Children with Special Needs: Support MIJ Hub’s Ramadan Meal Program. [Believe in Abilities]</div>
                        <div data-v-7f9117ba="" class="campaign-card__content__description">“Will You Help Us Give the Gift of Daily Nutritious Meals to Children in Need?" Every child deserves to have access to nutritious meals, regardless of their family\'s financial circ...</div>
                    </div>
                    <div data-v-7f9117ba="" class="campaign-card__footer campaign-card__footer--with-owner">
                        <div data-v-7f9117ba="" class="campaign-card__footer__filler"></div>
                        <div data-v-7f9117ba="" class="campaign-card__footer__owner">
                            <div data-v-7f9117ba="">
                            By Give.Asia
                            </div>
                        </div>
                        <div data-v-7f9117ba="" class="campaign-card__footer__progress-bar">
                            <div data-v-7f9117ba="" class="campaign-card__footer__progress-bar__progress" style="width: 7.48674%; background-color: rgb(235, 0, 140);"></div>
                        </div>
                        <div data-v-7f9117ba="" class="campaign-card__footer__progress-text">
                            <div data-v-7f9117ba="" class="campaign-card__footer__progress-text__container"><span data-v-7f9117ba="" class="campaign-card__footer__progress-text__container__progress"><span data-v-7f9117ba="">raised</span>
                            S$4,970
                            </span> <span data-v-7f9117ba="" class="campaign-card__footer__progress-text__container__target"><span data-v-7f9117ba="">of</span>
                            S$66,384
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