jQuery(document).ready(function($){
	var mediaUploader;
	var attachment;

	$('#upload-button').on('click',function(e){
		e.preventDefault();
		if(mediaUploader){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose Profile Picture',
			button: {
				text: 'Select Image'
			},
			multiple: false
		});

		mediaUploader.on('select',function(){
			// console.log(mediaUploader.state().get('selection').first().toJSON());
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#profile_img').val(attachment.url);
		});

		mediaUploader.open();

	});

});