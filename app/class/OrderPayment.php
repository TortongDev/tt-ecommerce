<?php
namespace appOrderPayment;
require_once PATCH_ADDITIONAL_METHODE;
use APP\CLASS\AdditionalMethods;
class OrderPayment extends AdditionalMethods {
    public $ORDER_ID;
    public $PAYMENT_ID ;
    public $PAYMENT_NAME;
    public $PAYMENT_IMG;
    public $PAYMENT_USERNAME;
    public $PAYMENT_PRICE;
    public $PAYMENT_ORDER_ID;
    public function setORDER_ID($ORDER_ID){
        $this->ORDER_ID = $ORDER_ID;
    }
    public function setPAYMENT_ID($PAYMENT_ID){
        $this->PAYMENT_ID = $PAYMENT_ID;
    }
    public function setPAYMENT_NAME($PAYMENT_NAME){
        $this->PAYMENT_NAME = $PAYMENT_NAME;
    }
    public function setPAYMENT_IMG($PAYMENT_IMG){
        $this->PAYMENT_IMG = $PAYMENT_IMG;
    }
    public function setPAYMENT_USERNAME($PAYMENT_USERNAME){
        $this->PAYMENT_USERNAME = $PAYMENT_USERNAME;
    }
    public function setPAYMENT_PRICE($PAYMENT_PRICE){
        $this->PAYMENT_PRICE = $PAYMENT_PRICE;
    }
    public function setPAYMENT_ORDER_ID($PAYMENT_ORDER_ID){
        $this->PAYMENT_ORDER_ID = $PAYMENT_ORDER_ID;
    }
    
    public function getORDER_ID(){
        return $this->ORDER_ID;
    }

}


?>