$(function() {
  // jQuery goes here...

  // Uncomment this line to fade out the red box on page load
  // $(".red-box").fadeOut(2000);


// $('input:checked').parent().css('color','red')
// $("input:checkbox:not(:checked)").parent().css('color','#333')
// $('input:selected').css('color','red')

// Apply css to all sub list in main list
// $('#list').children().css('color','red');

/*
$('#list').find('ul').css('color','red');
// OR { Both r Same }
$('ul[id=list]').find('ul').css('color','red');
*/

// $('li').filter(':even').css('color','red');
// $('li').filter(':odd').css('color','blue');

/*
$('li').filter(function(index){
	// return only boolean
	// console.log(index);
	return index % 3 == 1;
}).css('color','red');
*/


// $('li').first().css('color','red');
// $('li').last().css('color','red');
// $('li').eq(/*pass index*/ 4).css('color','red');
// $('li').eq(-2).css('color','red');

/*
$('li').not(function(index){
	return index % 3 == 0;
}).css('color','red');
*/

// $('form').children().not('input:text, textarea, br').remove();
// var removedPart = $('form').children().not('input:text, textarea, br').remove();
// $('#content').append(removedPart);

// $('li').detach();

// var checkbox = $('input:checkbox');
// console.log(checkbox.prop('checked'));

/*
// SLider

var images = [
	'images/laptop-mobile_small.jpg',
	'images/laptop-on-table_small.jpg',
	'images/people-office-group-team_small.jpg',
];

var galleryImage = $('.gallery').find('img').first();
var galleryImage2 = $('.gallery');

var i = 0;
setInterval(function(){
	i = (i + 1) % images.length;

	galleryImage.fadeOut(function(){
		$(this).attr('src', images[i]);
		$(this).fadeIn();
	});
}, 10000);

function right(){
	i = (i + 1) % images.length;

	galleryImage2.animate({
		width:'0%',
		height:'100%'
	},1,function(){
		$(this).filter('img').attr('src', images[i]);
		$(this).animate({
			width:'100%',
			height:'100%'
		});
	});
}

$('#right').on('click',function(){
	right();
});

*/

// get the css properties to the element
// var properties = $('#content').css(['font-size','color','line-height']);
// console.log(properties);



});