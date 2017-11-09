<?php


use Morilog\Jalali\jDateTime;

function convertToPersianDate($dateNtime){
    $timestamp= strtotime($dateNtime);
    echo toFarsiDigits(jDateTime::strftime('d  F  Y', $timestamp));

//    $dateTime = \Morilog\Jalali\jDatetime::createDatetimeFromFormat('Y-m-d H:i:s', $dateNtime);
}
function convertToPersianTime($dateNtime){
    $timestamp= strtotime($dateNtime);
    echo jDateTime::strftime('H:i:s', $timestamp);

//    $dateTime = \Morilog\Jalali\jDatetime::createDatetimeFromFormat('Y-m-d H:i:s', $dateNtime);
}
function activePage($num1,$num2){
    if($num1==$num2){
        echo "active";
    }
}
function status2Fa($status){
    switch ($status){
        case "success":
            echo "پرداخت شده";
            break;
        case "danger":
            echo "پرداخت نشده";
            break;
    }
}

function selected($input,$value){
        if($input==$value){
            echo "selected";
        }
}
function checked($input,$value){
    if($input==$value){
        echo "checked";
    }
}
function toFarsiDigits($str){
    $eng=[0,1,2,3,4,5,6,7,8,9];
    $fa=["۰","۱","۲","۳","۴","۵","۶","۷","۸","۹"];
    return str_replace($eng,$fa,$str);
}

function hide($input,$value){
    if($input==$value ||!$input ||$input==""){
        echo "none";
    }
}
function disable($input,$value){
    if($input==$value ||!$input ||$input==""){
        echo "disabled='disabled'";
    }
}