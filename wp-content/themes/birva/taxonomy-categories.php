<?php 
get_header();
$textdoimain = 'brizzz';
?>

<div id="about" class="section theblog">
<?php if ( have_posts() ) : ?>
	<div class="container">
		<!-- heading -->
		<div class="row">
			<div class="section-heading text-center picture" data-animated="fadeInDown">
				<h1 class="title"><span>
				<?php printf( __( 'Category Archives: %s', 'birva' ), single_cat_title( '', false ) ); ?>	
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
	<div class="clearfix"></div>
	
	<!-- portfolio thumbnail list -->	
	<ul id="portfolio-list">	
	<?php
        $i = 1;
    	// Start the Loop.
		while ( have_posts() ) : the_post();
        $job =get_post_meta(get_the_ID(),'_cmb_portfolio_job', true); 
        $cates = get_the_terms(get_the_ID(),'Categories');
        $cate_name ='';
        $cate_slug = '';       
        $url = wp_get_attachment_url(get_post_thumbnail_id() );
	    foreach((array)$cates as $cate){
		      if(count($cates)>0){
		                $cate_name .= $cate->name.' &middot; ' ;
		                $cate_slug .= $cate->slug .' ';   
		      } 
	   } 
	?>	
		<li class="<?php echo $cate_slug; ?>">
			<img src="<?php echo $url; ?>" alt="" />
			<div class="portfolio-item-content">
				<span class="header"><?php echo get_the_title(); ?></span>
				<p class="body"><?php echo $job; ?></p>
			</div>
			<a href="#project<?php echo $i; ?>"><i class="more">+</i></a>
		</li>
	<?php 
		$i++;
    endwhile;
	?>
	</ul>
	<!-- end portfolio list -->	
	<div class="clearfix"></div>
		<?php
			echo '<div id="pagenavi_birva">';
				birva_numeric_posts_nav();
			echo '</div>';
		endif;
	?>	
	
	<!-- Project Expander -->
	<div id="project-container">
	  <div class="project-navigation">
			<button type="button" class="prev"><i class="fa fa-angle-left"></i></button>
			<button type="button" class="close">&times;</button>
		  <button type="button" class="next"><i class="fa fa-angle-right"></i></button>
	  </div>
	  <div class="project-content">
		  <!-- Open project will be loaded here via AJAX load() -->
	  </div>
	</div>
	
	<!-- Add your projects within this following section -->
	<div id="projects">
		<?php 
			$i = 1;
		    // Start the Loop.
			while ( have_posts() ) : the_post();
	        $job =get_post_meta(get_the_ID(),'_cmb_portfolio_job', true); 
			$layout =get_post_meta(get_the_ID(),'_cmb_portfolio_layout', true); 
			$format = get_post_format(get_the_ID(), 'portfolio');
			
	        $cates = get_the_terms(get_the_ID(),'Categories');
	        $cate_name ='';
	        $cate_slug = '';       
	        $url = wp_get_attachment_url(get_post_thumbnail_id() );
			
	        foreach((array)$cates as $cate){
		        if(count($cates)>0){
		                $cate_name .= $cate->name.' &middot; ' ;
		                $cate_slug .= $cate->slug .' ';   
		        } 
	       } 
		   
	      $gallery = get_post_gallery( get_the_ID(), false );
	      $gallery_ids = $gallery['ids'];
	      $img_ids = explode(",",$gallery_ids); 
		?>
		
		<div id="project<?php echo $i; ?>">
			<div class="project-header">
				<h3 class="title"><span><?php echo get_the_title(); ?></span></h3>
				<div class="type"><?php echo $cate_name; ?></div>
			</div>
			
			<?php //Layout		
			if($layout == 'one_columm'){ ?>
				
			<div class="col-sm-6 col-sm-offset-3">
			<?php //Format Content
				if ($format == ( 'video' ) || $format == ( 'audio' ) ) {
					echo '<div class="text-center">'.strip_shortcodes(get_the_content()).'</div>';
					$src = get_post_meta(get_the_ID(),'_cmb_portfolio_video', true);            
			  		$embed_code =  wp_oembed_get($src, array('height'=> 363));  						  
			    	echo $embed_code;
				}elseif ($format == 'gallery') {
					
					if(isset($gallery['ids'])){ ?>
						<ul class="slideshow-fade photobox list-unstyled">
						<?php
						foreach( $img_ids AS $img_id ){
							$image_src = wp_get_attachment_image_src($img_id,''); 
							echo '<li><img src="'.$image_src[0].'" alt=""></li>';
						}	?>
						</ul>
					<?php	
					}
					?>
					<div class="text-center">
						<div class="lead"><?php echo strip_shortcodes(get_the_content()); ?></div>
						<p><a class="btn btn-primary btn-lg" href="<?php echo get_permalink(); ?>">Learn More</a></p>
					</div>	
					
				<?php }else { ?>
					
					<img src="<?php echo $url; ?>" alt="" />
					<div class="text-center">
						<div class="lead"><?php echo strip_shortcodes(get_the_content()); ?></div>
						<p><a class="btn btn-primary btn-lg" href="<?php echo get_permalink(); ?>">Learn More</a></p>
					</div>
				<?php } ?> 
				
			</div>	
				
			<?php }elseif($layout == 'two_columm') { ?>
				
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
						<?php //Format Content
							if ($format == ( 'video' ) || $format == ( 'audio' ) ) {
								$src = get_post_meta(get_the_ID(),'_cmb_portfolio_video', true);            
						  		$embed_code =  wp_oembed_get($src, array('height'=> 363));  						  
						    	echo $embed_code;
							}elseif ($format == 'gallery') {
								
									if(isset($gallery['ids'])){ ?>
									
										<ul class="slideshow-fade photobox list-unstyled">
										<?php
										foreach( $img_ids AS $img_id ){
											$image_src = wp_get_attachment_image_src($img_id,''); 
											echo '<li><img src="'.$image_src[0].'" alt=""></li>';
										}	?>
										</ul>
										
									<?php
									}
							}else { 
								echo '<img src="'.$url.'" alt="" />';
							} ?>
						</div>
						<div class="col-sm-6">
							<?php echo get_the_content(); ?>
							<a href="<?php echo get_permalink(); ?>" class="btn btn-primary btn-lg">View Project</a>
						</div>
					</div>
				</div>
			<?php
			}else {
				//Format Content
				if ($format == ( 'video' ) || $format == ( 'audio' ) ) {
					$src = get_post_meta(get_the_ID(),'_cmb_portfolio_video', true);            
			  		$embed_code =  wp_oembed_get($src, array('height'=> 490));  
					echo '<p class="text-center">'.strip_shortcodes(get_the_content()).'</p>'; ?>
					
					<div class="row">
						<div class="col-sm-8 col-sm-offset-2">
							<div class="video-full-width"><?php echo $embed_code; ?></div>
						</div>
					</div>
					
				<?php }elseif ($format == 'gallery') {
					
					if(isset($gallery['ids'])){ ?>
					
						<ul class="slideshow-fade photobox list-unstyled">
						<?php 
						foreach( $img_ids AS $img_id ){
							$image_src = wp_get_attachment_image_src($img_id,''); 							
							echo '<li><img src="'.$image_src[0].'" alt=""></li>';
						}	?>
						</ul>
					<?php } ?>
					<div class="text-center">
						<div class="lead"><?php echo strip_shortcodes(get_the_content()); ?></div>
						<p><a class="btn btn-primary btn-lg" href="<?php echo get_permalink(); ?>">Learn More</a></p>
					</div>
					
				<?php }else { ?>
				
					<img src="<?php echo $url; ?>" alt="" />
					<div class="text-center">
						<div class="lead"><?php echo strip_shortcodes(get_the_content()); ?></div>
						<p><a class="btn btn-primary btn-lg" href="<?php echo get_permalink(); ?>">Learn More</a></p>
					</div>
					
					<?php 
				} 
			}
			?>
		</div>
		
	<?php 
			$i++;
    	endwhile; 
	?>		
	</div>
	<!-- end projects -->
</div>
<!-- end of portfolio -->

<?php get_footer();?>