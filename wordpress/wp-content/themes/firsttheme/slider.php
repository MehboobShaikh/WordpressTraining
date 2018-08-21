
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->

<style type="text/css">

#slider {
  position: relative;
  overflow: hidden;
  margin: 20px auto 0 auto;
  border-radius: 4px;
}

#slider ul {
  position: relative;
  margin: 0;
  padding: 0;
  height: 200px;
  list-style: none;
}

#slider ul li,img {
  position: relative;
  display: block;
  float: left;
  margin: 0;
  padding: 0;
  width: 500px;
  height: 300px;
}

a.control_prev, a.control_next {
  position: absolute;
  top: 40%;
  z-index: 999;
  display: block;
  padding: 4% 3%;
  width: auto;
  height: auto;
  background: transparent;
  color: #fff;
  text-decoration: none;
  font-weight: bold;
  font-size: 1.5em;
  opacity: 1;
  cursor: pointer;
}

a.control_prev:hover, a.control_next:hover {
  opacity: 0.2;
  -webkit-transition: all 0.2s ease;
}

a.control_prev {
  border-radius: 0 2px 2px 0;
}

a.control_next {
  right: 0;
  border-radius: 2px 0 0 2px;
}

    </style>
    
<div id="slider">
  <a class="control_next">></a>
  <a class="control_prev"><</a>

  <ul>
  <!-- Slide Images goes Here -->
        <?php if(have_rows('news_media_image') || have_rows('news_media_video')){
            //Loop for Images
            while(have_rows('news_media_image')){ the_row();
                // Sub fields of Images

                if(get_sub_field('media_image')){
                    $media_image = get_sub_field('media_image');

                  /*
                  *  //passing php variable to javascript usin JSON 
                  *  echo "<script>";
                  *  echo 'var medimg = ' . json_encode($media_image, JSON_PRETTY_PRINT) . ';';
                  *  echo "</script>";
                  *  echo "<script>console.log(medimg);</script>";
                  */

                    // echo var_dump($media_image['url']);?>
    <li class="item"><img src="<?php echo $media_image['url']; ?>"></li>
    <!-- <li class="item"><img src="<?php echo get_template_directory_uri().'/img/032.jpg' ?>"></li> -->
    <!-- <li class="item"><img src="<?php echo get_template_directory_uri().'/img/033.jpg' ?>"></li> -->
    <!-- <li class="item"><img src="<?php echo get_template_directory_uri().'/img/034.jpg' ?>"></li> -->

      <?php }
          }


            //Loop for Videos
            while(have_rows('news_media_video')){ the_row();
                // Sub fields of Video

                if(get_sub_field('media_video')){
                    $media_video = get_sub_field('media_video');
                    //echo var_dump($media_video);?>

                    <li class="item">
                      <iframe height="380px" src="<?php echo $media_video; ?>" frameborder="0" allowfullscreen></iframe>
                    </li>
                    
                <?php }
            }


        }?>
  </ul>  
</div>
<div id="output" class="news-slide-description">
  
</div>

<script>

     jQuery(document).ready(function ($) {
  
      var slideIndex = jQuery('ul.active').index() +1;
      var totalItems = ($('.item').length) - 1;
      // console.log("Total Items"+totalItems);
      // console.log("Current Index"+slideIndex);


      // Initial Response from Ajax
      $.ajax({
              type: 'post',
              // url: 'wordpress/wp-admin/admin-ajax.php',
              data: { 'passindex' : slideIndex },
              success: function (response){
                if(response === 'no-image' || response === ''){
                  $('#output').empty();
                  $("#output").attr('class',response);
                }else{
                  $('#output').empty();
                  $('#output').append('<q> '+response+' </q>');
                  $("#output").attr('class', 'news-slide-description');
                }
              }
            });


    /*  /var/www/html/WP/wordpress/wp-content/themes/First Theme/single-news.php */
           
    /*$.post('wordpress/wp-admin/admin-ajax.php',{'action':'index_of_slider'},function(response){
      alert('done');
    });*/


      setInterval(function () {
            moveRight();
        }, 5000);


    
      var slideCount = $('#slider ul li').length;
      var slideWidth = $('#slider ul li').width();
      var slideHeight = $('#slider ul li').height();
      var sliderUlWidth = slideCount * slideWidth;
      
      $('#slider').css({ width: slideWidth, height: slideHeight });
      
      $('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
      
      $('#slider ul li:last-child').prependTo('#slider ul');

      function moveLeft() {
          $('#slider ul').animate({
              left: + slideWidth
          }, 300, function () {
              $('#slider ul li:last-child').prependTo('#slider ul');
              $('#slider ul').css('left', '');
          });
          if(slideIndex == 0){
            slideIndex = totalItems;
          }else{
            slideIndex -= 1;
          }

          // Respose from ajax when Slide Move to Left
          $.ajax({
            type: 'post',
            // url: 'wordpress/wp-admin/admin-ajax.php',
            data: { 'passindex' : slideIndex },
            success: function (response){
              if(response === 'no-image' || response === ''){
                $('#output').empty();
                $("#output").attr('class', response);
              }else{
                $('#output').empty();
                $('#output').append('<q> '+response+' </q>');
                $("#output").attr('class', 'news-slide-description');
              }
            }
          });
          // console.log(slideIndex);
      };

      function moveRight() {
          $('#slider ul').animate({
              left: - slideWidth
          }, 300, function () {
              $('#slider ul li:first-child').appendTo('#slider ul');
              $('#slider ul').css('left', '');
          });
          if(slideIndex == totalItems){
              slideIndex = 0;
            }else{
              slideIndex += 1;
            }
        // console.log(slideIndex);


        // Respose from ajax when Slide Move to Left
        $.ajax({
            type: 'post',
            // url: 'wordpress/wp-admin/admin-ajax.php',
            data: { 'passindex' : slideIndex },
            success: function (response){
              if(response === 'no-image' || response === ''){
                $('#output').empty();
                $("#output").attr('class', response);
              }else{
                $('#output').empty();
                $('#output').append('<q> '+response+' </q>');
                $("#output").attr('class', 'news-slide-description');
              }
            }
          });
        

      };

      $('a.control_prev').click(function () {
          moveLeft();
      });

      $('a.control_next').click(function () {
          moveRight();
      });

    });
   </script>
 </body>
 </html>