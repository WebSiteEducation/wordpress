<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="about" class="section theblog">
<?php 
	// search only posts
	global $wp_query;
	$args = array_merge( $wp_query->query, array( 'post_type' => 'post' ) );
	query_posts( $args ); 
?>
<?php if ( have_posts() ) : ?>
	<div class="container">
		<!-- heading -->
		<div class="row">
			<div class="section-heading text-center picture" data-animated="fadeInDown">
				<h1 class="title"><span>
				<?php printf( __( 'Search Results for: %s', 'birva' ), get_search_query() ); ?>
				</span></h1>						
			</div>
		</div>
	</div>
	<!-- end heading -->
	<!-- Recent post section -->
	<div id="blogpost" class="clearfix">
		<div class="container">
			<div class="isotope" id="fullwidth">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content' );

				endwhile;
				
				else :
				?>
				<div class="container">
					<div class="row">
						<div class="section-heading text-center picture" data-animated="fadeInDown">
							<h1 class="title"><span>
							<?php printf( __( 'Search Results for: %s', 'birva' ), get_search_query() ); ?>
							</span></h1>						
						</div>
					</div>
					<div class="row">
						<?php
							// If no content, include the "No posts found" template.
				'<p>'. _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'birva' ).'</p>';
 				get_search_form(); 
						 ?>
					</div>
				</div>	
		</div><!-- end fullwidth -->
			<div class="clearfix"></div>
			<?php
				echo '<div id="pagenavi_birva">';
					birva_numeric_posts_nav();
				echo '</div>';
			endif;
		?>	
		</div>
	</div>
	<!-- end Recent post section -->
</div>
<?php
get_footer();
