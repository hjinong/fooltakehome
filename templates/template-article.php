<?php
defined( 'ABSPATH' ) || exit;
get_header();

the_post();
require_once('common/authorDateArticle.php');

get_footer();