<?php

/* ====== Download files Using cURL ====== */
// ini_set('display_errors', 1);

$ch = curl_init(); 
$search_query = "honor 9";
$url = "https://www.amazon.in/s/field-keywords=$search_query";


// curl_setopt($ch,CURLOPT_URL,"http://www.google.com/search?q=mehboob_siraj");
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($ch);
curl_close($ch);

// https://images-eu.ssl-images-amazon.com/images/I/41cT63PKaLL._AC_US218_.jpg
// https://images-eu.ssl-images-amazon.com/images/I/41s7qq+WsQL._AC_US218_.jpg
// https://images-eu.ssl-images-amazon.com/images/I/41F-1MZpUlL._AC_US218_.jpg
// https://images-eu.ssl-images-amazon.com/images/I/411ZLUySl3L._AC_US218_.jpg
preg_match_all("!https://images-eu.ssl-images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!", $result, $matches);

$images = array_values(array_unique($matches[0]));
if(!empty($images)){
	if (!file_exists(dirname(__FILE__)."/curlDownload/$search_query")) {
	    mkdir(dirname(__FILE__)."/curlDownload/$search_query", 0777, true);
	}

	foreach($images as $image){
		$ch2 = curl_init();
		$url2 = $image;
		curl_setopt($ch2, CURLOPT_URL, $url2);
		curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
		$result2 = curl_exec($ch2);
		curl_close($ch2);

		// var_dump(dirname(__FILE__));
		$pathToSave = dirname(__FILE__)."/curlDownload/$search_query/bySMS"."_Image_".mt_rand(1000000000,9999999999).".".retExtention($image);
		// var_dump($image);
		// var_dump($pathToSave);
		$file = fopen($pathToSave, "w+");
		fputs($file, $result2);
		if(fclose($file)){
			chmod($pathToSave, 0777);
			echo "$image has been Downloaded";
		}
	}
}
function retExtention($imageURL){
	$extention = end(preg_split("/[.]+/", $imageURL));
	return $extention;
}
?>