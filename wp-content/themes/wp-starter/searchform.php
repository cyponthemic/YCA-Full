<form role="search" class="searchform" method="get" action="<?php echo home_url( '/' ); ?>">
    <div>
    	<label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" placeholder="Search <?php bloginfo( 'name' ); ?>..." />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>