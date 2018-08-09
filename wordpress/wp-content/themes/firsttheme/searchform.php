<form role="search" method="get" id="searchform" class="searchform" action="http://localhost/WP/wordpress/">
	<div>
		<label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" value="" name="s" id="s" placeholder=" <?php if(get_search_query()){the_search_query();}else { echo "Search Here"; }?>">
		<input type="submit" id="searchsubmit" value="Search">
	</div>
</form>