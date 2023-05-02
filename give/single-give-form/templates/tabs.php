<div data-v-41aa2c30="" data-v-1d3087a2="" class="campaign-tabs campaign-nav__fixed-tabs js-fixedNavTabs">
    
    <?php 
        $total_activities = donation_query( $form_id, 50000000, 1 ); 
        if( count($total_activities) ) {
            $total_activities = thousands_currency_format( count( $total_activities )  );
        } else {
            $total_activities = 0;
        }

        $total_testimonials = testimonials_query( $form_id, 50000000, 1 ); 
        if( count($total_testimonials) ) {
            $total_testimonials = thousands_currency_format( count( $total_testimonials )  );
        } else {
            $total_testimonials = 0;
        }
    ?>

    <div data-v-41aa2c30="" class="campaign-tabs__outer">
        <div data-v-41aa2c30="" class="campaign-tabs__inner">
            <a data-v-41aa2c30="" href="javascript:void(0);" data-tab-id="campaign-story" class="campaign-tabs__tab campaign-tabs__tab--selected">
                <?php echo __('Story', 'gainlove'); ?>
            </a> 
            <a data-v-41aa2c30="" href="javascript:void(0);" data-tab-id="campaign-updates" class="campaign-tabs__tab campaign-tabs__tab--updates campaign-tabs__tab--unselected">
                <?php echo __('Updates', 'gainlove'); ?>
                <span data-v-41aa2c30="" class="campaign-tabs__tab__count campaign-tabs__tab__count--unselected" style="background-color: #ff9f0d;">0</span>
            </a> 
            <a data-v-41aa2c30="" href="javascript:void(0);" data-tab-id="campaign-activities" class="campaign-tabs__tab campaign-tabs__tab--activities campaign-tabs__tab--unselected">
                <?php echo __('Activities', 'gainlove'); ?>
                <span data-v-41aa2c30="" class="campaign-tabs__tab__count campaign-tabs__tab__count--unselected" style="background-color: #ff9f0d;">
                    <?php echo $total_activities; ?>
                </span>
            </a> 
            <a data-v-41aa2c30="" href="javascript:void(0);" data-tab-id="campaign-testimonials" class="campaign-tabs__tab campaign-tabs__tab--testimonials campaign-tabs__tab--unselected">
                <?php echo __('Testimonials', 'gainlove'); ?>
            </a> 
            <a data-v-41aa2c30="" href="javascript:void(0);" data-tab-id="campaign-top-donors" class="campaign-tabs__tab campaign-tabs__tab--top-donors campaign-tabs__tab--unselected">
                <?php echo __('Top Donors', 'gainlove'); ?>
            </a>
        </div>
    </div>
</div>