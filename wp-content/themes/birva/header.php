<!DOCTYPE html>
<!--[if IE 8]> <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="ie9" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<!-- Metas
	================================================== -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, target-densitydpi=device-dpi"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!-- Page Title 
	================================================== -->
	<title><?php bloginfo('name'); ?>  <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	
	<!-- Favicon 
	================================================== -->
	<link rel="shortcut icon" href="<?php global $smof_data; echo $smof_data['favicon_uploader'];?>"/>
	
<?php wp_head();?>	
</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50"  <?php body_class('loading'); ?>>
<!-- preloader -->
<div id="loadbox">
	<div class="wrapper">
		<div class="inner">
			
		</div>
	</div>
</div>
<!-- end  -->

<!-- Full screen slider note: slider image path located in initialization script -->	

<!-- Header navigation -->
<header class="navbar show">
  <div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<div class="navbar-brand">
			<a href="<?php echo home_url();?>" ><img src="<?php global $smof_data; echo $smof_data['logo_uploader'];?>" alt="" /></a>
		</div>
  </div>
  <nav class="collapse navbar-collapse" role="navigation">
    <?php 
          wp_nav_menu( 
          array( 
                'theme_location' => 'header-menu',
                'container' => '',
                'menu_class' => 'nav navbar-nav', 
                'menu_id' => '',
			    'menu'            => '',
				'container_class' => '',
				'container_id'    => '',
				'echo'            => true,
				 'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				 'walker'            => new wp_bootstrap_navwalker(),
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,        
                  )
         ); ?> 
    <div id="toggle-navbar"><i class="fa fa-angle-right"></i></div>
  </nav>
</header>
<!-- End Header navigation -->
