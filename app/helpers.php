<?php

use Nilambar\NepaliDate\NepaliDate;
use Carbon\Carbon;

	
function getNepaliDate($date) {
  $obj = new NepaliDate();    
  
  $todaydate = Carbon::now()->toDateTimeString();

  $timestamp = strtotime($date);
  $to_time = strtotime($todaydate);
  
  $sec = round(($to_time - $timestamp));
  $min = round( $sec / 60);
  $hour = round($min / 60);
  $day = round($hour/24);
  
  if($sec > 60){
    $t =convertToNepaliNumber($min). ' '. 'मिनेट'.' ';
  }

  if($min > 60){
    $t = convertToNepaliNumber($hour). ' '. 'घण्टा' .' ';
  }

  if($hour > 24){
    $t =convertToNepaliNumber($day). ' '. 'दिन';
  }

  if($sec < 60){
    $t =convertToNepaliNumber($sec).' '. ' सेकेन्ड'.' ';
  }

  return $formattednepalidate = $t;
}

function getNpDate($date) {
	
  $obj = new NepaliDate();    
  $todaydate = Carbon::now()->toDateTimeString();

  $timestamp = strtotime($date);
  $to_time = strtotime($todaydate);
  
  $day = date('j', $timestamp);
  $month = date('n', $timestamp);
  $year = date('Y', $timestamp);
  $nepaliDate = $obj->convertAdToBs($year, $month, $day);

  $nepaliDateDetails = $obj->getDetails($nepaliDate['year'], $nepaliDate['month'], $nepaliDate['day'], 'bs');
  $newnepalidatescorrected =  convertToNepaliNumber($nepaliDateDetails['Y']) .' '. convertToNepaliMonth($nepaliDateDetails['F']).' '.convertToNepaliNumber($nepaliDateDetails['d']).' '.convertToNepaliDay($nepaliDateDetails['l']);
  return $newnepalidatescorrected;
//    return $formattednepalidate = $nepaliDateDetails['F'].' '. $nepaliDateDetails['d'].' '. ' , '.$nepaliDateDetails['Y'];
}

function getNpDateInEnglish($date) {
	
  $obj = new NepaliDate();    
  $todaydate = Carbon::now()->toDateTimeString();

  $timestamp = strtotime($date);
  $to_time = strtotime($todaydate);
  
  $day = date('j', $timestamp);
  $month = date('n', $timestamp);
  $year = date('Y', $timestamp);
  $nepaliDate = $obj->convertAdToBs($year, $month, $day);

  $nepaliDateDetails = $obj->getDetails($nepaliDate['year'], $nepaliDate['month'], $nepaliDate['day'], 'bs');
  $newnepalidatescorrected =  $nepaliDateDetails['Y'] .' '. strtoupper($nepaliDateDetails['F']).' '.$nepaliDateDetails['d'].', '.$nepaliDateDetails['l'];
  return $newnepalidatescorrected;
//    return $formattednepalidate = $nepaliDateDetails['F'].' '. $nepaliDateDetails['d'].' '. ' , '.$nepaliDateDetails['Y'];
}

function getNpDateMonthYear($date) {
	
  $obj = new NepaliDate();    
  $todaydate = Carbon::now()->toDateTimeString();

  $timestamp = strtotime($date);
  $to_time = strtotime($todaydate);
  
  $day = date('j', $timestamp);
  $month = date('n', $timestamp);
  $year = date('Y', $timestamp);
  $nepaliDate = $obj->convertAdToBs($year, $month, $day);

  $nepaliDateDetails = $obj->getDetails($nepaliDate['year'], $nepaliDate['month'], $nepaliDate['day'], 'bs');
  $newnepalidatescorrected =  convertToNepaliNumber($nepaliDateDetails['d']) .' '. convertToNepaliMonth($nepaliDateDetails['F']).', '.convertToNepaliNumber($nepaliDateDetails['Y']);
  return $newnepalidatescorrected;
//    return $formattednepalidate = $nepaliDateDetails['F'].' '. $nepaliDateDetails['d'].' '. ' , '.$nepaliDateDetails['Y'];
}

function getDateMonthDay($date)
{
  $obj = new NepaliDate();    
  $todaydate = Carbon::now()->toDateTimeString();

  $timestamp = strtotime($date);
  $to_time = strtotime($todaydate);
  
  $day = date('j', $timestamp);
  $month = date('n', $timestamp);
  $year = date('Y', $timestamp);
  $nepaliDate = $obj->convertAdToBs($year, $month, $day);
  
  $nepaliDateDetails = $obj->getDetails($nepaliDate['year'], $nepaliDate['month'], $nepaliDate['day'], 'bs');
  $newnepalidatescorrected =  convertToNepaliNumber($nepaliDateDetails['d']).' '.convertToNepaliMonth($nepaliDateDetails['F']).', '.convertToNepaliDay($nepaliDateDetails['l']);
  return $newnepalidatescorrected;
}

function convertToNepaliNumber($str)
{
	$str = strval($str);
	$array = array(
		0=>'०',
		1=>'१',
		2=>'२',
		3=>'३',
		4=>'४',
		5=>'५',
		6=>'६',
		7=>'७',
		8=>'८',
		9=>'९'
    );
    $utf = "";
	$cnt = strlen($str);
	for($i=0;$i<$cnt;$i++)
	{
		if(!isset($array[$str[$i]]))
		{
			$utf .= $str[$i];
		}
		else
			$utf .= $array[$str[$i]];
	}
	return $utf;
}

function convertToNepaliMonth($str)
{
	$array = array(
		'Baishakh'=>'वैशाख',
		'Jeth'=>'जेठ',
		'Ashar'=>'असार',
		'Shrawan'=>'साउन',
		'Bhadra'=>'भदौ',
		'Ashoj'=>'असोज',
		'Kartik'=>'कात्तिक',
		'Mangshir'=>'मंसिर',
		'Poush'=>'पुष',
		'Magh'=>'माघ',
		'Falgun'=>'फागुन',
		'Chaitra'=>'चैत'
    );
	return $array[$str];
}
//Shrawan 15, 2077 => २०७७ साउन १६ गते ८:४९ मा प्रकाशित 

function convertToNepaliDay($str)
{
  $array = array(
    'Sunday' => 'आइतबार',
    'Monday' => 'सोमबार',
    'Tuesday' => 'मंगलबार',
    'Wednesday' => 'बुधबार',
    'Thursday' => 'बिहीबार',
    'Friday' => 'शुक्रबार',
    'Saturday' => 'शनिबार',
  );

  return $array[$str];
}

function validateDate($todaysDate, $startDate1, $endDate1, $startDate2, $endDate2){
  $t = strtotime($todaysDate);
  $s1 = strtotime($startDate1);
  $e1 = strtotime($endDate1);
  $s2 = strtotime($startDate2);
  $e2 = strtotime($endDate2);

  if ( (($s1 <= $t) && ($e1 >= $t)) && (($s2 <= $t) && ($e2 >= $t)) ){
    return true;
  }
  else{
    return false;
  }
}

function validateSingleDate($todaysDate, $startDate, $endDate){
  $t = strtotime($todaysDate);
  $s = strtotime($startDate);
  $e = strtotime($endDate);

  if (($s <= $t) && ($e >= $t)){
    return true;
  }
  else{
    return false;
  }
}