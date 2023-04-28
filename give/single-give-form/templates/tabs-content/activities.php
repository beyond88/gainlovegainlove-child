<div data-v-e9cf4a2a="" class="campaign-activities campaign-tab" id="campaign-activities">
    <div data-v-8c160544="" class="campaign-activities__feed" id="campaign-activities__feed">
        <?php 
        
        $donors = donation_query( $form_id, 5, 1 );
        if( ! empty( $donors ) ) {
            foreach( $donors as $item ) {
        ?>
        <div data-v-8c160544="" id="<?php echo $item['donation_id']; ?>">
            <div data-v-854f8146="" data-v-8c160544="" class="transaction-item">
                <div data-v-854f8146="" class="transaction-item__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/default_profile_images/default_profile_2.png&quot;);"></div>
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
    <div data-v-8c160544="" class="campaign-activities__feed">
        <div data-v-8c160544="" class="campaign-activities__feed__button-container">
            <button data-v-3bb18fd3="" data-v-8c160544="" type="button" class="loading-button campaign-activities__feed__button-container__button loading-button--flat" id="see-more-activties" data-page-no="2" data-per-page="5">
                <?php echo __('SEE MORE ACTIVITIES', 'gainlove'); ?>
            </button>
        </div>
    </div>
</div>