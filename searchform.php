<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<div class="row collapse">
	    <div class="large-12 columns">
	      <div class="row collapse">
	        <div class="small-10 medium-9 columns">
	        	<label>
					<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'tempo' ) ?></span>
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder', 'tempo' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'tempo' ) ?>" />
				</label>
	        </div>
	        <div class="small-2 medium-3 columns">
	        	<button type="submit" class="search-submit button postfix expanded"><i class="fa fa-search"></i></button>
	        </div>
	      </div>
	    </div>
	</div>
</form>