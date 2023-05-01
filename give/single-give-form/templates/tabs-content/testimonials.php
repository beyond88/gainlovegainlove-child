<div data-v-e9cf4a2a="" class="campaign-testimonials campaign-tab" id="campaign-testimonials">
    <div data-v-618ad9c0="" class="campaign-testimonials__feed" id="campaign-testimonials__feed">
    <?php 
        $per_page = 5;
        $page_no = 1; 
        $testimonials = testimonials_query( $form_id, $per_page, $page_no );
        if( ! empty( $testimonials ) ) {
            foreach( $testimonials as $item ) {
                $random = mt_rand(1, 20);
                $avatar_url = "https://www.gravatar.com/avatar/".$random."?s=32&d=identicon&r=PG";
        ?>
        <div data-v-618ad9c0="">
            <div data-v-7eca26c6="" data-v-618ad9c0="" class="transaction-item">
                <a data-v-7eca26c6="" href="#">
                    <div data-v-7eca26c6="" class="transaction-item__thumbnail" style="background-image: url(&quot;<?php echo esc_url($avatar_url); ?>&quot;);"></div>
                </a>
                <div data-v-7eca26c6="" class="transaction-item__content">
                    <div data-v-7eca26c6="" class="transaction-item__content__info">
                        <span data-v-7eca26c6="">
                            <a data-v-7eca26c6="" href="#" target="_blank" class="transaction-item__content__info__donor">
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
            <?php echo __('There\'s no testimonials on this campaign yet. Join as a donor and give a testimonials!', 'gainlove'); ?>
        </div>
        <?php } ?>
    </div>
    <?php if( $total_testimonials > $per_page ) { ?>
    <div data-v-618ad9c0="" class="campaign-testimonials__feed see-more-testimonials-area">
        <div data-v-618ad9c0="" class="campaign-testimonials__feed__button-container">
            <button data-v-3bb18fd3="" data-v-618ad9c0="" type="button" class="loading-button campaign-testimonials__feed__button-container__button loading-button--flat" id="see-more-testimonials" data-page-no="2" data-per-page="1">
                <?php echo __('SEE MORE TESTIMONIALS', 'gainlove'); ?>
            </button>
        </div>
    </div>
    <?php } ?>
</div>