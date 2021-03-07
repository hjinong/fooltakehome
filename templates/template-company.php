<?php
defined( 'ABSPATH' ) || exit;
get_header();

//http://localhost/fooltakehome/company/?ticker=TSLA
if(isset($_GET['ticker'])&&!empty($_GET['ticker'])){

    $ticker=$_GET['ticker'];

    $includeArr=array('Company Logo','Company Name','Description');    
    require_once('common/profile.php'); //passing $beta to quote.php below
    $includeArr=array();    
    require_once('common/quote.php');

    //show only on the first page
    if(!preg_match('/\/page\/\d+/',$_SERVER['REQUEST_URI'])){
        require_once('common/recommendationList.php');
    }
    $pagination=true;
    require_once('common/articleList.php');

}
else
{
    echo 'Please specify the ticker.';
}
get_footer();