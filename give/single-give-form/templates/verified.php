<?php 
    $verified_details = give_get_option( 'give_kindness_verify_details' );
    if( ! empty( $verified_details ) ):
?>
    <div data-v-1bd85365="" class="campaign-extra-details__section">
        <div data-v-1bd85365="" class="campaign-extra-details__verification__header Hossain">
            <i data-v-1bd85365="" class="campaign-extra-details__verification__header__icon fas fa-check"></i>
            VERIFIED BY
            <span data-v-1bd85365="" class="campaign-extra-details__verification__header__name">
                GIVE Healthcare
            </span>
        </div>
        <div data-v-1bd85365="" class="campaign-extra-details__verification__text">
            <?php echo $verified_details; ?>
        </div>
    </div>
<?php endif; ?>