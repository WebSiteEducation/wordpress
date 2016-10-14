<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>
<div class="section">
	<div class="container">
		
		<div class="row">
			<div class="col-md-8">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="section-heading">
						<h3 class="title"><span><?php the_title(); ?></span></h3>							
					</div>
					<div class="blogthumb">
						<?php the_post_thumbnail('full'); ?>
					</div>
					<div class="postcontent">
						<?php the_content(); ?>							
					</div>
				</article>	
				<?php wp_link_pages(); ?>
				<?php endwhile; ?>				
			</div>
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
