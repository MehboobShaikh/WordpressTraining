<?php

if(isset($_POST['postTitle'])){
	$postTitle = $_POST['postTitle'];
	$result = array('status'=> 0);
	$my_post_query = new WP_Query(array('post_type'=>'result', 'post_status'=>'publish', 'name'=>$postTitle));
	if ( $my_post_query->have_posts() ) {
		while ($my_post_query->have_posts()) {
			$my_post_query->the_post();
			$result = array("status"=> 1, "id" => get_the_ID(), "content" => get_the_content(), 'name'=>$postTitle);
		} 
		wp_reset_postdata();
	}

	echo json_encode($result);
	die();
}

?>