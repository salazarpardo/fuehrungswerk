<?php if ( function_exists('yoast_breadcrumb') && (!is_front_page() ) || (is_home() && get_option('page_for_posts'))) 
{yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumbs">','</p>');} ?>