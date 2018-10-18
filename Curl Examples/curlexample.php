<!DOCTYPE html>
<html>
<head>
	<title>cUrl Example</title>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<?php
$culr = curl_init(); 
$search_query = "laptop";
$url = "https://www.amazon.in/s/field-keywords=$search_query";


// curl_setopt($culr,CURLOPT_URL,"http://www.google.com/search?q=mehboob_siraj");
curl_setopt($culr, CURLOPT_URL, $url);
curl_setopt($culr, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($culr, CURLOPT_RETURNTRANSFER, true);


$result = curl_exec($culr);
$res_backup = $result;
$result = preg_replace("/[\n\r]/","",$result);
$result = preg_replace('/\s\s+/', ' ', $result);


// preg_match("\<!doctype html\>\<html(.*)\<\/head>", $result, $pattern_to_be_replaced);
preg_match('#<!doctype html>.*<div id="a-page">#i', $result, $pattern_to_be_replaced);
var_dump($pattern_to_be_replaced);
$result = str_replace($pattern_to_be_replaced, '<div id="a-page">', $result);


preg_match_all("#<script.*</script>#i", $result, $pattern_to_be_replaced2);
var_dump($pattern_to_be_replaced2);
var_dump($result);


preg_match_all("#<noscript.*</noscript>#i", $result, $pattern_to_be_replaced3);
var_dump($pattern_to_be_replaced3[0]);
$result = str_replace($pattern_to_be_replaced3[0], "", $result);
var_dump($result);

$result = str_replace($pattern_to_be_replaced2[0], "", $result);

?>
<script> var DOMresult = jQuery.parseHTML( " <?php echo $result; ?> ");</script>
<?php

// preg_match("#</body></html>#i", $result, $pattern_to_be_replaced3);
// var_dump($pattern_to_be_replaced3);
// $result = str_replace($pattern_to_be_replaced3, "", $result);
// var_dump($result);



// echo $res_backup;
// https://images-eu.ssl-images-amazon.com/images/I/41cT63PKaLL._AC_US218_.jpg
// https://images-eu.ssl-images-amazon.com/images/I/41s7qq+WsQL._AC_US218_.jpg
preg_match_all("!https://images-eu.ssl-images-amazon.com/images/I/[^\s]*?._AC_US218_.jpg!", $res_backup, $matches);
// var_dump($result);
// var_dump(count($matches);
$images = array_values(array_unique($matches[0]));
?>
<ul>	
	<?php
	foreach( $images as $image ){ ?>
		<li style="display: inline-block; padding: 10px;"><img src="<?php echo $image ?>"></li>
	<?php } ?>
</ul>
<?php curl_close($culr);
echo $res_backup;
?>

<script>
	console.log(DOMresult);
</script>

</body>
</html>


<!-- POST USING CURL -->
<?php
	ini_set('display_errors', 1);
	$url = "http://localhost/WP/test/curl_serve.php";
	$data = array(
		'name'		=>	array(
			'first_name'	=>	'Mehboob',
			'last_name'		=>	'Siraj',
			'sirname'		=>	'Shaikh'
		),
		'mob'		=>	'9702020991',
		'location'	=>	'Thane'
	);
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL					=>	$url,
		CURLOPT_RETURNTRANSFER		=>	true,
		CURLOPT_POST				=>	true,
		CURLOPT_POSTFIELDS			=>	http_build_query($data)
	));

	$result = curl_exec($ch);
	if(curl_errno($ch))
		echo "cURL Error " . curl_error($ch);

	curl_close($ch);

	echo $result;
	$res = json_decode($result);
	// var_dump($result);
	var_dump($res);

?>