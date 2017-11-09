<?php

/**
 * Created by PhpStorm.
 * User: hatefshamshiri
 * Date: 3/6/17
 * Time: 1:26 PM
 */

namespace App\Shamshiri\Payment;
class ZarinPal
{
    private $data=array();
    public function __construct($callbackUrl)
    {


        $MerchantID = 'test'; //Required
        $Description = 'توضیحات تراکنش تستی'; // Required
        $Email = 'UserEmail@Mail.Com'; // Optional
        $Mobile = '09123456789'; // Optional
        $CallbackURL = 'http://www.yoursoteaddress.ir/verify.php'; // Required

        $this->data=[
            'MerchantID' => $MerchantID,
            'Amount' => 1000,
            'Description' => $Description,
            'Email' => $Email,
            'Mobile' => $Mobile,
            'CallbackURL' => $CallbackURL,
        ];
    }


    public function redirect($amount){
        $client = new \SoapClient('https://sandbox.zarinpal.com/pg/services/WebGate/wsdl', ['encoding' => 'UTF-8']);
        $result = $client->PaymentRequest(
            $this->data
        );
        //Redirect to URL You can do it also by creating a form
        if ($result->Status == 100) {
            Header('Location: https://sandbox.zarinpal.com/pg/StartPay/'.$result->Authority);
        } else {
            echo'ERR: '.$result->Status;
    }

    }
}