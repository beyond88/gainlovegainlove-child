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
    AND a.meta_key = '_give_payment_form_id' AND a.meta_value = %d ORDER BY amount DESC LIMIT %d, %d", $form_id
                                ,$start, $per_page), ARRAY_A);
    return $query; 

}