
<ul class="callouts quote">
<?php
if(isset($ticker)&&!empty($ticker)){ //coming from the company page (template-company.php)
    $terms=array();
}else{
    //get ticker
    $terms=get_the_terms($post->ID,'ticker');
    if($terms&&sizeof($terms)){
        //post gets associated with just one ticker
        $ticker=$terms[0]->name;
    }else{
        $ticker='';
    }    
}
if(isset($ticker)&&!empty($ticker)){
    $Company=new \fooltakehome\Company();
    $quoteFromAPI=$Company->getQuote($ticker);
    $quoteArr=json_decode($quoteFromAPI,true);
    if(is_array($quoteArr)&&sizeof($quoteArr)){
        $fields=array(    'Price' => 'price',
        'Price change' => "change",
        'Price change in percentage' => "changesPercentage",
        "52 week range" => "52weekrange",
        "Beta" => "Beta",
        'Volume Average' => "avgVolume",
        'Market Capitalisation' => "marketCap",
        'Last Dividend' => "lastDiv"
        );
        foreach($fields as $k=>$v){
            if(isset($includeArr)&&sizeof($includeArr)){
                if(in_array($k,$includeArr)){
                    outputQuoteLi($k,$v,$quoteArr,$beta);
                }
            }else{
                outputQuoteLi($k,$v,$quoteArr,$beta);
            }
        }
    }else{
        echo '<li>Error retrieving data</li>';
    }
}
else{
?>
    <li>No ticker</li>
<?php
}

?>
</ul>
<?php
function outputQuoteLi($k,$v,$quoteArr,$beta=''){
    if($v=='52weekrange'){
        $text=$quoteArr[0]['yearLow'].' - '.$quoteArr[0]['yearHigh'];
    }else if($v=='Beta'){
        $text=$beta; //coming over from profile.php run prior to this.  TODO: undo this hard dependency
    }else if($v=='lastDiv'){
        if(!isset($quoteArr[0][$v])||empty($quoteArr[0][$v]))
        $text='N/A'; //couldn't find any stock that included this info via either profile or quote
    }
    else{
        $text=$quoteArr[0][$v];
    }
    echo "<li><label>$k: </label>$text</li>";
}
?>