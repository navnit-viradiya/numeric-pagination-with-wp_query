<?php
/*
** Numeric Pagination Function
** Add wpex_pagination function in function.php or include file in function.php
**
*****/
if ( !function_exists( 'wpex_pagination' ) ) {
	function wpex_pagination() {

		$prev_arrow = is_rtl() ? '→' : '←';
		$next_arrow = is_rtl() ? '←' : '→';

		global $wp_query;

		if ( $wp_query ) {
		$total = $wp_query->max_num_pages;
		} else {
		$total = $wp_query->max_num_pages;
		}

		$big = 999999999; // need an unlikely integer
		if( $total > 1 ) {
			if( !$current_page = get_query_var('paged') )
			$current_page = 1;
				if( get_option('permalink_structure') ) {
				$format = 'page/%#%/';
				} else {
				$format = '&paged=%#%';
				}
				echo paginate_links(array(
				'base'	=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format'	=> $format,
				'current'	=> max( 1, get_query_var('paged') ),
				'total' => $total,
				'mid_size'	=> 3,
				'type' => 'list',
				'prev_text'	=> $prev_arrow,
				'next_text'	=> $next_arrow,
				) );
		}
	}
}
?>