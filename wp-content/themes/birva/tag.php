<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 */

get_header(); ?>
<div id="about" class="section theblog">
<?php if ( have_posts() ) : ?>
	<div class="container">
		<!-- heading -->
		<div class="row">
			<div class="section-heading text-center picture" data-animated="fadeInDown">
				<h1 class="title"><span>
				<?php printf( __( 'Tag Archives: %s', 'twentyfourteen' ), single_tag_title( '', false ) ); ?>	
				</span></h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<p class="subtitle text-center">%s</p>', $term_description );
					endif;
				?>							
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
			?>
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
