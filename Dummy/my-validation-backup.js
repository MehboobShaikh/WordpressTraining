$(document).ready(function(){
	// $('.sjb-table th').css('background-color','#ccc');
	// $('.career-features table th').attr('style', 'background-color: #ebebeb; font-family: Open Sans Bold;');
	// applying required
	$('input#jobapp_name').prop('required',true);
	$('input#jobapp_email').prop('required',true);
	$('input#jobapp_phone_number').prop('required',true);
	$('input#applicant-resume').prop('required',true);

/*
	var addr = $('#jobapp_residence').val();
	if(addr == 'Select' || addr == 'select');{
		console.log("Select Valid option");
	}*/


	$('#jobapp_qualification').on('change','select',function(){
		var qual = $('#jobapp_qualification').find(":selected").text();
		if(qual == ' Other ' || qual == ' Others ' || qual == 'Other'){
			$('input#jobapp_qualification_other').prop('required',true);
			// console.log("Hi SMS");
		}

		if(qual == ' Select ' || qual == 'Select'){
			$("#jobapp_qualification").val('');
		}
	});

	$('#jobapp_name').on('blur',function(){
		// console.log($('#jobapp_name').val());
		// console.log($('input#jobapp_name').val());
		if(  $('#jobapp_name').val() != '' || $('#jobapp_name').val() != "null" ) {
			var val = $('#jobapp_name').val();
			if( (/[^a-zA-Z ]/.test(val)) ) {
				$('#jobapp_name').val('');
				// console.log("Please Enter Valid Name");
			}
		}
	});

	$('#jobapp_phone_number').on('blur',function(){
		if(  $('#jobapp_phone_number').val() != '' || $('#jobapp_phone_number').val() != "null" ) {
			var val = $('#jobapp_phone_number').val();
			if( (/[^0-9 ]/.test(val)) ) {
				$('#jobapp_phone_number').val('');
				console.log("Please Enter Valid Number");
			}
			if(val.length > 10 || val.length < 10){
				$('#jobapp_phone_number').val('');
			}
		}
	});

});
