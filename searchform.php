<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'biwako' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'biwako' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'biwako' ); ?>" />
	</label>
	<input type="submit" class="search-submit button button-search" value="<?php echo esc_attr_x( 'Search', 'submit button', 'biwako' ); ?>" />
</form>
