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

      <?php include 'templates/content.php'; ?>

      <div class="campaign-page__container__col campaign-page__container__col--sidebar">
         
         <div data-v-44d4f274="" class="campaign-sidebar">
            
            <?php include 'templates/campaign-info.php'; ?>

            <?php include 'templates/testimonials.php'; ?>

            <?php include 'templates/donors.php'; ?>

            <div data-v-1bd85365="" data-v-44d4f274="" class="campaign-extra-details">

               <?php include 'templates/verified.php'; ?>
             
               <?php include 'templates/boosting.php'; ?>

               <?php include 'templates/fundraiser.php'; ?>

            </div>
         </div>
      </div>
   </div>
   
   <?php include 'templates/similiar-campaigns.php'; ?>
   <input type="hidden" id="gainlove_form_id" value="<?php echo $form_id; ?>">
</div>