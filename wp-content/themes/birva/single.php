<?php
/**
 * The Template for displaying all single posts
 */
global $smof_data;

//$sidebar = $smof_data['sidebar_option'];

if ( isset( $smof_data['sidebar_option'] ) ) {
$sidebar = $smof_data['sidebar_option'];
}
else {
$sidebar = 'right';
}
$textdoimain = 'birva';
get_header(); ?>

<div class="section">
	<div class="container">
		
		<div class="row">
			<?php if ($sidebar == 'left') :?>
            	<div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>  
            <?php endif; ?> 
			<div class="col-md-8">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
				  $format = get_post_format(get_the_ID(), 'post');	
				  $url = wp_get_attachment_url(get_post_thumbnail_id() );
				  $gallery = get_post_gallery( get_the_ID(), false );
			      $gallery_ids = $gallery['ids'];
			      $img_ids = explode(",",$gallery_ids);	
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="section-heading">
						<h3 class="title"><span><?php the_title(); ?></span></h3>
						<p class="subtitle text-center"><?php the_time('F j Y'); ?></p>		
					</div>
					<div class="blogthumb">
					<?php //Format Content
						if ($format == ( 'video' ) || $format == ( 'audio' ) ) {
							$src = get_post_meta(get_the_ID(),'_cmb_linkvideo', true);            
					  		$embed_code =  wp_oembed_get($src, array('height'=> 490));  						  
					    	echo $embed_code;
						}elseif ($format == 'gallery') { ?>
						<ul class="slideshow-fade photobox list-unstyled">
						<?php
							foreach( $img_ids AS $img_id ){
								$image_src = wp_get_attachment_image_src($img_id,''); 
								echo '<li><img src="'.$image_src[0].'" alt=""></li>';
							}	?>
						</ul>
						<?php	
						} else { ?>
						<img src="<?php echo $url; ?>" alt="" />
						<?php } ?>
					</div>
					<div class="postcontent">
						<?php the_content(); ?>				
					</div>
				</article>	
				<!-- SINGLE BLOG POST TAG -->
				<div class="widget_tags margbot50" data-animated="fadeInUp">
					<?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?>
				</div><!-- //SINGLE BLOG POST TAG -->
				
				<?php wp_link_pages(); ?>
				<?php endwhile; ?>
				<?php comments_template();?>
			</div>
			<?php if ($sidebar == 'right') :?>
	            <div class="col-md-4">
					<?php get_sidebar(); ?>
				</div>    
            <?php endif; ?> 
		</div>
	</div>
</div>
<?php
get_footer();
