<?php
defined( 'ABSPATH' ) || exit;
get_header();

$Company=new \fooltakehome\Company('TSLA');
$Company->getTickerInfo('TSLA');

get_footer();