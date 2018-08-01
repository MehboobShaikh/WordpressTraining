<?php
	if(has_category()) :?> 
		<form method="get">
		<?php $categories = get_categories();

		echo '<div class="post-filter-item"><input type="checkbox" value="All" >All</div>';
			foreach($categories as $category){
				if($category->name != 'Uncategorized'){
					echo '<div class="post-filter-item"><input type="checkbox" value="'.$category->name.'" >' . $category->name . '</div>';
				}
			}
				echo '<div class="submit-filter-button"><input type="submit" value="Filter"></div>';
			?>
			</form>
<?php
	endif;		
?>