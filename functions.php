<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

define("FILEPATH", __DIR__.'/inc/');

include FILEPATH . 'enqueue.php';
include FILEPATH . 'query.php';
include FILEPATH . 'others.php';
include FILEPATH . 'api.php';



