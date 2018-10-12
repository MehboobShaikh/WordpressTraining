<?php
	$rand_no_a = 0;
	$rand_no_b = 0;
	$output = '';
	$result = 0;

	function createrandomno(){
		global $rand_no_a;
		global $rand_no_b;
		global $output;
		global $result;
		$rand_no_a = mt_rand(0, 9);
		$rand_no_b = mt_rand(0, 9);
		$output = "$rand_no_a" . " + " . "$rand_no_b";
		$result = $rand_no_a + $rand_no_b;
	}
	function firsttheme_getrandom_no($status){
		if ( $status ){
			return createrandomno();
		}
	}

	function firsttheme_resources(){
		wp_enqueue_style('style',getstylesheet_uri());
	}

	add_action('wp_enqueue_style','firsttheme_resources');


	add_action('login_form','my_added_login_field');
	function my_added_login_field(){
	    //Output your HTML
	?>
		<p>
	        <label for="logic_test"><strong>Calculate <?php global $output; echo $output; ?></strong><br>
	        <input type="text" tabindex="20" size="20" value="" class="input" id="logic_test" name="logic_test"></label>
	        <input type="hidden" tabindex="20" size="20" value="<?php global $result; echo $result; ?>" class="input" id="logic" name="logic">
	    </p>
	<?php
	}

	function secondtheme_login_form_script() {
	    wp_enqueue_script('loginscript',get_template_directory_uri().'/login.js');
	}

	add_action( 'login_form', 'secondtheme_login_form_script' );



	add_filter( 'authenticate', 'my_custom_authenticate', 10, 3 );
	function my_custom_authenticate( $user, $username, $password ){
	    //Get POSTED value
	    $my_value = $_POST['logic_test'];

	    //Get user object
	    $user = get_user_by('login', $username );

	    //Get stored value
	        // $stored_value = get_user_meta($user->ID, 'my_ident_code', true);
	        firsttheme_getrandom_no(1);
	        $stored_value = $_POST['logic'];

	    if(!$user || empty($my_value) || $my_value !=$stored_value){
	        //User note found, or no value entered or doesn't match stored value - don't proceed.
	            remove_action('authenticate', 'wp_authenticate_username_password', 20);
	            remove_action('authenticate', 'wp_authenticate_email_password', 20); 

	        //Create an error to return to user
	            return new WP_Error( 'denied', __("<strong>ERROR</strong>: You're Too Dumb, that you can't solve simple math expression. It's <strong>$stored_value</strong>") );
	    }

	    //Make sure you return null 
	    return null;
	}



?>