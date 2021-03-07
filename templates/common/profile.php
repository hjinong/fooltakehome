
<ul class="callouts profile">
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
    $profileFromAPI=$Company->getProfile($ticker);
    $profileArr=json_decode($profileFromAPI,true);
    if(is_array($profileArr)&&sizeof($profileArr)){
        $fields=array('Company Logo'=>'image',
            'Company Name'=>'companyName',
            'Exchange'=>'exchange',
            'Description'=>'description',
            'Industry'=>'industry',
            'Sector'=>'sector',
            'CEO'=>'ceo',
            'Website URL'=>'website');
        foreach($fields as $k=>$v){
            if(isset($includeArr)&&sizeof($includeArr)){
                if(in_array($k,$includeArr)){
                    outputProfileLi($k,$v,$profileArr);
                }
            }else{
                outputProfileLi($k,$v,$profileArr);
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
$beta=$profileArr[0]['beta'];
?>
</ul>
<?php
function outputProfileLi($k,$v,$profileArr){
    if($v=='image'){
        $text='<img alt="'.$profileArr[0]['companyName'].' logo" src="'.$profileArr[0][$v].'" />';
    }else if($v=='website'){
        $text='<a href="'.$profileArr[0][$v].'" target="_blank" rel="noopener">'.$profileArr[0][$v].'</a>';
    }
    else{
        $text=$profileArr[0][$v];
    }
    echo "<li><label>$k: </label>$text</li>";    
}
?>