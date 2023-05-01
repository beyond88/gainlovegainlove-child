<div data-v-00230a7a="" data-v-44d4f274="" class="campaign-cta-donors">
   
   <div data-v-00230a7a="" class="campaign-cta-donors__donors">
      <?php 
         $donors = donation_query( $form_id );
         if( ! empty( $donors ) ) {
            $i = 0;
            foreach( $donors as $item ) {

               $random = mt_rand(1, 20);
               $avatar_url = "https://www.gravatar.com/avatar/".$random."?s=32&d=identicon&r=PG";
      ?>
      <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
         <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;<?php echo esc_url($avatar_url); ?>&quot;);"></div>
         <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content">
            <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__donor-name">
               <span data-v-00230a7a="">
                  <?php echo $item['first_name'].' '.$item['last_name']; ?>
               </span>
            </div>
            <span data-v-00230a7a="" class="campaign-cta-donors__donors__item__content__amount">
               <?php echo $form_currency.number_format($item['amount'], 0); ?>
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