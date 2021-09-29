<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use Illuminate\Support\Facades\Input;
use Auth;
use Response;
use App\User;
use Session;
use Hash;
use DateTime;
use Mail;
use Modules\Account\Entities\CharterOfAccount;
use Validator;
use Redirect;

;
class CharterHelper
{

   public  static function getCharter($itemName,$orgID)
 {
  $model=CharterOfAccount::where(['organization_id'=>$orgID])
        ->where('item_name','like','%'.$itemName."%")
        ->first();
  return $model;
 }

 public static function CurFinancialYear()
 {
 	 $mwezi=date('m');
 	   if($mwezi<=6)
 	   {
 	   	$year=(date('Y')-1)."-".date('Y');

 	   }else{
 	   	$year=date('Y')."-".(date('Y')+1);
 	   }
 	    return $year;
 }

 public static  function getAgeGroup($dob)
 {
 	 $from = new DateTime($dob);
$to   = new DateTime('today');
$year= $from->diff($to)->y;
    if($year<35)
    {
    	return "Below 35";
    }else if($year>=35 && $year<60)
    {
    	return "35-59";
    }else{
    	return "60 and Above";
    }

 }


 public static function QuaterName()
 {
   $month=date("m");
      if(in_array($month, array(7,8,9)))
      {
        return "Q1";
      }
      else if(in_array($month, array(10,11,12)))
      {
        return "Q2";
      }
       else if(in_array($month, array(10,11,12)))
      {
        return "Q3";
      }
      else{
        return "Q4";
      }
 }


  
 
}