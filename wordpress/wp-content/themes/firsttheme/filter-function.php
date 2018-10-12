<script type="text/javascript">

// "use strict";
$ = jQuery;

$('.filter').click( function(){
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var chkArray = [];
    $(".filter:checked").each(function() {
            chkArray.push($(this).val());
        });

	// for creating category parameters join & separated them by the comma and pass it as a single string 
    var cat_parameters;
    cat_parameters = chkArray.join(',');
    // console.log(typeof(cat_parameters));

    // console.log($(this).val());

    // $.post Method
    /*$.post(ajaxurl,{'action':'filter_ajax_action','parameters':cat_parameters}, function(response){
        $('#filtered_content').empty();
        console.log(response);
        $('#filtered_content').html(response);
    });*/

    // $.ajax Method
    $.ajax({
        method: "POST",
        url: ajaxurl,
        data: {
            action: 'filter_ajax_action',
            parameters: cat_parameters
        },
        beforeSend: function(data){
            console.log("Before Sending Ajax" + Object.keys(data));
            $('#filtered_content').empty();
            $('#filtered_content').html('<h1 style="color:red">Loading Please Wait</h1>').delay( 5000 );
        },
        success: function(res){
            console.log("After Success");
            // setTimeout(function(){
                $('#filtered_content').empty();
                $('#filtered_content').html(res);
            // }, 2000);
        }
    });

});

</script>