<?php
defined( 'ABSPATH' ) || exit;
get_header();

the_post();
require_once('common/authorDateArticle.php');
require_once('common/profile.php');

get_footer();
