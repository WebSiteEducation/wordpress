<?php
/**
 * The template for displaying Archive pages
 */

get_header(); ?>

<div id="about" class="section theblog">
<?php if ( have_posts() ) : ?>
	<div class="container">
		<!-- heading -->
		<div class="row">
			<div class="section-heading text-center picture" data-animated="fadeInDown">
				<h1 class="title"><span>
				<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'birva' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'birva' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'birva' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'birva' ), get_the_date( _x( 'Y', 'yearly archives date format', 'birva' ) ) );

						else :
							_e( 'Archives', 'birva' );

						endif;
					?>	
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
<div class="clearfix"></div>
<?php
get_footer();
