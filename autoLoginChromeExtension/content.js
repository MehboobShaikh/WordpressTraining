var current_loc = window.location.href;
var my_loc = "http://localhost/WP/wordpress/wp-admin";
var my_alt_loc = "http://localhost/WP/wordpress/wp-login.php";
// alert(window.location.href);
if(current_loc != my_loc || current_loc != my_alt_loc ){
	console.log(window.location.href);
	// window.location.href = current_loc
}

document.getElementById('user_login').value = 'mehboob96';
document.getElementById('user_pass').value = 'sms@12345786';
document.getElementById('wp-submit').click();