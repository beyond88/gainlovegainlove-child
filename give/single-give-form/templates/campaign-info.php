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
                    <?php echo __('Learn more about', 'gainlove'); ?>
                    <a data-v-609ffe99="" href="#" target="_blank">Trust &amp; Safety</a>
                </div>
            </div>
            <div data-v-0f80c597="" data-v-4fe81988="" class="campaign-giving-guarantee">
                <div data-v-0f80c597="" class="campaign-giving-guarantee__icon">
                    <img data-v-0f80c597="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/campaign/giving-guarantee-icon.svg" alt="giving guarantee">
                </div>
                <div data-v-0f80c597="" class="campaign-giving-guarantee__content">
                    <?php echo __('Your donation is protected with', 'gainlove'); ?>
                    <a data-v-0f80c597="" href="#" target="_blank">
                        <?php echo __('Giving Guarantee', 'gainlove'); ?>
                    </a>
                </div>
            </div>
        </div>
        <div data-v-2bb70eac="" class="campaign-info__section">
            <div data-v-2bb70eac=""><?php echo __('Donations will go to', 'gainlove'); ?> 
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
    
        <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button campaign-cta__button--orange" onClick="showHideContent('', '.campaign-share-info')">
            <?php echo __('SHARE THIS CAMPAIGN', 'gainlove'); ?>
            <span data-v-586aba14="" data-v-3bb18fd3="" class="campaign-cta__button__count"></span>
        </button>

        <div data-v-0ca5f774="" data-v-0d4425d0="">
            <div data-v-646760a4="" data-v-7ddbc005="" data-v-0ca5f774="" class="dialog-box js-dialogBoxWrapper" style="position: fixed;display:none;">
                <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container js-dialog-content">
                    <h3 data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header"><span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                        <?php echo __('Successfully shared!', 'gainlove'); ?> 
                        </span> <span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                            <?php echo __('You\'re awesome :)', 'gainlove'); ?>
                        </span>
                    </h3>
                    <p data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__lead">
                        <?php echo __('Thank you for helping to spread the word!', 'gainlove'); ?>
                    </p>
                    <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__button-container">
                        <button data-v-3bb18fd3="" data-v-7ddbc005="" type="button" class="loading-button shared-successful-dialog__container__button-container__button-close" data-v-646760a4="">
                            <?php echo __('Close', 'gainlove'); ?>
                        </button>
                    </div>
                </div>
            </div>
            <div data-v-0ca5f774="" class="campaign-share-dialog__lightbox js--dismiss-el campaign-share-info" style="display: none;">
                <div data-v-0ca5f774="" class="campaign-share-dialog__modal">
                    <button data-v-3bb18fd3="" data-v-0ca5f774="" type="button" class="loading-button campaign-share-dialog__modal__dismiss-button js--dismiss-el loading-button--flat loading-button--gray" onClick="showHideContent('.campaign-share-info', '')">
                        <i data-v-0ca5f774="" data-v-3bb18fd3="" class="fal fa-times campaign-share-dialog__modal__dismiss-button__icon js--dismiss-el"></i>
                    </button>
                    <div data-v-0ca5f774="" class="campaign-share-dialog__content">
                        <div data-v-0ca5f774="" class="campaign-share-dialog__content__header">
                            <?php echo __('A single share from you can help this campaign raise at least S$25.', 'gainlove'); ?>
                        </div>
                        <div data-v-0ca5f774="" class="campaign-share-dialog__content__body">
                            <?php echo __('Will you spare 10 seconds to share this campaign so that more people can help Carry Hope 2023', 'gainlove'); ?>
                        </div>
                        <div data-v-0ca5f774="" class="campaign-share-dialog__content__buttons-container">
                            <div data-v-fd8b712e="" data-v-0ca5f774="" class="social-media-share">
                                <p data-v-fd8b712e="" class="social-media-share__share-text"><?php echo __('SHARE', 'gainlove'); ?></p>
                                <?php 
                                    $share_url = "I am supporting this fundraising page ";
                                    $share_url .= get_permalink($form_id);
                                ?>
                                <div data-v-fd8b712e="" class="social-media-share__share-buttons">
                                    <div data-v-fd8b712e="" class="social-media-share__button-container">
                                        <a data-v-fd8b712e="" href="https://api.whatsapp.com/send?text=<?php echo $share_url; ?>" data-action="share/whatsapp/share" target="_blank">
                                            <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button whatsapp-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                                <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-whatsapp_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                            </button>
                                            <?php echo __('Whatsapp', 'gainlove'); ?>
                                        </a>
                                    </div>
                                    <div data-v-fd8b712e="" class="social-media-share__button-container">
                                        <a data-v-fd8b712e="" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($form_id)) ?>" target="_blank">
                                            <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button facebook-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                                <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-fb_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                            </button>
                                            <?php echo __('Facebook', 'gainlove'); ?>
                                        </a>
                                    </div>
                                    <div data-v-fd8b712e="" class="social-media-share__button-container">
                                        <a data-v-fd8b712e="" href="https://t.me/share/url?url=<?php echo $share_url; ?>" target="_blank">
                                            <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button telegram-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                                <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-telegram_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                            </button>
                                            <?php echo __('Telegram', 'gainlove'); ?>
                                        </a>
                                    </div>
                                    <div data-v-fd8b712e="" class="social-media-share__button-container">
                                        <a data-v-fd8b712e="" href="https://twitter.com/intent/tweet?text=<?php echo $share_url; ?>" target="_blank">
                                            <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button twitter-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                                <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-twitter_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                            </button>
                                            <?php echo __('Twitter', 'gainlove'); ?>
                                        </a>
                                    </div>
                                    <div data-v-fd8b712e="" class="social-media-share__button-container">
                                        <a data-v-fd8b712e="" href="mailto:type%20email%20address%20here?subject=I am supporting this fundraising page - <?php echo get_the_title(); ?>&body=<?php echo get_the_excerpt(); ?>%20%20%2D%20%20%28%20<?php the_permalink(); ?>%20%29" target="_blank">
                                            <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button email-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                                <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-email_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                            </button>
                                            <?php echo __('Email', 'gainlove'); ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-v-0ca5f774="" class="campaign-share-dialog__content__copy-link">
                            <div data-v-46235af8="" data-v-0ca5f774="" class="input-text campaign-share-dialog__content__copy-link__url-input" readonly="readonly" type="text">
                                <p data-v-46235af8="" class="input-text__label" style="display: none;">
                                </p>
                                <input data-v-46235af8="" type="text" placeholder="" step="1" readonly="readonly" class="input-text__input" value="<?php echo get_permalink($form_id); ?>" id="campaign-info-link-text"> 
                                <p data-v-46235af8="" class="input-text__error" style="display: none;"></p>
                            </div>
                            <button data-v-3bb18fd3="" data-v-0ca5f774="" type="button" class="loading-button campaign-share-dialog__content__copy-link__button" onClick="copyToClipboard('#campaign-info-link-text')">
                                <span data-v-0ca5f774="" data-v-3bb18fd3="" class="campaign-share-dialog__content__copy-link__button__label--hidden-lg">
                                    <?php echo __('COPY', 'gainlove'); ?>
                                </span> 
                                <span data-v-0ca5f774="" data-v-3bb18fd3="" class="campaign-share-dialog__content__copy-link__button__label--hidden-sm">
                                    <?php echo __('COPY LINK', 'gainlove'); ?>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>