<?php 

add_action( 'rest_api_init', 'gainlove_customize_rest_cors', 15 );
add_action( 'rest_api_init', 'gainlove_register_api', 10, 1 );

function gainlove_customize_rest_cors() {

    remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
    add_filter( 'rest_pre_serve_request', function( $value ) {
      header( 'Access-Control-Allow-Origin: *' );
      header( 'Access-Control-Allow-Methods: POST, GET' );
      header( 'Access-Control-Allow-Credentials: true' );
      header( 'Access-Control-Expose-Headers: Link', false );
      header( 'Access-Control-Allow-Headers: X-Requested-With' );
      return $value;
    } );

}

function gainlove_register_api() {

    register_rest_route( 'gainlove/v1', '/top-donors', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => 'get_top_donors',
      'permission_callback' => '__return_true'
    ]);

    // register_rest_route( $this->restBase, '/send-verify-email', [
    //   'methods'  => WP_REST_SERVER::CREATABLE,
    //   'callback' => [ $this, 'send_verify_email' ],
    //   'permission_callback' => '__return_true'
    // ]);

    // register_rest_route( $this->restBase, '/create-campaign', [
    //   'methods'  => WP_REST_SERVER::CREATABLE,
    //   'callback' => [ $this->campaignApi, 'create_campaign' ],
    //   'permission_callback' => '__return_true'
    // ]);

}

function get_top_donors( WP_REST_Request $request ) {

    
    $form_id = $request['form_id'];
    $data = [];
    $query = top_donors_query( $form_id, 5, 1);

    $html = '';
    if( ! empty( $query ) ){
        foreach( $query as $item ) {

            $date = date_create($item['date']);
            $since = date_format($date,"m d, Y");
    
            $html .='
                <div data-v-699f71c4="">
                    <div data-v-3697e608="" data-v-699f71c4="" class="top-donors-item">
                        <div data-v-3697e608="" class="top-donors-item__thumbnail-container">
                            <a data-v-3697e608="" href="#" class="top-donors-item__user-link">
                                <div data-v-3697e608="" class="top-donors-item__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_1.png&quot;);"></div>
                            </a>
                        </div>
                        <div data-v-3697e608="" class="top-donors-item__content">
                            <div data-v-3697e608="" class="top-donors-item__content__info">
                                <span data-v-3697e608="" class="top-donors-item__content__info__amount">
                                '.$item['currency'].' '.number_format($item['amount'], 0).'
                                </span>
                                by
                                <span data-v-3697e608="">
                                    <a data-v-3697e608="" href="#" target="_blank" class="top-donors-item__content__info__donor">
                                    '.$item['first_name'].' '.$item['last_name'].'
                                    </a>
                                </span> 
                                <span data-v-3697e608="" class="top-donors-item__content__info__rank">
                                
                                </span>
                            </div>
                            <div data-v-3697e608="" class="top-donors-item__content__info__registered-at">
                                Giver since '.$since.'
                            </div>
                            <div data-v-3697e608="" class="top-donors-item__content__comment"></div>
                        </div>
                    </div>
                </div>';  
        }
    } else {
        $html .='
            <div data-v-3697e608="" data-v-699f71c4="" class="top-donors-item">
                <div data-v-3697e608="" class="top-donors-item__content">
                    <div data-v-3697e608="" class="top-donors-item__content__info">
                        <span data-v-3697e608="" class="top-donors-item__content__info__amount"></span>
                        <span data-v-3697e608="">
                            <a data-v-3697e608="" href="#" target="_blank" class="top-donors-item__content__info__donor donors-not-found">
                                '.__('There\'s no donor on this campaign yet. Be the first to donate to this campaign!', 'gainlove').'
                            </a>
                        </span> 
                        <span data-v-3697e608="" class="top-donors-item__content__info__rank"></span>
                    </div>
                    <div data-v-3697e608="" class="top-donors-item__content__info__registered-at"></div>
                    <div data-v-3697e608="" class="top-donors-item__content__comment"></div>
                </div>
            </div>';
    }

    $response['html'] = $html;
    $response['target_div'] = ".campaign-top-donors__feed";

    return new WP_REST_Response($response, 123);
}