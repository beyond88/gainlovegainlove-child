<div data-v-e9cf4a2a="" class="campaign-testimonials campaign-tab" id="campaign-testimonials">
    <div data-v-618ad9c0="" class="campaign-testimonials__feed" id="campaign-testimonials__feed">
    <?php 
        
        $per_page = 1;
        $page_no = 1; 
        $testimonials = testimonials_query( $form_id, $per_page, $page_no );
        if( ! empty( $testimonials ) ) {
            foreach( $testimonials as $item ) {
        ?>
        <div data-v-618ad9c0="">
            <div data-v-7eca26c6="" data-v-618ad9c0="" class="transaction-item">
                <a data-v-7eca26c6="" href="#">
                    <div data-v-7eca26c6="" class="transaction-item__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_5.png&quot;);"></div>
                </a>
                <div data-v-7eca26c6="" class="transaction-item__content">
                    <div data-v-7eca26c6="" class="transaction-item__content__info">
                        <span data-v-7eca26c6="">
                            <a data-v-7eca26c6="" href="https://give.asia/user/hgohl0lanh1682143728" target="_blank" class="transaction-item__content__info__donor">
                                <?php echo $item['name']; ?>
                            </a>
                        </span>
                    </div>
                    <div data-v-7eca26c6="" class="transaction-item__content__comment">
                        <?php echo $item['comment_content']; ?>
                    </div>
                </div>
            </div>
            <hr data-v-618ad9c0="" class="campaign-testimonials__feed__item__separator">
        </div>
        <?php } 
            } else { ?>
        <div data-v-e9cf4a2a="" class="campaign-story__description">
            <?php echo __('There\'s no activities on this campaign yet. Join as a donor and request for an activities!', 'gainlove'); ?>
        </div>
        <?php } ?>
    </div>
    <?php if( $total_testimonials > $per_page ) { ?>
    <div data-v-618ad9c0="" class="campaign-testimonials__feed see-more-testimonials-area">
        <div data-v-618ad9c0="" class="campaign-testimonials__feed__button-container">
            <button data-v-3bb18fd3="" data-v-618ad9c0="" type="button" class="loading-button campaign-testimonials__feed__button-container__button loading-button--flat" id="see-more-testimonials" data-page-no="2" data-per-page="5">
                <?php echo __('SEE MORE TESTIMONIALS', 'gainlove'); ?>
            </button>
        </div>
    </div>
    <?php } ?>
</div>