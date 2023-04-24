(function($, window, document ) {
    'use strict';

$( document ).ready(function() {

    /************************
     * 
     * Sidebar handle
     * 
     ************************/
    $(".campaign-tabs__tab").click(function() {
      $(".campaign-tabs__tab").removeClass("campaign-tabs__tab--selected");
      //$(".campaign-tabs__tab").removeClass("campaign-tabs__tab--unselected");
      $(this).addClass("campaign-tabs__tab--selected");
      const targetTabContent = $(this).data('tab-id');
      $(".campaign-tabs__tab").each(function(index, item) {
        let currentTabContent = $(this).data('tab-id');
        if( typeof currentTabContent != "undefined" ){   
          if( currentTabContent === targetTabContent ){
            $('#'+currentTabContent).show();
            $(this).addClass("campaign-tabs__tab--selected");
          } else {
            if( typeof targetTabContent !== "undefined"){
              $('#'+currentTabContent).hide();
            }
          }
        }
      });
    });

  });
  
})(jQuery, window, document);

/************************
 * 
 * Open and close content
 * 
 ************************/
function showHideContent(that, targetId) {
    jQuery(that).hide();
    jQuery(targetId).show();
};