<?php
/**
 * Created by PhpStorm.
 * User: xm001
 * Date: 2016/5/4
 * Time: 14:10
 */

function throwMessage($message){
   header('Content-type: application/json');
   if(!is_array($message)){
      echo 'argument must an array';
      exit;
   }
   echo json_encode($message);
   exit;
}