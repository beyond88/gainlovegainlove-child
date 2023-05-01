<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

define("FILEPATH", __DIR__.'/inc/');
define('ASSETS_URL', get_stylesheet_directory_uri() . '/../gainlovegainlove-child/assets/');

include FILEPATH . 'enqueue.php';
include FILEPATH . 'query.php';
include FILEPATH . 'others.php';
include FILEPATH . 'api.php';



