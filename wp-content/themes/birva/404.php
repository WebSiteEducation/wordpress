<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div class="section">
	<div class="container">
		
		<div class="row">
			<div class="col-md-8">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="section-heading">
						<h3 class="title"><span><?php _e( 'Not Found', 'birva' ); ?></span></h3>					
					</div>					
					<div class="postcontent">
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'birva' ); ?></p>
				
				<?php get_search_form(); ?>			
					</div>
				</article>			
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
