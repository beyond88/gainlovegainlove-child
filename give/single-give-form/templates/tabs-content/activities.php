<div data-v-e9cf4a2a="" class="campaign-activities campaign-tab" id="campaign-activities">
    <div data-v-8c160544="" class="campaign-activities__feed" id="campaign-activities__feed">
        <?php 
        
        $per_page = 5;
        $page_no = 1; 
        $donors = donation_query( $form_id, $per_page, $page_no );
        if( ! empty( $donors ) ) {
            foreach( $donors as $item ) {
                $random = mt_rand(1, 20);
                $avatar_url = "https://www.gravatar.com/avatar/".$random."?s=32&d=identicon&r=PG";
        ?>
        <div data-v-8c160544="" id="<?php echo $item['donation_id']; ?>">
            <div data-v-854f8146="" data-v-8c160544="" class="transaction-item">
                <div data-v-854f8146="" class="transaction-item__thumbnail" style="background-image: url(&quot;<?php echo esc_url($avatar_url); ?>&quot;);"></div>
                <div data-v-854f8146="" class="transaction-item__content">
                    <div data-v-854f8146="" class="transaction-item__content__info">
                        <strong data-v-854f8146="" class="transaction-item__content__info__donor">
                            <?php echo $item['first_name'] .' '. $item['last_name']; ?>
                        </strong>
                            <?php echo __('has donated', 'gainlove'); ?>
                        <span data-v-854f8146="" class="transaction-item__content__info__amount">
                            <?php echo $item['currency'] .' '. $item['amount']; ?>
                        </span> 
                    </div>
                    <span data-v-854f8146="" class="transaction-elapsed-time transaction-item__content__info__time">
                        <?php echo gainlove_time_ago( $item['donation_date'] ); ?>
                    </span>
                </div>
            </div>
            <hr data-v-8c160544="" class="campaign-activities__feed__item__separator">
        </div>
        <?php } 
            } else { ?>
        <div data-v-e9cf4a2a="" class="campaign-story__description">
            <?php echo __('There\'s no activities on this campaign yet. Join as a donor and request for an activities!', 'gainlove'); ?>
        </div>
        <?php } ?>
    </div>
    <?php if( $total_activities > $per_page ) { ?>
    <div data-v-8c160544="" class="campaign-activities__feed see-more-activties-area">
        <div data-v-8c160544="" class="campaign-activities__feed__button-container">
            <button data-v-3bb18fd3="" data-v-8c160544="" type="button" class="loading-button campaign-activities__feed__button-container__button loading-button--flat" id="see-more-activties" data-page-no="2" data-per-page="5">
                <?php echo __('SEE MORE ACTIVITIES', 'gainlove'); ?>
            </button>
        </div>
    </div>
    <?php } ?>
</div>