<div data-v-00230a7a="" data-v-44d4f274="" class="campaign-cta-donors">
   
   <div data-v-00230a7a="" class="campaign-cta-donors__donors">
      <?php 
         $donors = donation_query( $form_id );
         if( ! empty( $donors ) ) {
            $i = 0;
            foreach( $donors as $item ) {

               $random = mt_rand(1, 20);
               $avatar_url = "https://www.gravatar.com/avatar/".$random."?s=32&d=identicon&r=PG";
               $donation_id = $item['donation_id'];

               $fee_amount = give_get_meta( $donation_id, '_give_fee_amount', true );
               
               if( ! isset( $fee_amount ) ) {
                   $fee_amount = 0;
               }

               $tip_amount = give_get_meta( $donation_id, '_give_tip_amount', true );
               if( ! isset( $tip_amount ) ) {
                   $tip_amount = 0;
               }

               $amount = number_format( (float) $item['amount'], 2 );
               $amount = ( $amount - (float) $fee_amount ) - (float) $tip_amount;
               $amount = give_currency_filter( $amount, array( 'form_id' => $form_id ) );
      ?>
      <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
         <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;<?php echo esc_url($avatar_url); ?>&quot;);"></div>
         <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
            <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name">
               <span data-v-00230a7a="">
                  <?php echo esc_attr( $item['first_name'] ).' '. esc_attr( $item['last_name'] ); ?>
               </span>
            </div>
            <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">
               <?php echo esc_attr( $amount ); ?>
            </span> 
            <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__created-at">
               • <?php echo gainlove_time_ago( $item['donation_date'] ); ?>
            </span>
         </div>
      </div>
      <?php 
         if( $i == 4 ){
            break;
         }
         $i++;
         } ?>
      <?php } ?>
   </div>
   <?php if( ! empty( $donations ) ) {
      $total_donation = count(donation_query( $form_id, 5000000, 1 ));
      $target_donation = 5;
      $more_donation = 0;
      
      if( $total_donation > $target_donation ){
         $more_donation = $total_donation - $target_donation;
      }    
    ?>
   <div data-v-00230a7a="" class="campaign-cta-donors__total">
      <strong>+ <?php echo $more_donation; ?>
         <?php echo __('givers', 'gainlove'); ?>
      </strong> 
      <?php echo __('have donated to this campaign', 'gainlove'); ?>
   </div>
   <?php } ?>
</div>