<?php 
    $boosting = give_get_option( 'give_kindness_boosting' );
    $boosting_popup = give_get_option( 'give_kindness_boosting_popup' );
    if( ! empty( $boosting ) ):
?>
<div data-v-1bd85365="" class="campaign-extra-details__section">
    <div data-v-23eb39d5="" data-v-1bd85365="" class="campaign-boost-status">
        <div data-v-23eb39d5="" class="campaign-boost-status__header">
            <img data-v-23eb39d5="" src="<?php echo ASSETS_URL; ?>img/boost_icon.png" class="campaign-boost-status__header__icon">
            <?php echo __('This Campaign uses Boosting', 'gainlove'); ?>
        </div>
        <div data-v-23eb39d5="" class="campaign-boost-status__text">
            <?php echo $boosting; ?>
            <?php if( ! empty($boosting_popup) ): ?>
            <span data-v-23eb39d5="" class="campaign-boost-status__text__link" style="color: #ff9f0d;" onclick="showHideContent('','.campaign-page__dialog__lightbox')">
                <?php echo __('LEARN MORE', 'gainlove'); ?>
            </span>
            <?php endif; ?>
        </div>
        <div data-v-23eb39d5="" class="campaign-page__dialog__lightbox js--dismiss-el" style="display: none;">
            <div data-v-23eb39d5="" class="campaign-page__dialog__modal campaign-page__dialog__modal--large">
                <button data-v-3bb18fd3="" data-v-23eb39d5="" type="button" class="loading-button campaign-page__dialog__modal__dismiss-button js--dismiss-el loading-button--flat loading-button--gray" onclick="showHideContent('.campaign-page__dialog__lightbox', '')">
                    <i data-v-23eb39d5="" data-v-3bb18fd3="" class="fal fa-times campaign-page__dialog__modal__dismiss-button__icon js--dismiss-el"></i>
                </button>
                <!-- <div data-v-23eb39d5="" class="campaign-page__dialog__content">
                    <h1 data-v-23eb39d5="" class="campaign-page__dialog__content__header campaign-page__dialog__content__header--small">Boosted campaigns</h1>
                    <img data-v-23eb39d5="" src="<?php echo ASSETS_URL; ?>img/boost.jpg" srcset="<?php echo ASSETS_URL; ?>img/boost_2x.jpg 2x, <?php echo ASSETS_URL; ?>img/boost_3x.jpg 3x" class="campaign-page__dialog__content__banner"> 
                    <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left">Boosted campaigns are campaigns that have up to 10% of their funds allocated for social media marketing. The allocated funds are spent on creating more awareness for the fundraiser on Facebook and Google, helping the fundraiser meet their fundraising target faster.</p>
                    <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left">We help the fundraisers by providing a free service to manage the social marketing campaign to maximize exposure. Most boosted campaigns see as much as 5x in donations for $1 spent on social media marketing channels.</p>
                    <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left">We have successfully helped many campaigns reach their goal through boosting. See below for a couple of success stories.</p>
                    <p data-v-23eb39d5="" class="campaign-page__dialog__content__body campaign-page__dialog__content__body--left"><a data-v-23eb39d5="" href="#" class="campaign-page__dialog__content__body__link" style="color: rgb(235, 0, 140);">
                        Little Khang's transplant
                        </a>
                        by Hoan
                        <br data-v-23eb39d5=""> <a data-v-23eb39d5="" href="#" class="campaign-page__dialog__content__body__link" style="color: rgb(235, 0, 140);">
                        Save our son
                        </a>
                        by Sandeep Kshirsagar
                        <br data-v-23eb39d5=""> <a data-v-23eb39d5="" href="#" class="campaign-page__dialog__content__body__link" style="color: rgb(235, 0, 140);">
                        Helping my son Muhammad Royyan medical expenses
                        </a>
                        by Nur Alam Shah
                    </p>
                </div> -->
                <?php echo $boosting_popup; ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>