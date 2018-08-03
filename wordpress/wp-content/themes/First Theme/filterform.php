<?php
	if(has_category()) :?> 
		<!-- <form method="get"> -->
		
		<?php $categories = get_categories();?>

		<div class="widget-item post-filter"><h2 class="widgettitle">Filter Post Here</h2>

		<?php	$i = 1;
			foreach($categories as $category){
				if($category->name != 'Uncategorized'){
					echo '<div class="post-filter-item"><input name="filter_cat'.$i.'" type="checkbox" value="'.$category->name.'" >' . $category->name . '</div>';
				}
			$i++;
			}
				// echo '<div class="submit-filter-button"><input name="submit_filter" type="submit" value="Filter"></div>';
				echo '<div class="testing"><input id="test" name="testing" type="text" value="Button"></div>';
			?>
		</div>

		<!-- </form> -->
<?php
	endif;		
?>