<div data-v-00230a7a="" data-v-e9cf4a2a="" class="campaign-cta-donors campaign-story__cta-donors--mobile-hidden" id="bottom-donate-part">
    <div data-v-00230a7a="" class="campaign-cta-donors__header">
        <?php echo get_the_title(); ?>
    </div>
    <div data-v-586aba14="" data-v-e9cf4a2a="" class="campaign-cta campaign-cta-donors__cta" data-v-00230a7a="">
        <div data-v-586aba14="" class="campaign-cta__primary-link-container campaign-cta__primary-link-container--donors-position">
            <a data-v-586aba14="" href="https://give.asia/campaign/give-my-premature-twins-a-chance/donate?" class="campaign-cta__primary-link">
                <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button">
                    <?php echo __('PLEASE DONATE', 'gainlove'); ?>
                </button>
            </a>
        </div>
    
        <button data-v-3bb18fd3="" data-v-586aba14="" type="button" class="loading-button campaign-cta__button campaign-cta__button--orange gainlove-share-button" onClick="showHideContent('', '.bottom-donate-share-part')">
            <?php echo __('SHARE THIS CAMPAIGN', 'gainlove'); ?>
            <span data-v-586aba14="" data-v-3bb18fd3="" class="campaign-cta__button__count"></span>
        </button>
        <div data-v-0ca5f774="" data-v-0d4425d0="">
            <div data-v-646760a4="" data-v-7ddbc005="" data-v-0ca5f774="" class="dialog-box js-dialogBoxWrapper campaign-share-success" style="position: fixed; display: none;">
                <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container js-dialog-content">
                    <h3 data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header">
                        <span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                            <?php echo __('Successfully shared!', 'gainlove'); ?>
                        </span> 
                        <span data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__header__text">
                            <?php echo __('You\'re awesome :)', 'gainlove'); ?>
                        </span>
                    </h3>
                    <p data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__lead">
                        <?php echo __('Thank you for helping to spread the word!', 'gainlove'); ?>
                    </p>
                    <div data-v-7ddbc005="" data-v-646760a4="" class="shared-successful-dialog__container__button-container">
                        <button data-v-3bb18fd3="" data-v-7ddbc005="" type="button" class="loading-button shared-successful-dialog__container__button-container__button-close" data-v-646760a4="" onClick="showHideContent('.campaign-share-success', '')">
                            <?php echo __('Close', 'gainlove'); ?>
                        </button>
                    </div>
                </div>
            </div>

            <div data-v-0ca5f774="" class="campaign-share-dialog__lightbox js--dismiss-el bottom-donate-share-part" style="display: none;">
                <div data-v-0ca5f774="" class="campaign-share-dialog__modal">
                    <button data-v-3bb18fd3="" data-v-0ca5f774="" type="button" class="loading-button campaign-share-dialog__modal__dismiss-button js--dismiss-el loading-button--flat loading-button--gray" onClick="showHideContent('.bottom-donate-share-part', '')">
                        <i data-v-0ca5f774="" data-v-3bb18fd3="" class="fal fa-times campaign-share-dialog__modal__dismiss-button__icon js--dismiss-el"></i>
                    </button>
                    <div data-v-0ca5f774="" class="campaign-share-dialog__content">
                        <div data-v-0ca5f774="" class="campaign-share-dialog__content__header">
                            <?php echo __('A single share from you can help this campaign raise at least S$25.', 'gainlove'); ?>
                        </div>
                        <div data-v-0ca5f774="" class="campaign-share-dialog__content__body">
                            <?php 
                                echo __('Will you spare 10 seconds to share this campaign so that more people can help Carry Hope 2023?','gainlove');
                            ?>
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
                                    <a data-v-fd8b712e="" href="https://api.whatsapp.com/send?text=<?php echo $share_url; ?>" data-action="share/whatsapp/share" target="_blank" onClick="showHideContent('.bottom-donate-share-part', '.campaign-share-success')">
                                        <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button whatsapp-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                            <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-whatsapp_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                        </button>
                                        <?php echo __('Whatsapp', 'gainlove'); ?>
                                    </a>
                                </div>
                                <div data-v-fd8b712e="" class="social-media-share__button-container">
                                    <a data-v-fd8b712e="" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink($form_id)) ?>" target="_blank" onClick="showHideContent('.bottom-donate-share-part', '.campaign-share-success')">
                                        <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button facebook-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                            <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-fb_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                        </button>
                                        <?php echo __('Facebook', 'gainlove'); ?>
                                    </a>
                                </div>
                                <div data-v-fd8b712e="" class="social-media-share__button-container">
                                    <a data-v-fd8b712e="" href="https://t.me/share/url?url=<?php echo $share_url; ?>" target="_blank" onClick="showHideContent('.bottom-donate-share-part', '.campaign-share-success')">
                                        <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button telegram-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                            <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-telegram_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                        </button>
                                        <?php echo __('Telegram', 'gainlove'); ?>
                                    </a>
                                </div>
                                <div data-v-fd8b712e="" class="social-media-share__button-container">
                                    <a data-v-fd8b712e="" href="https://twitter.com/intent/tweet?text=<?php echo $share_url; ?>" target="_blank" onClick="showHideContent('.bottom-donate-share-part', '.campaign-share-success')">
                                        <button data-v-3bb18fd3="" data-v-fd8b712e="" type="button" class="loading-button social-media-share__button-container__button twitter-button loading-button--flat loading-button--rounded-full loading-button--transparent">
                                            <img data-v-fd8b712e="" data-v-3bb18fd3="" src="https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/donate/share/shareBtn-twitter_2x.png" alt="" class="social-media-share__button-container__button__icon">
                                        </button>
                                        <?php echo __('Twitter', 'gainlove'); ?>
                                    </a>
                                </div>
                                <div data-v-fd8b712e="" class="social-media-share__button-container">
                                    <a data-v-fd8b712e="" href="mailto:type%20email%20address%20here?subject=I am supporting this fundraising page - <?php echo get_the_title(); ?>&body=<?php echo get_the_excerpt(); ?>%20%20%2D%20%20%28%20<?php the_permalink(); ?>%20%29" target="_blank" onClick="showHideContent('.bottom-donate-share-part', '.campaign-share-success')">
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
                            <input data-v-46235af8="" type="text" placeholder="" step="1" readonly="readonly" class="input-text__input" id="campaign-link-text" value="<?php echo get_permalink($form_id); ?>"> 
                            <p data-v-46235af8="" class="input-text__error" style="display: none;"></p>
                        </div>
                        <button data-v-3bb18fd3="" data-v-0ca5f774="" type="button" class="loading-button campaign-share-dialog__content__copy-link__button" onClick="copyToClipboard('#campaign-link-text')">
                            <span data-v-0ca5f774="" data-v-3bb18fd3="" class="campaign-share-dialog__content__copy-link__button__label--hidden-lg">COPY</span> 
                            <span data-v-0ca5f774="" data-v-3bb18fd3="" class="campaign-share-dialog__content__copy-link__button__label--hidden-sm">COPY LINK</span>
                        </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div data-v-00230a7a="" class="campaign-cta-donors__separator"></div>
    <div data-v-00230a7a="" class="campaign-cta-donors__donors">
        <?php 
            $donations = top_donors_query( $form_id );
            if( ! empty( $donations ) ) {
               $i = 0;
               foreach( $donations as $item ) {
        ?>
            <div data-v-00230a7a="" class="campaign-cta-donors__donors__item">
                <div data-v-00230a7a="" class="campaign-cta-donors__donors__item__profile-picture" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
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
        $total_donation = count(top_donors_query( $form_id, 5000000, 1 ));
        $target_donation = 5;
        $more_donation = 0;
        
        if( $total_donation > $target_donation ){
            $more_donation = $total_donation - $target_donation;
        }    
    ?>
    <div data-v-00230a7a="" class="campaign-cta-donors__total">
        <strong>+ <?php echo $more_donation;?> 
        <?php echo __('givers', 'gainlove'); ?></strong> 
        <?php echo __('have donated to this campaign', 'gainlove'); ?>
    </div>
    <?php } ?>
    </div>
</div>