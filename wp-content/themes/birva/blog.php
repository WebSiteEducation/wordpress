<?php
/*
 * Template Name: Blog
 * Description: Blog Template show all post.
 */
$textdoimain = 'birva';
get_header('home'); ?>

<?php if (have_posts()){ ?>
	
		<?php while (have_posts()) : the_post()?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	
	<?php }else {
		echo 'Page Canvas For Page Builder'; 
}?>

<?php get_footer(); ?>