<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
global $smof_data; 
if ( isset( $smof_data['excerpt'] ) ) {
$excerpt = $smof_data['excerpt'];
}
else {
$excerpt = '25';
} 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('postlist isotope-item'); ?>>
	<div class="thumb">
		<div class="date"><span><?php the_time('F'); ?><br /><?php the_time('j'); ?></span></div>
	<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_post_thumbnail('full'); ?></a>
	</div>
	<div class="postcontent">
		<h5><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
		<p><?php echo birva_excerpt($excerpt); ?></p>
		<a href="<?php the_permalink();?>">Read more <i class="fa fa-long-arrow-right"></i></a>
		<br class="clearfix"/>						
	</div>
</article><!-- #post-## -->
