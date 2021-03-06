
<ul class="callouts profile">
<?php
//get ticker
$terms=get_the_terms($post->ID,'ticker');

if(sizeof($terms)){
    //post gets associated with just one ticker
    $ticker=$terms[0]->name;
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
    }else{
        echo '<li>Error retrieving data</li>';
    }
}
else{
?>
    <li>No ticker associated with this recommendation</li>
<?php
}
?>
</ul>