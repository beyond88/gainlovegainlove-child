<?php 

function donation_query( $form_id, $per_page = NULL, $page_no = 1 ) {

    global $wpdb;
    $donation_meta_table = $wpdb->prefix . 'give_donationmeta';

    if( ! isset( $per_page ) ) {
        $per_page = 5; 
    }

    if( ! isset( $page_no ) ) {
        $page = 1;
    } else {
        $page = (int)$page_no;
    }

    $start    = ((int)$page - 1) * (int) $per_page;
    $query = '';

    $query = $wpdb->get_results($wpdb->prepare("SELECT a.donation_id, b.meta_value AS amount, c.meta_value AS first_name, d.meta_value AS last_name, e.meta_value AS email, f.meta_value AS donation_date, g.meta_value AS currency FROM ".$donation_meta_table." a 
    LEFT JOIN ".$donation_meta_table." b ON a.donation_id = b.donation_id
    LEFT JOIN ".$donation_meta_table." c ON a.donation_id = c.donation_id
    LEFT JOIN ".$donation_meta_table." d ON a.donation_id = d.donation_id
    LEFT JOIN ".$donation_meta_table." e ON a.donation_id = e.donation_id
    LEFT JOIN ".$donation_meta_table." f ON a.donation_id = f.donation_id
    LEFT JOIN ".$donation_meta_table." g ON a.donation_id = g.donation_id
    WHERE b.meta_key = '_give_payment_total' 
    AND c.meta_key = '_give_donor_billing_first_name'
    AND d.meta_key = '_give_donor_billing_last_name'
    AND e.meta_key = '_give_payment_donor_email'
    AND f.meta_key = '_give_completed_date'
    AND g.meta_key = '_give_payment_currency'
    AND a.meta_key = '_give_payment_form_id' AND a.meta_value = %d ORDER BY donation_date DESC LIMIT %d, %d", $form_id
                                ,$start, $per_page), ARRAY_A);
    return $query; 

}


function testimonials_query( $form_id, $per_page = NULL, $page_no = 1 ) {

    global $wpdb;
    $give_revenue_table = $wpdb->prefix . 'give_revenue';
    $give_comment_table = $wpdb->prefix . 'give_comments';
    $give_donors_table = $wpdb->prefix . 'give_donors';

    if( ! isset( $per_page ) ) {
        $per_page = 5; 
    }

    if( ! isset( $page_no ) ) {
        $page = 1;
    } else {
        $page = (int)$page_no;
    }

    $start    = ((int)$page - 1) * (int) $per_page;
    $query = $wpdb->get_results($wpdb->prepare("SELECT donation_id FROM ".$give_revenue_table." WHERE form_id = %d", $form_id), ARRAY_A);

    $data = [];
    if( ! empty( $query ) ) {
        foreach ( $query as $item ) {
            $data[] = $item['donation_id'];
        }
    }

    $ids = implode(',', $data);
    if( ! empty($ids) ){
        $comment_type = 'donor_donation';
        $comment_query = '';
        $comment_query = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT a.comment_ID, a.user_id, a.comment_content, a.comment_parent, a.comment_type, a.comment_date, a.comment_date_gmt, b.email, b.name FROM ".$give_comment_table." a
                LEFT JOIN ".$give_donors_table." b ON a.user_id = b.user_id
                WHERE comment_parent IN($ids) AND comment_type = %s LIMIT %d, %d", $comment_type, $start, $per_page), 
            ARRAY_A);
    
        return $comment_query;
    }

    return [];
     

}