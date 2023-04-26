(function($, window, document ) {
    'use strict';

$( document ).ready(function() {

    /************************
     * 
     * Tabs handle
     * 
     ************************/
    $.fn.ajaxCall = function(args) {
        $.ajax({
            type: args.method,
            dataType: 'json',
            headers: {'X-WP-Nonce': gainlove_ajax.apiNonce },
            url: gainlove_ajax.gainloveApiURL+args.endpoint,
            data: args.data,
            success: function(res) {
                console.log('Response',res);
                if(res.html && res.target_div){
                    $(res.target_div).html(res.html);
                }
            
            },
            error: function (error) {
                console.log('fail==>', error);
            }
        });
    }

    $(".campaign-tabs__tab").click(function() {
      $(".campaign-tabs__tab").removeClass("campaign-tabs__tab--selected");
      $(this).addClass("campaign-tabs__tab--selected");

      const targetTabContent = $(this).data('tab-id');

      $(".campaign-tabs__tab").each(function(index, item) {
        let currentTabContent = $(this).data('tab-id');
        if( typeof currentTabContent != "undefined" ){   
          if( currentTabContent === targetTabContent ){
            $('#'+currentTabContent).show();
            $(this).addClass("campaign-tabs__tab--selected");
            $(this).removeClass("campaign-tabs__tab--unselected");

            if( currentTabContent == 'campaign-top-donors'){
                let data = {
                    method: "POST",
                    endpoint: 'top-donors',
                    data: {
                        form_id: $('#gainlove_form_id').val()
                    }
                }
                $.fn.ajaxCall(data);
            }
          } else {
            if( typeof targetTabContent !== "undefined"){
              $('#'+currentTabContent).hide();
              $(this).addClass("campaign-tabs__tab--unselected");
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