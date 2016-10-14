<?php
/**
 * The main template file
**/
global $smof_data;
if ( isset( $smof_data['title_blog'] ) || isset( $smof_data['subtitle_blog'] ) ) {
	
	$title_blog = $smof_data['title_blog'];
	$subtitle_blog = $smof_data['subtitle_blog'];
}
else {
	$title_blog = '';
	$subtitle_blog = '';
}
$textdoimain = 'birva';
get_header(); ?>

<div id="about" class="section theblog">
<?php if ( have_posts() ) : ?>
	<div class="container">
		<!-- heading -->
		<div class="row">
			<div data-animated="fadeInDown" class="section-heading text-center picture animated fadeInDown">
				<h1 class="title"><span><?php echo $title_blog; ?></span></h1>
				<p class="subtitle"><?php echo $subtitle_blog; ?></p>				
			</div>
		</div>
	</div>
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
				echo '</div';
			endif;
		?>	
		</div>
	</div>
	<!-- end Recent post section -->
</div>

<?php
get_footer();?>

