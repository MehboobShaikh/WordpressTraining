<!DOCTYPE html>
<html>
<head>
	<title>Slick Slider</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js"></script>
	<style type="text/css">
		body{
		  background:#ccc;
		}
		.main {
		  font-family:Arial;
		  width:500px;
		  display:block;
		  margin:0 auto;
		}
		div.size {
			height: 250px;
		    background: #fff;
		    color: #3498db;
		    font-size: 36px;
		    /*line-height: 100px;*/
		    /*margin: 10px;*/
		    /*padding: 2%;*/
		    /*position: relative;*/
		    text-align: center;
		}
	</style>
</head>
<body>

	<div class="main">
	  <div class="slider slider-for">
	    <div class="size">SMS</div>
	    <div class="size">SMS</div>
	    <div class="size">SMS</div>
	    <div class="size">SMS</div>
	    <div class="size">SMS</div>
	  </div>
	</div>
	<script type="text/javascript">
		 $('.slider-for').slick({
		   slidesToShow: 1,
		   slidesToScroll: 1,
		   arrows: true,
		   fade: true,
		   autoplay: true,
		   dots: true
		 });
	</script>

</body>
</html>