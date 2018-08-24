<?php

/*
Plugin Name: News Widget by SMS
Description: This is Welcome message plugin by Mehboob. It will Show your Name and Role in the Dashboard. as well as Remove Howdy and display Hi in adminbar.
Author: Mehboob Shaikh
Version: 1.0
Author URI: https://www.twitter.com/mehboob_siraj
*/

function mehboob_news_widget(){ 
	$currenr_screen = get_current_screen();
	if($currenr_screen->id == 'dashboard'){
	// wp_enqueue_script('jquery-my','https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	//echo "<div class='user-details notice notice-success'><h4>User Detail</h4><p id='msg'>$chosen</p></div>";?>

	<div class='user-details notice notice-success news-widget-container'>
		<span class="widget-title">Custom Widget</span>
		<div class="postbox news-widget-postbox">
			<h2 class="hndle ui-sortable-handle" id="news-widget-01">
				<span>Daily News</span>
			</h2>
			<div class="inside">
				<div id="activity-widget">
					<div id="published-posts" class="activity-block">
						<h3>Top News</h3>

					    <?php
					    //Path to include feed.php file located in wp-includes folder.
					    include_once(ABSPATH . WPINC . '/feed.php'); 
					     
					    //Retrieves the feed and parses it. Specify the feed URL. This is my feed, put yours.
					    $rss = fetch_feed('https://ndtv.com');
					     
					    $newsnumber = 3;  /* How many news you want to show. Must be >= 1 */
					    $maxitems = $rss->get_item_quantity($newsnumber);
					     
					    $firstitem = 0; /* Specify the first item. 0 to start from the newest news. */
					    $rss_items = $rss->get_items($firstitem, $maxitems); 
					    // var_dump($rss_items[0]);
					    ?>
					     
					    <div class="twitter-list">
					        <ul class="clearfix" style="list-style: none;">
					        <?php $i=1;
					        if ($maxitems == 0) 
					                echo '<li>No Top News Yet!</li>';
					        else
					        //Loop through each feed item and display it as a link.
					        foreach ( $rss_items as $item ) { ?>
					            <li style="line-height: 1.5em;">
					            <!-- Get the news item title as an external link.-->
					            <a style="font-size: 0.95em; text-decoration: none" href='<?php echo $item->get_permalink(); ?>' target="_blank" title="External Link&#8230;" rel="nofollow">
					            <?php echo $item->get_title();
					             ?></a>
					            <div style="margin-top: 0.5em; font-size: 0.9em; width: 75%; text-align: justify;"><?php echo $item->get_content(); ?></div>
					            <?php //var_dump($item->feed->data['items']); ?>
					            <!-- Get the news item date.--> 
					            <span style="font-size: 0.7em; color: #777;"><?php echo 'Posted: ' . $item->get_date(); ?></span>
					            <?php 

					            if($i == 1){ echo "<script>";
					            	echo 'var news_title = ' . json_encode($item->get_title()) . ';';
					            	echo 'var news_link = ' . json_encode($item->get_permalink()) . ';';
					            	echo 'var news_content = ' . json_encode($item->get_content()) . ';';
					            	echo 'var news_date = ' . json_encode($item->get_date()) . ';';
					          		echo "</script>"; ?> <script>
					            	console.log(typeof(news_content));
					            	// jQuery('span.mehboob_single_news_title').empty();
					            	$(function(){
					            		jQuery("#mehboob_single_news_title").text(news_title.replace(/[^a-zA-Z ]/g, ""));
					            		jQuery("#mehboob_single_news_title").attr('href',news_link);
					            		jQuery("#mehboob_single_news_content").html(news_content);
					            		jQuery("#mehboob_single_news_date").text(news_date);
					            });
					            </script> <?php }

					            ?>
					            </li>
					        <?php $i++; } ?>
					        </ul> 
					    </div>
					</div>
				</div>
			</div>
		</div><!-- Postbox END -->

		<div class="dummy-text">
			<a id="mehboob_single_news_title" href="#" target="_blank"></a>
			<p id="mehboob_single_news_content"></p>
			<span id="mehboob_single_news_date"></span>
		</div>

	</div>

	<?php
}}
add_action( 'admin_head', 'mehboob_news_widget',99 );

function mehboob_news_widget_css(){ ?>

	<style type="text/css">

		news-widget-container {
			display: inline;
		}
		.news-widget-postbox {
			display: inline-block;
			text-align: left;
			width: 40%;
		}
		.dummy-text {
			margin: 0;
			margin-left: 1.5%;
			padding: 0;
			display: inline-block;
			width: 55%;
			vertical-align: top;
		}
		#mehboob_single_news_title {
			text-decoration: none;
			/*letter-spacing: 0.015em;*/
			line-height: 1.2em;
			font-size: 25px;
			color: #007eca;
			/*outline: none;*/
		}
		div.dummy-text p {
			margin: 0;
			margin-top: 5%;
			margin-bottom: 5%;
			padding: 0;
			padding-left: 5%;
			font-size: 16px;
			font-weight: bold;
			color: #333;
		}
		#mehboob_single_news_date {
			margin-bottom: 15px;
			font-size: 0.8em;
			color: #777;
			float: right;
		}
		span.widget-title {
		    color: #444;
	        font-family: "Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif;
			font-size: 1em;
		    margin: 1.33em 0;
			display: block;
		    font-weight: 600;
		}
		#news-widget-01 {
			margin: 0;
			padding: 7px;
			cursor: pointer;
		}
		#toggle-indicator:before {
	    margin-top: 4px;
	    width: 20px;
	    border-radius: 50%;
	    text-indent: -1px;
	}


	#toggle-indicator:before {
	    content: "\f142";
	    display: inline-block;
	    font: 400 20px/1 dashicons;
	    speak: none;
	    -webkit-font-smoothing: antialiased;
	    text-decoration: none!important;
	}
	</style>

<?php }
add_action('admin_head','mehboob_news_widget_css');
?>

