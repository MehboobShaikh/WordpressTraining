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

    $.post(ajaxurl,{'action':'filter_ajax_action','parameters':cat_parameters}, function(response){
        $('#filtered_content').empty();
        $('#filtered_content').html(response);
        // console.log(response);
    });
});


</script>