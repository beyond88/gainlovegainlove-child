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

    register_rest_route( 'gainlove/v1', '/activities', [
      'methods'  => WP_REST_SERVER::CREATABLE,
      'callback' => 'get_activities',
      'permission_callback' => '__return_true'
    ]);

    register_rest_route( 'gainlove/v1', '/testimonials', [
        'methods'  => WP_REST_SERVER::CREATABLE,
        'callback' => 'get_testimonials',
        'permission_callback' => '__return_true'
    ]);

}

function get_top_donors( WP_REST_Request $request ) {
    
    $form_id = $request['form_id'];
    $query = donation_query( $form_id, 5, 1);

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
    return new WP_REST_Response($response, 123);
}

function get_activities( WP_REST_Request $request ) {

    $form_id = $request['form_id'];
    $page_no = $request['page_no'];
    $per_page = $request['per_page'];
    $html = '';

    $query = donation_query( $form_id, $per_page, $page_no );
    if( ! empty( $query ) ) {
        foreach( $query as $item ) {
            $html .= '
            <div data-v-8c160544="" id="'. $item['donation_id'] .'">
                <div data-v-854f8146="" data-v-8c160544="" class="transaction-item">
                    <div data-v-854f8146="" class="transaction-item__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664372687/assets/images/default_profile_images/default_profile_2.png&quot;);"></div>
                    <div data-v-854f8146="" class="transaction-item__content">
                        <div data-v-854f8146="" class="transaction-item__content__info">
                            <strong data-v-854f8146="" class="transaction-item__content__info__donor">
                                '. $item['first_name'] .' '. $item['last_name'] .'
                            </strong>
                            '.__('has donated', 'gainlove').'
                            <span data-v-854f8146="" class="transaction-item__content__info__amount">
                                '.$item['currency'] .' '. $item['amount'].'
                            </span> 
                        </div>
                        <span data-v-854f8146="" class="transaction-elapsed-time transaction-item__content__info__time">
                            '. gainlove_time_ago( $item['donation_date'] ).'
                        </span>
                    </div>
                </div>
                <hr data-v-8c160544="" class="campaign-activities__feed__item__separator">
            </div>
            ';
        }
    } else {
        $html .='
            <style type="text/css">
                .see-more-activties-area{
                    display:none;
                }
            </style>
        ';
    }

    $response['html'] = $html;
    return new WP_REST_Response($response, 123);
}

function get_testimonials( WP_REST_Request $request ) {

    $form_id = $request['form_id'];
    $page_no = $request['page_no'];
    $per_page = $request['per_page'];
    $html = '';
    
    $query = testimonials_query( $form_id, $per_page, $page_no );

    if( ! empty( $query ) ) {
        foreach( $query as $item ) {
            $html .= '
            <div data-v-618ad9c0="">
                <div data-v-7eca26c6="" data-v-618ad9c0="" class="transaction-item">
                    <a data-v-7eca26c6="" href="#">
                        <div data-v-7eca26c6="" class="transaction-item__thumbnail" style="background-image: url(&quot;https://res.cloudinary.com/dmajhtvmd/image/upload/v1664443009/assets/images/default_profile_images/default_profile_5.png&quot;);"></div>
                    </a>
                    <div data-v-7eca26c6="" class="transaction-item__content">
                        <div data-v-7eca26c6="" class="transaction-item__content__info">
                            <span data-v-7eca26c6="">
                                <a data-v-7eca26c6="" href="https://give.asia/user/hgohl0lanh1682143728" target="_blank" class="transaction-item__content__info__donor">
                                    '.$item['name'].'
                                </a>
                            </span>
                        </div>
                        <div data-v-7eca26c6="" class="transaction-item__content__comment">
                            '.$item['comment_content'].'
                        </div>
                    </div>
                </div>
                <hr data-v-618ad9c0="" class="campaign-testimonials__feed__item__separator">
            </div>
            ';
        }

    } else {
        $html .='
            <style type="text/css">
                .see-more-testimonials-area {
                    display:none;
                }
            </style>
        ';
    }

    $response['html'] = $html;
    return new WP_REST_Response($response, 123);
}