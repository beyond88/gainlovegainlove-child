(function($, window, document ) {
    'use strict';

$( document ).ready(function() {

    /************************
     * 
     * Tabs handle
     * 
     ************************/
    $.fn.ajaxCall = async function(args) {
        $.ajax({
            method: args.method,
            dataType: 'json',
            headers: {'X-WP-Nonce': gainlove_ajax.apiNonce },
            url: gainlove_ajax.gainloveApiURL+args.endpoint,
            data: args.data,
            success: function(res) {
              console.log('Response',res);
              if(res.html){
                if(args.print == 'html'){
                  $(args.target_div).html(res.html);
                } else {
                  $(args.target_div).append(res.html);
                }
              }

              if( args.that ){
                args.that.removeAttr('disabled');
                args.that.children('span').remove();
              }

            },
            error: function (error) {
              console.log('fail==>', error);
              if( args.that ){
                args.that.removeAttr('disabled');
                args.that.children('span').remove();
              } 
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
            $(this).children('span').removeClass('campaign-tabs__tab__count--unselected');

            if( currentTabContent == 'campaign-top-donors' ) {
              let data = {
                method: "POST",
                endpoint: 'top-donors',
                data: {
                  form_id: $('#gainlove_form_id').val()
                },
                print: 'html', 
                target_div: '.campaign-top-donors__feed'
              }
              $.fn.ajaxCall(data);
            }

          } else {
            if( typeof targetTabContent !== "undefined"){
              $('#'+currentTabContent).hide();
              $(this).addClass("campaign-tabs__tab--unselected");
              $(this).children('span').addClass('campaign-tabs__tab__count--unselected');
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
  $(document).on('click', '#see-more-activties', async function() {

    $(this).attr('disabled', 'disabled');
    $(this).prepend('<span data-v-3bb18fd3="" class="loading-button__spinner"></span>');
    
    let per_page = $(this).data('per-page');
    let page_no = $(this).attr('data-page-no');
    let data = {
      method: "POST",
      endpoint: 'activities',
      data: {
        form_id: $('#gainlove_form_id').val(),
        per_page: per_page,
        page_no: page_no
      },
      print: 'append',
      target_div: '#campaign-activities__feed',
      that: $(this)
    }
    await $.fn.ajaxCall(data);
    $('#see-more-activties').attr('data-page-no', parseInt(page_no)+1);

  });

  /************************
  * 
  * Get testimonial
  * 
  ************************/
  $(document).on('click', '#see-more-testimonials', async function(){

    $(this).attr('disabled', 'disabled');
    $(this).prepend('<span data-v-3bb18fd3="" class="loading-button__spinner"></span>');

    let per_page = $(this).data('per-page');
    let page_no = $(this).attr('data-page-no');
    let data = {
      method: "POST",
      endpoint: 'testimonials',
      data: {
        form_id: $('#gainlove_form_id').val(),
        per_page: per_page,
        page_no: page_no
      },
      print: 'append',
      target_div: '#campaign-testimonials__feed',
      that: $(this)
    }
    await $.fn.ajaxCall(data);

    $('#see-more-testimonials').attr('data-page-no', parseInt(page_no)+1);
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