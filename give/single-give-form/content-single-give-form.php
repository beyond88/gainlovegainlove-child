<?php 

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

$overlay_image = get_the_post_thumbnail_url( $form_id, 'large' );
$preview_image = get_the_post_thumbnail_url( $form_id, 'medium' );

$date = get_the_date(DATE_W3C, $form_id);
$date2 = strtotime($date);
$diff = $date2 - time();
$days = floor(-$diff / (60 * 60 * 24));

$author_id = get_post_field( 'post_author', $form_id );
$avatar = get_avatar_url($author_id, ['size' => '40']);

?>
<div class="campaign-page">
   <div class="campaign-page__container">
      <div class="campaign-page__container__col campaign-page__container__col--main">
         <script src="js/personal-campaign-2d10c8bb08b4d70e5d28742cfe3cc8c9-personal-campaign-nav.js"></script>
         <div data-v-1d3087a2="" class="campaign-nav">
            <div data-v-1d3087a2="" class="campaign-nav__header campaign-nav__header--padded">
               Give My Premature Twins A Chance [Big Heart for Little Ones]
            </div>
            <div data-v-1f1d6764="" data-v-1d3087a2="" class="campaign-banner">
               <div data-v-1f1d6764="" class="campaign-banner__container">
                  <div data-v-1f1d6764="" class="campaign-banner__container__underlay" style="background-image: url(&quot;<?php echo $overlay_image; ?>&quot;);"></div> 
                  <div data-v-1f1d6764="" class="campaign-banner__container__preview" style="background-image: url(&quot;<?php echo $preview_image; ?>&quot;);"></div> 
                  <button data-v-3bb18fd3="" data-v-1f1d6764="" type="button" class="loading-button campaign-banner__thumbnail-container__button campaign-banner__thumbnail-container__button--mobile loading-button--flat"> 
                     <?php echo __('SEE MORE PHOTOS', 'gainlove'); ?>
                  </button>
               </div>

               <!-- <div data-v-1f1d6764="" class="campaign-banner__thumbnail-container" bis_skin_checked="1">
                  <span data-v-1f1d6764="" class="campaign-banner__thumbnail-container__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_1000,c_scale/l_assets:giveasia-watermark.png,c_scale,w_0.1,fl_relative,g_north_east,x_24,y_18,e_anti_removal/q_auto/mdzsaofstdpaulo69bgw.jpg&quot;);"></span>
                  <span data-v-1f1d6764="" class="campaign-banner__thumbnail-container__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_1200,c_scale/f_auto/l_assets:giveasia-watermark.png,c_scale,w_0.1,fl_relative,g_north_east,x_24,y_18,e_anti_removal/foj12yo7kedxaqndhonb.jpg&quot;);"></span>
                  <span data-v-1f1d6764="" class="campaign-banner__thumbnail-container__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_1200,c_scale/f_auto/l_assets:giveasia-watermark.png,c_scale,w_0.1,fl_relative,g_north_east,x_24,y_18,e_anti_removal/ewbjlzfuqb61ldkxb2pf.jpg&quot;);"></span> 
                  <button data-v-3bb18fd3="" data-v-1f1d6764="" type="button" class="loading-button campaign-banner__thumbnail-container__button loading-button--flat">
                     SEE MORE PHOTOS
                  </button>
               </div> -->

            </div>
            <a data-v-11dd9319="" data-v-1d3087a2="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate?recurring=true&amp;origin=campaign" class="childmed-blurb">
               <div data-v-11dd9319="" class="childmed-blurb__container">
                  <div data-v-11dd9319="" class="childmed-blurb__logo-container"><img data-v-11dd9319="" alt="ChildMed" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/movement/childmed/square-logo.png" srcset="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/movement/childmed/square-logo_2x.png 2x, https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/movement/childmed/square-logo_3x.png 3x" class="childmed-logo childmed-blurb__logo"></div>
                  <div data-v-11dd9319="" class="childmed-blurb__main-container">
                     <div data-v-11dd9319="" class="childmed-blurb__content">
                        <div data-v-11dd9319="" class="childmed-blurb__content__header">We believe <strong>every child deserves a chance</strong> to live beyond the confines of the hospital walls.</div>
                        <p data-v-11dd9319="" class="childmed-blurb__content__subheader">
                           Help Twin Babies of Girish Medical Bills and other children live normal lives
                        </p>
                     </div>
                     <div data-v-11dd9319="" class="childmed-blurb__button-container"><i data-v-11dd9319="" class="fas fa-chevron-right"></i></div>
                  </div>
               </div>
            </a>
          
            <div data-v-1d3087a2="" class="campaign-nav__sticky-tabs js-stickyNavTabs" style="display: none;">
               <div data-v-1d3087a2="" class="campaign-nav__sticky-tabs__col campaign-nav__sticky-tabs__col--large">
                  <div data-v-41aa2c30="" data-v-1d3087a2="" class="campaign-tabs">
                     <div data-v-41aa2c30="" class="campaign-tabs__outer">
                        <div data-v-41aa2c30="" class="campaign-tabs__inner">
                           <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/" class="campaign-tabs__tab campaign-tabs__tab--selected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                           Story
                           </a> <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/updates" class="campaign-tabs__tab campaign-tabs__tab--updates campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                           Updates
                           <span data-v-41aa2c30="" class="campaign-tabs__tab__count campaign-tabs__tab__count--unselected" style="background-color: rgb(235, 0, 140);">6</span></a> <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/activities" class="campaign-tabs__tab campaign-tabs__tab--activities campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                           Activities
                           <span data-v-41aa2c30="" class="campaign-tabs__tab__count campaign-tabs__tab__count--unselected" style="background-color: rgb(235, 0, 140);">1.8k</span></a> <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/testimonials" class="campaign-tabs__tab campaign-tabs__tab--testimonials campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                           Testimonials
                           </a> <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/donors" class="campaign-tabs__tab campaign-tabs__tab--top-donors campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                           Top Donors
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div data-v-1d3087a2="" class="campaign-nav__sticky-tabs__col campaign-nav__sticky-tabs__col--small">
                  <a data-v-1d3087a2="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate" class="campaign-nav__sticky-tabs__link">
                     <button data-v-3bb18fd3="" data-v-1d3087a2="" type="button" class="loading-button campaign-nav__sticky-tabs__col__button">
                     <?php echo __('PLEASE DONATE', 'gainlove'); ?>
                     </button>
                  </a>
               </div>
            </div>
            <div data-v-41aa2c30="" data-v-1d3087a2="" class="campaign-tabs campaign-nav__fixed-tabs js-fixedNavTabs">
               <div data-v-41aa2c30="" class="campaign-tabs__outer">
                  <div data-v-41aa2c30="" class="campaign-tabs__inner">
                     <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/" class="campaign-tabs__tab campaign-tabs__tab--selected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                        <?php echo __('Story', 'gainlove'); ?>
                     </a> 
                     <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/updates" class="campaign-tabs__tab campaign-tabs__tab--updates campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                        <?php echo __('Updates', 'gainlove'); ?>
                        <span data-v-41aa2c30="" class="campaign-tabs__tab__count campaign-tabs__tab__count--unselected" style="background-color: rgb(235, 0, 140);">6</span>
                     </a> 
                     <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/activities" class="campaign-tabs__tab campaign-tabs__tab--activities campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                        <?php echo __('Activities', 'gainlove'); ?>
                        <span data-v-41aa2c30="" class="campaign-tabs__tab__count campaign-tabs__tab__count--unselected" style="background-color: rgb(235, 0, 140);">1.8k</span>
                     </a> 
                     <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/testimonials" class="campaign-tabs__tab campaign-tabs__tab--testimonials campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                        <?php echo __('Testimonials', 'gainlove'); ?>
                     </a> 
                     <a data-v-41aa2c30="" href="https://give.asia/campaign/give-my-premature-twins-a-chance#/donors" class="campaign-tabs__tab campaign-tabs__tab--top-donors campaign-tabs__tab--unselected" style="color: rgb(235, 0, 140); border-bottom-color: rgb(235, 0, 140);">
                        <?php echo __('Top Donors', 'gainlove'); ?>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="campaign-page__container__col__tab-content">
            <div data-v-e9cf4a2a="">
               <div data-v-e9cf4a2a="" class="campaign-story campaign-tab">
                  <div data-v-e9cf4a2a="">
                     <div data-v-e9cf4a2a="" class="campaign-story__description">
                        <?php
                           give_form_display_content($form_id, []);
                        ?>
                     </div>
                     <div data-v-7c0a99fa="" data-v-e9cf4a2a="" class="medical-condition-card medical-condition-card__bubble medical-condition-card--without-arrow" style="visibility: hidden;">
                     
                     </div>
                  </div>
               
               </div>
               <div data-v-00230a7a="" data-v-e9cf4a2a="" class="campaign-cta-donors campaign-story__cta-donors--mobile-hidden">
                  <div data-v-00230a7a="" class="campaign-cta-donors__header">Give My Premature Twins A Chance [Big Heart for Little Ones]</div>
                  <div data-v-586aba14="" data-v-e9cf4a2a="" class="campaign-cta campaign-cta-donors__cta" data-v-00230a7a="">
                     <div data-v-586aba14="" class="campaign-cta__primary-link-container campaign-cta__primary-link-container--donors-position">
                        <a data-v-586aba14="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate?" class="campaign-cta__primary-link">
                           <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button">
                              PLEASE DONATE
                           </button>
                        </a>
                     </div>
                   
                     <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button campaign-cta__button--orange">
                        SHARE THIS CAMPAIGN
                        <span data-v-586aba14="" data-v-3bb18fd3="" class="campaign-cta__button__count">
                        </span>
                     </button>
                     <div data-v-63292daa="" data-v-586aba14="">
                        <div data-v-646760a4="" data-v-7ddbc005="" data-v-63292daa="" class="dialog-box js-dialogBoxWrapper" style="position: fixed; display: none;">
                           <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container js-dialog-content">
                              <h3 data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header"><span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                                 Successfully shared!
                                 </span> <span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                                 You're awesome :)
                                 </span>
                              </h3>
                              <p data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__lead">
                                 Thank you for helping to spread the word!
                              </p>
                              <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__button-container">
                                 <button data-v-3bb18fd3="" data-v-7ddbc005="" type="button" class="loading-button shared-successful-dialog__container__button-container__button-close" data-v-646760a4="">
                                  Close
                                 </button>
                              </div>
                           </div>
                        </div>
                        <div data-v-63292daa="" class="campaign-share-dialog__lightbox js--dismiss-el" style="display: none;">
                           <div data-v-63292daa="" class="campaign-share-dialog__modal">
                              <button data-v-3bb18fd3="" data-v-63292daa="" type="button" class="loading-button campaign-share-dialog__modal__dismiss-button js--dismiss-el loading-button--flat loading-button--gray">
                               <i data-v-63292daa="" data-v-3bb18fd3="" class="fal fa-times campaign-share-dialog__modal__dismiss-button__icon js--dismiss-el"></i>
                              </button>
                              <div data-v-63292daa="" class="campaign-share-dialog__content">
                                 <div data-v-63292daa="" class="campaign-share-dialog__content__header">
                                    Share this campaign
                                 </div>
                                 <div data-v-63292daa="" class="campaign-share-dialog__content__body">
                                    A single share from you will usually lead to at least one donation. Sharing this campaign only takes 10 seconds.
                                 </div>
                                 <div data-v-63292daa="" class="campaign-share-dialog__content__button-container">
                                    <div data-v-ac876508="" data-v-63292daa="" class="campaign-share">
                                       <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/facebook" target="_blank">
                                          <button data-v-3bb18fd3="" data-v-601f31fe="" data-v-ac876508="" type="button" class="loading-button facebook-button campaign-share__button">
                                           
                                             <span data-v-601f31fe="" data-v-3bb18fd3="" class="facebook-button__content">
                                                <svg data-v-601f31fe="" data-v-3bb18fd3="" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="facebook-button__icon">
                                                   <g data-v-601f31fe="" data-v-3bb18fd3="">
                                                      <title data-v-601f31fe="" data-v-3bb18fd3="">background</title>
                                                      <rect data-v-601f31fe="" data-v-3bb18fd3="" fill="none" id="canvas_background" height="22" width="22" y="-1" x="-1"></rect>
                                                   </g>
                                                   <g data-v-601f31fe="" data-v-3bb18fd3="">
                                                      <title data-v-601f31fe="" data-v-3bb18fd3="">Layer 1</title>
                                                      <path data-v-601f31fe="" data-v-3bb18fd3="" stroke="null" fill="#ffffff" id="f" d="m10.801958,16.491924l0,-6.567887l2.207833,0l0.328116,-2.558195l-2.53595,0l0,-1.63502c0,-0.739652 0.205768,-1.24573 1.267975,-1.24573l1.356955,0l0,-2.291253c-0.233574,-0.033368 -1.039962,-0.100103 -1.974259,-0.100103c-1.957575,0 -3.292285,1.195678 -3.292285,3.386827l0,1.89084l-2.213395,0l0,2.558195l2.213395,0l0,6.562326l2.641614,0z" class="st0"></path>
                                                   </g>
                                                </svg>
                                                SHARE ON FACEBOOK
                                             </span>
                                             <span data-v-601f31fe="" data-v-3bb18fd3="" class="facebook-button__counter" style="display: none;">
                                             </span>
                                          </button>
                                       </a>
                                       <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/linkedin" target="_blank">
                                          <button data-v-3bb18fd3="" data-v-36e0b6be="" data-v-ac876508="" type="button" class="loading-button linkedin-button campaign-share__button">
                                           
                                             <svg data-v-36e0b6be="" data-v-3bb18fd3="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" class="linkedin-button__icon">
                                                <g data-v-36e0b6be="" data-v-3bb18fd3="" id="surface1">
                                                   <path data-v-36e0b6be="" data-v-3bb18fd3="" d="M 20 12.160156 L 20 19.554688 L 15.714844 19.554688 L 15.714844 12.65625 C 15.714844 10.921875 15.09375 9.742188 13.542969 9.742188 C 12.355469 9.742188 11.652344 10.539062 11.34375 11.308594 C 11.230469 11.585938 11.199219 11.96875 11.199219 12.355469 L 11.199219 19.554688 L 6.910156 19.554688 C 6.910156 19.554688 6.96875 7.871094 6.910156 6.660156 L 11.199219 6.660156 L 11.199219 8.488281 C 11.191406 8.503906 11.179688 8.515625 11.171875 8.53125 L 11.199219 8.53125 L 11.199219 8.488281 C 11.769531 7.609375 12.785156 6.359375 15.0625 6.359375 C 17.886719 6.359375 20 8.199219 20 12.160156 Z M 2.425781 0.445312 C 0.960938 0.445312 0 1.40625 0 2.671875 C 0 3.910156 0.933594 4.902344 2.371094 4.902344 L 2.398438 4.902344 C 3.894531 4.902344 4.824219 3.910156 4.824219 2.671875 C 4.796875 1.40625 3.894531 0.445312 2.425781 0.445312 Z M 0.253906 19.554688 L 4.542969 19.554688 L 4.542969 6.660156 L 0.253906 6.660156 Z M 0.253906 19.554688 " style="stroke: none; fill-rule: nonzero; fill: rgb(255, 255, 255); fill-opacity: 1;"></path>
                                                </g>
                                             </svg>
                                             SHARE ON LINKEDIN
                                          </button>
                                       </a>
                                       <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/twitter" target="_blank">
                                          <button data-v-3bb18fd3="" data-v-74f15efc="" data-v-ac876508="" type="button" class="loading-button twitter-button campaign-share__button">
                                           
                                             <svg data-v-74f15efc="" data-v-3bb18fd3="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" xml:space="preserve" width="20" height="20" class="twitter-button__icon">
                                                <g data-v-74f15efc="" data-v-3bb18fd3="">
                                                   <path data-v-74f15efc="" data-v-3bb18fd3="" d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411    c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513    c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101    c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104    c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194    c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485    c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z" fill="#FFFFFF"></path>
                                                </g>
                                             </svg>
                                             SHARE ON TWITTER
                                          </button>
                                       </a>
                                       <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/whatsapp" target="_blank">
                                          <button data-v-3bb18fd3="" data-v-adafa1a0="" data-v-ac876508="" type="button" class="loading-button whatsapp-button campaign-share__button">
                                           
                                             <svg data-v-adafa1a0="" data-v-3bb18fd3="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 90 90" xml:space="preserve" class="whatsapp-button__icon">
                                                <g data-v-adafa1a0="" data-v-3bb18fd3="">
                                                   <path data-v-adafa1a0="" data-v-3bb18fd3="" id="WhatsApp" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z" fill="#FFFFFF"></path>
                                                </g>
                                             </svg>
                                             SHARE ON WHATSAPP
                                          </button>
                                       </a>
                                    </div>
                                 </div>
                                 <div data-v-63292daa="" class="campaign-share-dialog__content__body">
                                    Or print out this flyer and help spread the word
                                 </div>
                                 <div data-v-b8043b9c="" data-v-63292daa="" class="donate-flyer campaign-share-dialog__content__flyer">
                                    <div data-v-b8043b9c="" id="qrcode" style="display: none;"></div>
                                    <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview donate-flyer__content__flyer-preview--small">
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-2 donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-2--small">
                                          <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__banner donate-flyer__content__flyer-preview__card__banner--small" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_640,h_480,c_fill,g_faces/q_auto/nmbyrvvm5gdaujezumz9.jpg&quot;);"></div>
                                          <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content donate-flyer__content__flyer-preview__card__content--small"></div>
                                       </div>
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-1 donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-1--small">
                                          <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__banner donate-flyer__content__flyer-preview__card__banner--small" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_640,h_480,c_fill,g_faces/q_auto/nmbyrvvm5gdaujezumz9.jpg&quot;);"></div>
                                          <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content donate-flyer__content__flyer-preview__card__content--small"></div>
                                       </div>
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--small">
                                          <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__banner donate-flyer__content__flyer-preview__card__banner--small" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_640,h_480,c_fill,g_faces/q_auto/nmbyrvvm5gdaujezumz9.jpg&quot;);"></div>
                                          <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content donate-flyer__content__flyer-preview__card__content--small">
                                             <h3 data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content__header donate-flyer__content__flyer-preview__card__content__header--small">
                                                Give My Premature Twins A Chance [Big Heart for Little Ones]
                                             </h3>
                                             <p data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content__text donate-flyer__content__flyer-preview__card__content__text--small">
                                                Please help us to bring back our extreme premature babies surviving in NICU Myself and my wife would like to seek your help for our new born extreme premature twin babies born on 2...
                                             </p>
                                             <strong data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content__subheader donate-flyer__content__flyer-preview__card__content__subheader--small">
                                             Support us at:
                                             </strong>
                                          </div>
                                       </div>
                                       <img data-v-b8043b9c="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/thankyou-hand.png" class="donate-flyer__content__flyer-preview__hand donate-flyer__content__flyer-preview__hand--small">
                                    </div>
                                    <button data-v-3bb18fd3="" data-v-b8043b9c="" type="button" class="loading-button donate-flyer__content__flyer-button">
                                     
                                       DOWNLOAD FLYER PDF
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div data-v-586aba14="" class="campaign-cta__mobile-container">
                        <a data-v-586aba14="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate?" class="campaign-cta__mobile-container__primary-link campaign-cta__primary-link--mobile">
                           <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__mobile-container__primary-link__button">
                            
                              PLEASE DONATE
                           
                           </button>
                        </a>
                     </div>
                  </div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__separator"></div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__donors">
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                           <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                           <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$300</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 2 hours ago</span>
                        </div>
                     </div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_2.png&quot;);"></div>
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                           <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                           <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$20</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 2 hours ago</span>
                        </div>
                     </div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                           <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                           <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$50</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 3 hours ago</span>
                        </div>
                     </div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                           <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                           <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$10</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 3 hours ago</span>
                        </div>
                     </div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_5.png&quot;);"></div>
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                           <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Alan</span></div>
                           <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$300</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 5 hours ago</span>
                        </div>
                     </div>
                  </div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__total"><strong>+ 1797 givers</strong> have donated to this campaign</div>
               </div>
            </div>
            
         </div>
      </div>
      <div class="campaign-page__container__col campaign-page__container__col--sidebar">
         <script src="js/personal-campaign-3275089d56d2602ecd8bf56d7e95ac44-personal-campaign-sidebar.js"></script>
         <div data-v-44d4f274="" class="campaign-sidebar">
            <div data-v-44d4f274="" class="campaign-sidebar--mobile-hidden">
               <div data-v-045fc0d9="" data-v-44d4f274="" class="campaign-owner">
                  <div data-v-045fc0d9="" class="campaign-owner__thumbnail-container">
                     <a data-v-045fc0d9="" href="https://give.asia/user/18waxwofxh1680084968" target="_blank">
                        <span data-v-045fc0d9="" class="campaign-owner__thumbnail-container__thumbnail" style="background-image: url(&quot;<?php echo $avatar; ?>&quot;);"></span>
                     </a>
                  </div>
                  <div data-v-045fc0d9="" class="campaign-owner__info">
                     <div data-v-045fc0d9="">
                        By
                        <a data-v-045fc0d9="" href="https://give.asia/user/18waxwofxh1680084968" target="_blank" class="campaign-owner__link" style="color: rgb(235, 0, 140);">
                        <?php echo get_the_author(); ?>
                        </a>
                     </div>
                     <p data-v-045fc0d9="" class="campaign-owner__relationship">
                        Family member of the beneficiary
                     </p>
                  </div>
               </div>
               <div data-v-2bb70eac="" data-v-44d4f274="" class="campaign-info">
                
                  <div data-v-6e670434="" data-v-2bb70eac="" class="campaign-progress campaign-info__progress">
                   
                     <div data-v-6e670434="" class="campaign-progress__container">
                        <h2 data-v-6e670434="" class="campaign-progress__text">
                           <?php echo give_currency_filter($income, array('form_id' => $form_id)); ?> Raised
                        
                        </h2>
                        <div data-v-6e670434="" class="campaign-progress__subtext">
                           (Inc S$34,419 Raised Offline)
                        </div>
                        <p data-v-6e670434="" class="campaign-progress__subtext">
                           Of <?php echo give_currency_filter($goal, array('form_id' => $form_id)); ?> Goal
                        </p>
                        <div data-v-6e670434="" class="campaign-progress__bar">
                           <div data-v-6e670434="" class="campaign-progress__bar__progress" style="width: <?php echo $progress; ?>%; background-image: linear-gradient(267deg, rgb(235, 0, 140), rgb(239, 169, 109));"></div>
                        
                        </div>
                        <p data-v-6e670434="" class="campaign-progress__subtext">
                           from <?php echo give_get_form_donor_count($form_id); ?> Givers
                        </p>
                     
                     </div>
                  </div>
                
                  <div data-v-4fe81988="" data-v-2bb70eac="" class="campaign-verification-summary">
                     <div data-v-4fe81988="" class="campaign-verification-summary__item">
                        <i data-v-4fe81988="" class="campaign-verification-summary__item__icon fas fa-check"></i> 
                        <div data-v-4fe81988="" class="campaign-verification-summary__item__content">
                           VERIFIED BY
                           <span data-v-4fe81988="" class="campaign-verification-summary__item__content__name">
                           GIVE Healthcare
                           </span> 
                           <div data-v-4fe81988="" class="campaign-verification-summary__item__content__sup">
                              <?php
                                 $datee = date_create($date);
                                 echo date_format($datee,"m d, Y");
                              ?>
                           </div>
                        </div>
                     </div>
                     <div data-v-609ffe99="" data-v-4fe81988="" class="campaign-trust-and-safety">
                        <div data-v-609ffe99="" class="campaign-trust-and-safety__icon">
                           <img data-v-609ffe99="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/campaign/trust-safety-icon.svg" alt="trust and safety">
                        </div>
                        <div data-v-609ffe99="" class="campaign-trust-and-safety__content">
                           Learn more about
                           <a data-v-609ffe99="" href="#" target="_blank">Trust &amp; Safety</a>
                        </div>
                     </div>
                     <div data-v-0f80c597="" data-v-4fe81988="" class="campaign-giving-guarantee">
                        <div data-v-0f80c597="" class="campaign-giving-guarantee__icon">
                           <img data-v-0f80c597="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/campaign/giving-guarantee-icon.svg" alt="giving guarantee">
                        </div>
                        <div data-v-0f80c597="" class="campaign-giving-guarantee__content">
                           Your donation is protected with
                           <a data-v-0f80c597="" href="#" target="_blank">
                           Giving Guarantee
                           </a>
                        </div>
                     </div>
                  </div>
                  <div data-v-2bb70eac="" class="campaign-info__section">
                     <div data-v-2bb70eac="">Donations will go to 
                        <strong><?php echo get_post_info($form_id)->post_title; ?></strong> 
                        via <strong><?php echo get_the_author(); ?></strong>
                     </div>
                  </div>
               </div>
               <div data-v-586aba14="" data-v-44d4f274="" class="campaign-cta">
                  <div data-v-586aba14="" class="campaign-cta__primary-link-container">
                     <a data-v-586aba14="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate?" class="campaign-cta__primary-link">
                        <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button">
                           PLEASE DONATE
                        </button>
                     </a>
                  
                  </div>
                
                  <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button campaign-cta__button--orange">
                     SHARE THIS CAMPAIGN
                     <span data-v-586aba14="" data-v-3bb18fd3="" class="campaign-cta__button__count">
                     </span>
                  </button>
                  <div data-v-63292daa="" data-v-586aba14="">
                     <div data-v-646760a4="" data-v-7ddbc005="" data-v-63292daa="" class="dialog-box js-dialogBoxWrapper" style="position: fixed; display: none;">
                        <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container js-dialog-content">
                           <h3 data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header"><span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                              Successfully shared!
                              </span> <span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                              You're awesome :)
                              </span>
                           </h3>
                           <p data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__lead">
                              Thank you for helping to spread the word!
                           </p>
                           <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__button-container">
                              <button data-v-3bb18fd3="" data-v-7ddbc005="" type="button" class="loading-button shared-successful-dialog__container__button-container__button-close" data-v-646760a4="">
                               Close
                              </button>
                           </div>
                        </div>
                     </div>
                     <div data-v-63292daa="" class="campaign-share-dialog__lightbox js--dismiss-el" style="display: none;">
                        <div data-v-63292daa="" class="campaign-share-dialog__modal">
                           <button data-v-3bb18fd3="" data-v-63292daa="" type="button" class="loading-button campaign-share-dialog__modal__dismiss-button js--dismiss-el loading-button--flat loading-button--gray">
                            <i data-v-63292daa="" data-v-3bb18fd3="" class="fal fa-times campaign-share-dialog__modal__dismiss-button__icon js--dismiss-el"></i>
                           </button>
                           <div data-v-63292daa="" class="campaign-share-dialog__content">
                              <div data-v-63292daa="" class="campaign-share-dialog__content__header">
                                 Share this campaign
                              </div>
                              <div data-v-63292daa="" class="campaign-share-dialog__content__body">
                                 A single share from you will usually lead to at least one donation. Sharing this campaign only takes 10 seconds.
                              </div>
                              <div data-v-63292daa="" class="campaign-share-dialog__content__button-container">
                                 <div data-v-ac876508="" data-v-63292daa="" class="campaign-share">
                                    <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/facebook" target="_blank">
                                       <button data-v-3bb18fd3="" data-v-601f31fe="" data-v-ac876508="" type="button" class="loading-button facebook-button campaign-share__button">
                                        
                                          <span data-v-601f31fe="" data-v-3bb18fd3="" class="facebook-button__content">
                                             <svg data-v-601f31fe="" data-v-3bb18fd3="" width="20" height="20" xmlns="http://www.w3.org/2000/svg" class="facebook-button__icon">
                                                <g data-v-601f31fe="" data-v-3bb18fd3="">
                                                   <title data-v-601f31fe="" data-v-3bb18fd3="">background</title>
                                                   <rect data-v-601f31fe="" data-v-3bb18fd3="" fill="none" id="canvas_background" height="22" width="22" y="-1" x="-1"></rect>
                                                </g>
                                                <g data-v-601f31fe="" data-v-3bb18fd3="">
                                                   <title data-v-601f31fe="" data-v-3bb18fd3="">Layer 1</title>
                                                   <path data-v-601f31fe="" data-v-3bb18fd3="" stroke="null" fill="#ffffff" id="f" d="m10.801958,16.491924l0,-6.567887l2.207833,0l0.328116,-2.558195l-2.53595,0l0,-1.63502c0,-0.739652 0.205768,-1.24573 1.267975,-1.24573l1.356955,0l0,-2.291253c-0.233574,-0.033368 -1.039962,-0.100103 -1.974259,-0.100103c-1.957575,0 -3.292285,1.195678 -3.292285,3.386827l0,1.89084l-2.213395,0l0,2.558195l2.213395,0l0,6.562326l2.641614,0z" class="st0"></path>
                                                </g>
                                             </svg>
                                             SHARE ON FACEBOOK
                                          </span>
                                          <span data-v-601f31fe="" data-v-3bb18fd3="" class="facebook-button__counter" style="display: none;">
                                          </span>
                                       </button>
                                    </a>
                                    <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/linkedin" target="_blank">
                                       <button data-v-3bb18fd3="" data-v-36e0b6be="" data-v-ac876508="" type="button" class="loading-button linkedin-button campaign-share__button">
                                        
                                          <svg data-v-36e0b6be="" data-v-3bb18fd3="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 20 20" version="1.1" class="linkedin-button__icon">
                                             <g data-v-36e0b6be="" data-v-3bb18fd3="" id="surface1">
                                                <path data-v-36e0b6be="" data-v-3bb18fd3="" d="M 20 12.160156 L 20 19.554688 L 15.714844 19.554688 L 15.714844 12.65625 C 15.714844 10.921875 15.09375 9.742188 13.542969 9.742188 C 12.355469 9.742188 11.652344 10.539062 11.34375 11.308594 C 11.230469 11.585938 11.199219 11.96875 11.199219 12.355469 L 11.199219 19.554688 L 6.910156 19.554688 C 6.910156 19.554688 6.96875 7.871094 6.910156 6.660156 L 11.199219 6.660156 L 11.199219 8.488281 C 11.191406 8.503906 11.179688 8.515625 11.171875 8.53125 L 11.199219 8.53125 L 11.199219 8.488281 C 11.769531 7.609375 12.785156 6.359375 15.0625 6.359375 C 17.886719 6.359375 20 8.199219 20 12.160156 Z M 2.425781 0.445312 C 0.960938 0.445312 0 1.40625 0 2.671875 C 0 3.910156 0.933594 4.902344 2.371094 4.902344 L 2.398438 4.902344 C 3.894531 4.902344 4.824219 3.910156 4.824219 2.671875 C 4.796875 1.40625 3.894531 0.445312 2.425781 0.445312 Z M 0.253906 19.554688 L 4.542969 19.554688 L 4.542969 6.660156 L 0.253906 6.660156 Z M 0.253906 19.554688 " style="stroke: none; fill-rule: nonzero; fill: rgb(255, 255, 255); fill-opacity: 1;"></path>
                                             </g>
                                          </svg>
                                          SHARE ON LINKEDIN
                                       </button>
                                    </a>
                                    <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/twitter" target="_blank">
                                       <button data-v-3bb18fd3="" data-v-74f15efc="" data-v-ac876508="" type="button" class="loading-button twitter-button campaign-share__button">
                                        
                                          <svg data-v-74f15efc="" data-v-3bb18fd3="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 612 612" xml:space="preserve" width="20" height="20" class="twitter-button__icon">
                                             <g data-v-74f15efc="" data-v-3bb18fd3="">
                                                <path data-v-74f15efc="" data-v-3bb18fd3="" d="M612,116.258c-22.525,9.981-46.694,16.75-72.088,19.772c25.929-15.527,45.777-40.155,55.184-69.411    c-24.322,14.379-51.169,24.82-79.775,30.48c-22.907-24.437-55.49-39.658-91.63-39.658c-69.334,0-125.551,56.217-125.551,125.513    c0,9.828,1.109,19.427,3.251,28.606C197.065,206.32,104.556,156.337,42.641,80.386c-10.823,18.51-16.98,40.078-16.98,63.101    c0,43.559,22.181,81.993,55.835,104.479c-20.575-0.688-39.926-6.348-56.867-15.756v1.568c0,60.806,43.291,111.554,100.693,123.104    c-10.517,2.83-21.607,4.398-33.08,4.398c-8.107,0-15.947-0.803-23.634-2.333c15.985,49.907,62.336,86.199,117.253,87.194    c-42.947,33.654-97.099,53.655-155.916,53.655c-10.134,0-20.116-0.612-29.944-1.721c55.567,35.681,121.536,56.485,192.438,56.485    c230.948,0,357.188-191.291,357.188-357.188l-0.421-16.253C573.872,163.526,595.211,141.422,612,116.258z" fill="#FFFFFF"></path>
                                             </g>
                                          </svg>
                                          SHARE ON TWITTER
                                       </button>
                                    </a>
                                    <a data-v-ac876508="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/share/whatsapp" target="_blank">
                                       <button data-v-3bb18fd3="" data-v-adafa1a0="" data-v-ac876508="" type="button" class="loading-button whatsapp-button campaign-share__button">
                                        
                                          <svg data-v-adafa1a0="" data-v-3bb18fd3="" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 90 90" xml:space="preserve" class="whatsapp-button__icon">
                                             <g data-v-adafa1a0="" data-v-3bb18fd3="">
                                                <path data-v-adafa1a0="" data-v-3bb18fd3="" id="WhatsApp" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522   c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982   c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537   c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938   c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537   c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333   c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882   c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977   c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344   c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223   C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z" fill="#FFFFFF"></path>
                                             </g>
                                          </svg>
                                          SHARE ON WHATSAPP
                                       </button>
                                    </a>
                                 </div>
                              </div>
                              <div data-v-63292daa="" class="campaign-share-dialog__content__body">
                                 Or print out this flyer and help spread the word
                              </div>
                              <div data-v-b8043b9c="" data-v-63292daa="" class="donate-flyer campaign-share-dialog__content__flyer">
                                 <div data-v-b8043b9c="" id="qrcode" style="display: none;"></div>
                                 <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview donate-flyer__content__flyer-preview--small">
                                    <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-2 donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-2--small">
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__banner donate-flyer__content__flyer-preview__card__banner--small" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_640,h_480,c_fill,g_faces/q_auto/nmbyrvvm5gdaujezumz9.jpg&quot;);"></div>
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content donate-flyer__content__flyer-preview__card__content--small"></div>
                                    </div>
                                    <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-1 donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--behind-1--small">
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__banner donate-flyer__content__flyer-preview__card__banner--small" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_640,h_480,c_fill,g_faces/q_auto/nmbyrvvm5gdaujezumz9.jpg&quot;);"></div>
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content donate-flyer__content__flyer-preview__card__content--small"></div>
                                    </div>
                                    <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card donate-flyer__content__flyer-preview__card--small">
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__banner donate-flyer__content__flyer-preview__card__banner--small" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/w_640,h_480,c_fill,g_faces/q_auto/nmbyrvvm5gdaujezumz9.jpg&quot;);"></div>
                                       <div data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content donate-flyer__content__flyer-preview__card__content--small">
                                          <h3 data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content__header donate-flyer__content__flyer-preview__card__content__header--small">
                                             Give My Premature Twins A Chance [Big Heart for Little Ones]
                                          </h3>
                                          <p data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content__text donate-flyer__content__flyer-preview__card__content__text--small">
                                             Please help us to bring back our extreme premature babies surviving in NICU Myself and my wife would like to seek your help for our new born extreme premature twin babies born on 2...
                                          </p>
                                          <strong data-v-b8043b9c="" class="donate-flyer__content__flyer-preview__card__content__subheader donate-flyer__content__flyer-preview__card__content__subheader--small">
                                          Support us at:
                                          </strong>
                                       </div>
                                    </div>
                                    <img data-v-b8043b9c="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/thankyou-hand.png" class="donate-flyer__content__flyer-preview__hand donate-flyer__content__flyer-preview__hand--small">
                                 </div>
                                 <button data-v-3bb18fd3="" data-v-b8043b9c="" type="button" class="loading-button donate-flyer__content__flyer-button"> 
                                    DOWNLOAD FLYER PDF
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div data-v-586aba14="" class="campaign-cta__mobile-container">
                     <a data-v-586aba14="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate?" class="campaign-cta__mobile-container__primary-link campaign-cta__primary-link--mobile">
                        <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__mobile-container__primary-link__button"> 
                           PLEASE DONATE
                        </button>
                     </a>
                  </div>
               </div>
            </div>
            <div data-v-1de73794="" data-v-44d4f274="" class="campaign-cta-testimonials">
               <div data-v-1de73794="" class="campaign-cta-testimonials__header">TESTIMONIALS</div>
               <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials">
                  <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item">
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__profile-picture" style="background-image: url(&quot;https://graph.facebook.com/2562399983892979/picture?type=large&quot;);"></div>
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content">
                        <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__donor-name">
                           <div data-v-1de73794="">Wong Tuck Kay</div>
                           <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__testimony">Hope I can help more childrens and body and gave them better life.</div>
                        </div>
                     </div>
                  </div>
                  <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item">
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_3.png&quot;);"></div>
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content">
                        <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__donor-name">
                           <div data-v-1de73794="">Ebin</div>
                           <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__testimony">Take care</div>
                        </div>
                     </div>
                  </div>
                  <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item">
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_5.png&quot;);"></div>
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content">
                        <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__donor-name">
                           <div data-v-1de73794="">clementi Oriental hair solutions</div>
                           <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__testimony">Wishing your child a speedy recovery. Take care❤️❤️❤️❤️</div>
                        </div>
                     </div>
                  </div>
                  <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item">
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_5.png&quot;);"></div>
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content">
                        <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__donor-name">
                           <div data-v-1de73794="">Poornima S</div>
                           <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__testimony">Hi Girish, Knew about the twins through Archana. I too have twin girls so I deeply feel for them and pray for them. Get well soon.</div>
                        </div>
                     </div>
                  </div>
                  <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item">
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__profile-picture" style="background-image: url(&quot;https://graph.facebook.com/3053106978166863/picture?type=large&quot;);"></div>
                     <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content">
                        <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__donor-name">
                           <div data-v-1de73794="">Rohil Justin</div>
                           <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__testimony">I know Girish personally and we worked together. Hope everything goes good. My prayers &amp; support with the family</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div data-v-00230a7a="" data-v-44d4f274="" class="campaign-cta-donors">
             
               <div data-v-00230a7a="" class="campaign-cta-donors__donors">
                  <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                        <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$300</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 2 hours ago</span>
                     </div>
                  </div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_2.png&quot;);"></div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                        <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$20</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 2 hours ago</span>
                     </div>
                  </div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                        <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$50</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 3 hours ago</span>
                     </div>
                  </div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Anonymous donor</span></div>
                        <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$10</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 3 hours ago</span>
                     </div>
                  </div>
                  <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_5.png&quot;);"></div>
                     <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
                        <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name"><span data-v-00230a7a="">Alan</span></div>
                        <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">S$300</span> <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">• 5 hours ago</span>
                     </div>
                  </div>
               </div>
               <div data-v-00230a7a="" class="campaign-cta-donors__total"><strong>+ 1797 givers</strong> have donated to this campaign</div>
            </div>
            <div data-v-1bd85365="" data-v-44d4f274="" class="campaign-extra-details">
               <div data-v-1bd85365="" class="campaign-extra-details__section">
                  <div data-v-1bd85365="" class="campaign-extra-details__verification__header"><i data-v-1bd85365="" class="campaign-extra-details__verification__header__icon fas fa-check"></i>
                     VERIFIED BY
                     <span data-v-1bd85365="" class="campaign-extra-details__verification__header__name">
                     GIVE Healthcare
                     </span>
                  </div>
                  <div data-v-1bd85365="" class="campaign-extra-details__verification__text">
                     Our verification process involves contacting and meeting the fundraiser as well as the beneficiary, reviewing financial, medical, and other applicable documents that offer evidence of the need.
                     <a data-v-1bd85365="" href="file:///how-we-work?" target="_blank" class="campaign-extra-details__verification__text__link">LEARN MORE</a>
                  </div>
               </div>
             
               <div data-v-1bd85365="" class="campaign-extra-details__section">
                  <div data-v-23eb39d5="" data-v-1bd85365="" class="campaign-boost-status">
                     <div data-v-23eb39d5="" class="campaign-boost-status__header"><img data-v-23eb39d5="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/fundraise/boost_icon.png" class="campaign-boost-status__header__icon">
                        This Campaign uses Boosting
                     </div>
                     <div data-v-23eb39d5="" class="campaign-boost-status__text">
                        The fundraiser has opted to allocate up to 10% of funds raised for Facebook marketing to create more awareness, helping the campaign reach more people and hit the campaign goal.
                        <span data-v-23eb39d5="" class="campaign-boost-status__text__link" style="color: rgb(235, 0, 140);">
                        LEARN MORE
                        </span>
                     </div>
                     <div data-v-23eb39d5="" class="campaign-page__dialog__lightbox js--dismiss-el" style="display: none;">
                        <div data-v-23eb39d5="" class="campaign-page__dialog__modal campaign-page__dialog__modal--large">
                           <button data-v-3bb18fd3="" data-v-23eb39d5="" type="button" class="loading-button campaign-page__dialog__modal__dismiss-button js--dismiss-el loading-button--flat loading-button--gray">
                            <i data-v-23eb39d5="" data-v-3bb18fd3="" class="fal fa-times campaign-page__dialog__modal__dismiss-button__icon js--dismiss-el"></i>
                           </button>
                           <div data-v-23eb39d5="" class="campaign-page__dialog__content">
                              <h1 data-v-23eb39d5="" class="campaign-page__dialog__content__header campaign-page__dialog__content__header--small">Boosted campaigns</h1>
                              <img data-v-23eb39d5="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/fundraise/boost.jpg" srcset="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/fundraise/boost_2x.jpg 2x, https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/fundraise/boost_3x.jpg 3x" class="campaign-page__dialog__content__banner"> 
                              <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left">Boosted campaigns are campaigns that have up to 10% of their funds allocated for social media marketing. The allocated funds are spent on creating more awareness for the fundraiser on Facebook and Google, helping the fundraiser meet their fundraising target faster.</p>
                              <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left">We help the fundraisers by providing a free service to manage the social marketing campaign to maximize exposure. Most boosted campaigns see as much as 5x in donations for $1 spent on social media marketing channels.</p>
                              <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left">We have successfully helped many campaigns reach their goal through boosting. See below for a couple of success stories.</p>
                              <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left"><a data-v-23eb39d5="" href="https://give.asia/campaign/little_khangs_transplant" class="campaign-page__dialog__content__body__link" style="color: rgb(235, 0, 140);">
                                 Little Khang's transplant
                                 </a>
                                 by Hoan
                                 <br data-v-23eb39d5=""> <a data-v-23eb39d5="" href="https://give.asia/campaign/save_our_son_sos" class="campaign-page__dialog__content__body__link" style="color: rgb(235, 0, 140);">
                                 Save our son
                                 </a>
                                 by Sandeep Kshirsagar
                                 <br data-v-23eb39d5=""> <a data-v-23eb39d5="" href="https://give.asia/campaign/helping_my_son_muhammad_royyan_medical_expenses" class="campaign-page__dialog__content__body__link" style="color: rgb(235, 0, 140);">
                                 Helping my son Muhammad Royyan medical expenses
                                 </a>
                                 by Nur Alam Shah
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div data-v-4747e3fc="" data-v-1bd85365="" class="campaign-fundraiser">
                  <div data-v-4747e3fc="" class="campaign-fundraiser__header">Fundraiser</div>
                  <div data-v-045fc0d9="" data-v-4747e3fc="" class="campaign-owner campaign-fundraiser__owner">
                     <div data-v-045fc0d9="" class="campaign-owner__thumbnail-container"><a data-v-045fc0d9="" href="https://give.asia/user/18waxwofxh1680084968" target="_blank"><span data-v-045fc0d9="" class="campaign-owner__thumbnail-container__thumbnail" style="background-image: url(&quot;<?php echo $avatar; ?>&quot;);"></span></a></div>
                     <div data-v-045fc0d9="" class="campaign-owner__info">
                        <div data-v-045fc0d9="">
                           By
                           <a data-v-045fc0d9="" href="https://give.asia/user/18waxwofxh1680084968" target="_blank" class="campaign-owner__link" style="color: rgb(235, 0, 140);">
                              <?php echo get_the_author(); ?>
                           </a>
                        </div>
                        <p data-v-045fc0d9="" class="campaign-owner__relationship">
                           Family member of the beneficiary
                        </p>
                     </div>
                  </div>
                  <div data-v-4747e3fc="" class="campaign-fundraiser__separator"></div>
                  <a data-v-4747e3fc="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/contact" target="_blank" class="campaign-fundraiser__link">
                     <button data-v-3bb18fd3="" data-v-4747e3fc="" type="button" class="loading-button campaign-fundraiser__link__button campaign-fundraiser__link__button--rounded loading-button--flat loading-button--gray">
                      
                        <div data-v-4747e3fc="" data-v-3bb18fd3="" class="campaign-fundraiser__link__button__text">SEND A MESSAGE</div>
                        <i data-v-4747e3fc="" data-v-3bb18fd3="" class="campaign-fundraiser__link__button__icon fas fa-chevron-right"></i>
                     </button>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php echo get_similiar_campaigns( get_the_ID() ); ?>
</div>