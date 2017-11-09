<?php
$years=array();
for ($i=2016;$i>=1850;$i--){
    $years[]=$i;
}
return [
    "months"=>[
        1=>"January",
        2=>"February",
        3=>"March",
        4=>"April",
        5=>"May",
        6=>"June",
        7=>"July",
        8=>"August",
        9=>"September",
        10=>"October",
        11=>"November",
        12=>"December"
    ],
    "month"=>"Month",
    "year"=>"Year",
    "years"=>$years,
    "cancel"=>"Cancel",
    "save"=>"Save",
    "day"=>"Day"
];