(function() {
	document.getElementById( "user_pass" ).form.autocomplete = "off";
	var input = document.getElementById("user_login");
	input.value = " ";
	setTimeout(myReset, 150);
	function myReset(){
		document.getElementById("loginform").reset();
	}
})();