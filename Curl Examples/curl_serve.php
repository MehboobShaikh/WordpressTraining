<?php
if($_POST){
	// var_dump($_POST);
	echo json_encode($_POST);
	// if($_POST['mob'] == '9702020991'){
	// 	echo "it is moving";
	// 	echo "<script>window.open('http://localhost/WP/wordpress/')</script>";
	// }
	
	// header("Location: http://localhost/WP/wordpress/");

} else {
	echo "Oops The Data is not set";
}
?>