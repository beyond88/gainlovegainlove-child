<div data-v-44d4f274="" class="campaign-sidebar--mobile-hidden">
    <div data-v-045fc0d9="" data-v-44d4f274="" class="campaign-owner">
        <div data-v-045fc0d9="" class="campaign-owner__thumbnail-container">
            <a data-v-045fc0d9="" href="https://give.asia/user/18waxwofxh1680084968" target="_blank">
                <span data-v-045fc0d9="" class="campaign-owner__thumbnail-container__thumbnail" style="background-image: url(&quot;<?php echo $avatar; ?>&quot;);"></span>
            </a>
        </div>
        <div data-v-045fc0d9="" class="campaign-owner__info">
            <div data-v-045fc0d9="">
                <?php echo __('By', 'gainlove'); ?>
                <a data-v-045fc0d9="" href="https://give.asia/user/18waxwofxh1680084968" target="_blank" class="campaign-owner__link" style="color: rgb(235, 0, 140);">
                    <?php echo get_the_author(); ?>
                </a>
            </div>
            <p data-v-045fc0d9="" class="campaign-owner__relationship">
                <?php echo __('Family member of the beneficiary', 'gainlove'); ?>
            </p>
        </div>
    </div>
    <div data-v-2bb70eac="" data-v-44d4f274="" class="campaign-info">
    
        <div data-v-6e670434="" data-v-2bb70eac="" class="campaign-progress campaign-info__progress">
            <div data-v-6e670434="" class="campaign-progress__container">
                <h2 data-v-6e670434="" class="campaign-progress__text">
                    <?php echo give_currency_filter($income, array('form_id' => $form_id)); ?> <?php echo __('Raised', 'gainlove'); ?>
                </h2>
                <div data-v-6e670434="" class="campaign-progress__subtext">
                    (Inc S$34,419 Raised Offline)
                </div>
                <p data-v-6e670434="" class="campaign-progress__subtext">
                    <?php echo sprintf( __('Of %s Goal', 'gainlove'), give_currency_filter($goal, array('form_id' => $form_id)) ); ?>
                </p>
                <div data-v-6e670434="" class="campaign-progress__bar">
                    <div data-v-6e670434="" class="campaign-progress__bar__progress" style="width: <?php echo $progress; ?>%; background-image: linear-gradient(267deg, rgb(235, 0, 140), rgb(239, 169, 109));"></div>
                </div>
                <p data-v-6e670434="" class="campaign-progress__subtext"> 
                    <?php echo sprintf( __('from %s Givers', 'gainlove'), give_get_form_donor_count($form_id) ); ?>
                </p>
            </div>
        </div>
    
        <div data-v-4fe81988="" data-v-2bb70eac="" class="campaign-verification-summary">
            <div data-v-4fe81988="" class="campaign-verification-summary__item">
                <i data-v-4fe81988="" class="campaign-verification-summary__item__icon fas fa-check"></i> 
                <div data-v-4fe81988="" class="campaign-verification-summary__item__content">
                    <?php echo __('VERIFIED BY', 'gainlove'); ?>
                    <span data-v-4fe81988="" class="campaign-verification-summary__item__content__name">
                        <?php echo bloginfo(); ?>
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
                    <?php echo __('PLEASE DONATE', 'gainlove'); ?>
                </button>
            </a>
        </div>
    
        <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button campaign-cta__button--orange" onClick="showHideContent('', '.campaign-share-dialog__lightbox')">
            <?php echo __('SHARE THIS CAMPAIGN', 'gainlove'); ?>
            <span data-v-586aba14="" data-v-3bb18fd3="" class="campaign-cta__button__count"></span>
        </button>
    </div>
</div>