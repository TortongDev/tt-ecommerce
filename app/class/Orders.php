<?php
namespace appOrder;

require_once dirname(dirname(__DIR__))."/app/config/config_pach.php";
require_once PATCH_ADDITIONAL_METHODE;

use APP\CLASS\AdditionalMethods;

class Orders extends AdditionalMethods {
public $PRM_ID ;
public $ORDER_ID;
public $FIST_NAME;
public $LAST_NAME;
public $ORDER_STATUS;
public $JUNGWAT;
public $AMPHOR;
public $TUMBON;
public $PROVINCE;
public $ADDRESS_NUMBER;
public $ADDRESS_MOO;
public $TEL;


public function setPrmID($PRM_ID){
    $this->$PRM_ID = $PRM_ID;
}
public function setORDER_ID($ORDER_ID){
    $this->$ORDER_ID = $ORDER_ID;
}
public function setFIST_NAME($FIST_NAME){
    $this->$FIST_NAME = $FIST_NAME;
}
public function setLAST_NAME($LAST_NAME){
    $this->$LAST_NAME = $LAST_NAME;
}
public function setORDER_STATUS($ORDER_STATUS){
    $this->$ORDER_STATUS = $ORDER_STATUS;
}
public function setJUNGWAT($JUNGWAT){
    $this->$JUNGWAT = $JUNGWAT;
}
public function setAMPHOR($AMPHOR){
    $this->$AMPHOR = $AMPHOR;
}
public function setTUMBON($TUMBON){
    $this->$TUMBON = $TUMBON;
}
public function setPROVINCE($PROVINCE){
    $this->$PROVINCE = $PROVINCE;
}
public function setADDRESS_NUMBER($ADDRESS_NUMBER){
    $this->$ADDRESS_NUMBER = $ADDRESS_NUMBER;
}
public function setADDRESS_MOO($ADDRESS_MOO){
    $this->$ADDRESS_MOO = $ADDRESS_MOO;
}
public function setTEL($TEL){
    $this->$TEL = $TEL;
}



public function getPrmID(){
    return $this->$PRM_ID;
}
public function getORDER_ID(){
    return $this->$ORDER_ID;
}
public function getFIST_NAME(){
    return $this->$FIST_NAME;
}
public function getLAST_NAME(){
    return $this->$LAST_NAME;
}
public function getORDER_STATUS(){
    return $this->$ORDER_STATUS;
}
public function getJUNGWAT(){
    return $this->$JUNGWAT;
}
public function getAMPHOR(){
    return $this->$AMPHOR;
}
public function getTUMBON(){
    return $this->$TUMBON;
}
public function getPROVINCE(){
    return $this->$PROVINCE;
}
public function getADDRESS_NUMBER(){
    return $this->$ADDRESS_NUMBER;
}
public function getADDRESS_MOO(){
    return $this->$ADDRESS_MOO;
}
public function getTEL(){
    return $this->$TEL;
}


}
?>