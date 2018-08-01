
<?php
	if(! empty($_POST['a1'])){
		$text1 = $_POST['a1'];
		$text2 = $_POST['b2'];
		echo var_dump(isset($_POST['a1']));
	}
	else{
		echo var_dump(isset($_POST['a1']));
	}

?>