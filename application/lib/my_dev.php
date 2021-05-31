<?php
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	$config = require 'application/config/db.php';
	$CONNECT = mysqli_connect($config['host'], $config['user'], $config['password'], $config['name']);
	function rowSQL($sql){
		global $CONNECT;
		$result = mysqli_query($CONNECT, $sql);
		$array = [];
		while ($Row = mysqli_fetch_assoc($result)) $array[] = $Row;
		return $array;
	}
	// Function - * - * -- * -- * -- * -- * -- * -- * -- * -- * -- * -- * -
	// include 'application/function/name_function.php';

	
	function demo($str) {
		echo '<pre>';
		var_dump($str);
		echo '</pre>';
		exit;
	}

	function ok($str) {
		echo '<pre>';
		print_r($str);
		echo '</pre>';
	}




	function format992($phone){
		// Барои праверкаи +992
		if( preg_match('#^992#', $phone) && !preg_match('#^\+992#', $phone) )
			$phone = '+'.$phone;
		elseif( !preg_match('#^\+992#', $phone ) )
			$phone = '+992'.$phone;
		return $phone;
	}

	function DateTimeFormatArray($dateDb){
	    $array = [
	        'sol'    => substr($dateDb, 0, 4),
	        'mon'    => substr($dateDb, 5, 2),
	        'ruz'    => substr($dateDb, 8, 2),
	        'soat'   => substr($dateDb, 11, 2),
	        'daqiqa' => substr($dateDb, 14, 2),
	        'soniya' => substr($dateDb, 17, 2),
	    ];
	    return $array;
	}
	
	
	// Преобразовать: 20.Январ.2023
	// Параметр 2: 23.Январ.2021 13:02
	function dateFormatTj($text, $datatime = false){
		$result = DateTimeFormatArray($text);
		switch ($result['mon']) {
			case '01':$mon = 'Январь';break;
			case '02':$mon = 'Февраль';break;
			case '03':$mon = 'Март';break;
			case '04':$mon = 'Апрель';break;
			case '05':$mon = 'Май';break;
			case '06':$mon = 'Июнь';break;
			case '07':$mon = 'Июль';break;
			case '08':$mon = 'Август';break;
			case '09':$mon = 'Сентябрь';break;
			case '10':$mon = 'Октябрь';break;
			case '11':$mon = 'Ноябрь';break;
			case '12':$mon = 'Декабрь';break;
			default:$mon = 'Не найдено Функсияи: dataText()';break;
		}
		// Формати Росия на Тоҷикистон - Пока не используется
		// $result['soat'] = $result['soat'] + 2;
		if($datatime == true) return  $result['ruz'].'.'.$mon.'.'.$result['sol'].' / '.$result['soat'].':'.$result['daqiqa'];
	    else  return  $result['ruz'].'.'.$mon.'.'.$result['sol'];
	}
	

	















