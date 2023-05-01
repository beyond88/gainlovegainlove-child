   <div data-v-1de73794="" data-v-44d4f274="" class="campaign-cta-testimonials">
      <div data-v-1de73794="" class="campaign-cta-testimonials__header">TESTIMONIALS</div>
      <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials">
         <?php 
            if( ! empty( $testimonials ) ) {
               foreach( $testimonials as $item ) {
                  $random = mt_rand(1, 20);
                  $avatar_url = "https://www.gravatar.com/avatar/".$random."?s=32&d=identicon&r=PG";
         ?>
      
         <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item">
            <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__profile-picture" style="background-image: url(&quot;<?php echo esc_url($avatar_url); ?>&quot;);"></div>
            <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content">
               <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__donor-name">
                  <div data-v-1de73794="">
                     <?php echo $item['name']; ?>
                  </div>
                  <div data-v-1de73794="" class="campaign-cta-testimonials__testimonials__item__content__testimony">
                     <?php echo $item['comment_content']; ?>
                  </div>
               </div>
            </div>
         </div>
         <?php } ?>
         <?php } ?>
      </div>
   </div>