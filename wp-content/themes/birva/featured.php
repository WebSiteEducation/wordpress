<?php
/*
 * Template Name: Featured
 * Description: A Page Template with a Page Featured design.
 */
$textdoimain = 'birva';
get_header(); ?>
<div class="section">
	<div class="container">
<?php if ( have_posts() ) :?>	
		<div class="section-heading text-center">
			<h2 class="title"><span><?php the_title(); ?></span></h2>
			<?php
			if( $post->post_excerpt ) {?>
			    <p class="subtitle"><?php echo excerpt(9999); ?></p>			
			<?php } else {}?>		
		</div>
		<div id="content">
<?php	
			// Start the Loop.
			while ( have_posts() ) : the_post();

				the_content();

			endwhile;

		else :
			echo '<p>Page Canvas For Page Builder</p>';
		endif;
	?>
	</div>
	</div>
</div>
<?php get_footer(); ?>