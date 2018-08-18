<?php

/*
Template Name: First Template
Author: Mehboob Shaikh
version: 1.0
*/

?>
<?php
	
	get_header();

	?>

<?php
	
	if(have_posts()) : 
		while(have_posts()) : the_post(); ?>

			<nav class="template-site-nav">
				
				<div>
					<span class="parent-link clearfix"><a href="<?php the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
				</div>

				<ul class="children-links clearfix">
					<?php
						$args = array(
							'child_of' => get_top_ancestor_id(),
							'title_li' => ''
						);
					
						wp_list_pages($args);
					?>
				</ul>

			</nav>

			<div class="page-section">
				<article class="post page">
				
					<div class="page-post-title">
						<h2><?php the_title(); ?></h2>
					</div>
				
					<!-- Template Part -  News Box -->
					<div class="info-box">
						
						<h4 class="info-box-title">Random News from top 10</h4>

						

						<div class="box">
						<div class="box_content">
						    <?php
						    //Path to include feed.php file located in wp-includes folder.
						    include_once(ABSPATH . WPINC . '/feed.php'); 
						     
						    //Retrieves the feed and parses it. Specify the feed URL. This is my feed, put yours.
						    $rss = fetch_feed('https://ndtv.com');
						     
						    $newsnumber = 1;  /* How many news you want to show. Must be >= 1 */
						    $maxitems = $rss->get_item_quantity($newsnumber);
						     
						    $firstitem = rand(0,10); /* Specify the first item. 0 to start from the newest news. */
						    $rss_items = $rss->get_items($firstitem, $maxitems); 
						    // var_dump($rss_items[0]);
						    ?>
						     
						    <div class="twitter-list">
						        <ul class="clearfix" style="list-style: none;">
						        <?php 
						        if ($maxitems == 0) 
						                echo '<li>No Top News Yet!</li>';
						        else
						        //Loop through each feed item and display it as a link.
						        foreach ( $rss_items as $item ) { ?>
						            <li>
						            <!-- Get the news item title as an external link.-->
						            <a style="font-size: 0.95em;" href='<?php echo $item->get_permalink(); ?>' target="_blank" title="External Link&#8230;" rel="nofollow">
						            <?php echo $item->get_title();
						             ?></a>
						            <div style="margin-top: 0.5em; font-size: 0.8em;"><?php echo $item->get_content(); ?></div>
						            <?php //var_dump($item->feed->data['items']); ?>
						            <!-- Get the news item date.--> 
						            <span style="font-size: 0.7em; float: right; margin-top: 1.5em; color: #777;"><?php echo 'Posted: ' . $item->get_date(); ?></span>
						            </li>
						        <?php } ?>
						        </ul> 
						    </div>
						</div>
						</div>




					</div> <!--Template Part -->
				
					<div class="page-post-content">
						<?php the_content(); ?>
					</div>
				
				</article>
			</div>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>