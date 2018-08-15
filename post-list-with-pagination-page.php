<?php
/*
Template Name:Post List With Pagination
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
			$args = array(
				'post_type' => 'product',
				'posts_per_page' => 2,
				'paged'			=> $paged
			);
		
			$wp_query = new WP_Query( $args );
			if ( $wp_query->have_posts() ) {
				while ( $wp_query->have_posts() ) {
					$wp_query->the_post();
					get_template_part( 'template-parts/post/content', 'excerpt' );
				}
=				wpex_pagination();
			} // endif
			// Reset Post Data
			wp_reset_postdata();
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();