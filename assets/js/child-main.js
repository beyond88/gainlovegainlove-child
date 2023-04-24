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
      $(this).addClass("campaign-tabs__tab--selected");

      const targetTabContent = $(this).data('tab-id');
      console.log('Current tab==>', targetTabContent);
      $(".campaign-tabs__tab").each(function(index, item) {
        let currentTabContent = $(this).data('tab-id');
        if( typeof currentTabContent != "undefined" ){   
          if( currentTabContent === targetTabContent ){
            $('#'+currentTabContent).show();
            // $(this).addClass("campaign-tabs__tab--selected");
            // $(this).removeClass("campaign-tabs__tab--unselected");
          } else {
            if( typeof targetTabContent !== "undefined"){
              $('#'+currentTabContent).hide();
              //$(this).addClass("campaign-tabs__tab--unselected");
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