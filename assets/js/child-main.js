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
                if(args.type == 'html'){
                  $(args.target_div).html(res.html);
                } else {
                  $(args.target_div).append(res.html);
                }
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
                  },
                  type: 'html', 
                  target_div: '.campaign-top-donors__feed'
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

      //Show/hide bottom donate based on story tab
      if( targetTabContent == 'campaign-story'){
        $('#bottom-donate-part').show();
      } else {
        $('#bottom-donate-part').hide();
      }
    });
  });

  /************************
   * 
   * Copy campaign link
   * 
   ************************/
  $('.campaign-share-dialog__content__copy-link__button__label--hidden-sm').on('click', function(){

  });

  /************************
  * 
  * Get activities
  * 
  ************************/
  $('#see-more-activties').on('click', function(){
    let data = {
      method: "POST",
      endpoint: 'activities',
      data: {
        form_id: $('#gainlove_form_id').val()
      },
      type: 'html',
      target_div: ''
    }
    $.fn.ajaxCall(data);
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

/************************
 * 
 * Copy text function
 * 
 ************************/
function copyToClipboard(element) {

  console.log('clicked');
  // var $temp = $("<input>");
  // $("body").append($temp);
  // $temp.val($(element).value()).select();
  // document.execCommand("copy");
  // $temp.remove();
}