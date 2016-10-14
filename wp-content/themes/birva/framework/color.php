<?php
$root =dirname(dirname(dirname(dirname(dirname(__FILE__)))));
//echo $root; 
if ( file_exists( $root.'/wp-load.php' ) ) {
    require_once( $root.'/wp-load.php' );
} elseif ( file_exists( $root.'/wp-config.php' ) ) {
    require_once( $root.'/wp-config.php' );
}
header("Content-type: text/css; charset=utf-8");
function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

global $smof_data;

$b=$smof_data['body_color'];
$rgba = hex2rgb($b);   

/*
$f=$smof_data['footer_background'];
$rgbaf = hex2rgb($f);   

$text=$smof_data['text_color'];
$rgbat = hex2rgb($text);  */ 
?>

body {
	font-family: <?php echo $smof_data['google_fonts']; ?>, sans-serif;
}
/**
* 
* Unlimited Color here.
* 
*/
.btn-primary,
.btn-default:hover,
.modal-profile .details .position,
header.navbar .navbar-toggle .icon-bar,
#toggle-navbar,
.pricing-table .pricing-title,
#portfolio-filter li.active,#about .about-block:hover .circle, #bgcolor_process { background: <?php echo $smof_data['body_color']; ?>; }
#portfolio-list li:hover .more:hover:before,.team-nav li.active,.pane a.more,.googlemap,.postlist .thumb,.postcontent h5 a:hover { color: <?php echo $smof_data['body_color']; ?>; border-color: <?php echo $smof_data['body_color']; ?>; }
.arrow-down { border-top-color: <?php echo $smof_data['body_color']; ?>; }
header.navbar .navbar-nav li.active a {
  box-shadow:0 0 92px 1px rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.4);
  -webkit-box-shadow:0 0 92px 1px rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.4);
  -moz-box-shadow:0 0 92px 1px rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.4);
  -o-box-shadow:0 0 92px 1px rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.4);}
a,.pane h3,.getNum,.processLead-list li a i,#issues li h1,.service:hover .service-title .title,#close-pricing1 i, #close-pricing2 i, #close-pricing3 i{color:<?php echo $smof_data['body_color']; ?>;}
.messageHeader span.purple,#home .go,.date,.quotepost{	
 background: rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.9);
 background-image: url("<?php echo get_template_directory_uri();?>/images/05_bgpattern.png");
}
#portfolio-list li .portfolio-item-content {
	background: url("<?php echo get_template_directory_uri();?>/images/05_bgpattern.png") repeat scroll 0 0 rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.9);
}
#about .about-block .circle{
	background-color:rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.7);
	border:30px solid rgba(255, 255, 255, 0.8)
}
#services,.bx-wrapper .bx-controls .bx-pager .bx-pager-item a.active:after,#contactform .btn-default, #contactform1 .btn-default,.pricing-col2,.pricingtable .btn:hover{background:<?php echo $smof_data['body_color']; ?>;}
.bg-discovery,.bg-planning,.bg-design,.bg-develop,.bg-launch,.pricing-col1{
 	background: rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.5);
}
#testimonials .background-overlay{background-color:rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 0.9)}
.mail-message [contenteditable="true"]{border-bottom:6px dotted <?php echo $smof_data['body_color']; ?>;color:<?php echo $smof_data['body_color']; ?>}
.btn-footer{background:<?php echo $smof_data['body_color']; ?>;border:1px solid <?php echo $smof_data['body_color']; ?>}
.widget a:hover{
	color:rgba(<?php echo $rgba[0]; ?>, <?php echo $rgba[1]; ?>, <?php echo $rgba[2]; ?>, 1)
}
/**
* Css More
*/
#wp-calendar tbody td#today,
#comment_form input[type="submit"] {
	background: <?php echo $smof_data['body_color']; ?>;
}
.search_form input.search_btn:hover {
	background-color:<?php echo $smof_data['body_color']; ?>;
}
.search_form input:focus {border-color:<?php echo $smof_data['body_color']; ?>;}
.search_form:hover:before {color:<?php echo $smof_data['body_color']; ?>;}

/**
* 
* Contact Form
* 
*/
#contactform input.placeholder[placeholder], #contactform textarea.placeholder[placeholder] {
  border-bottom: 6px dotted <?php echo $smof_data['body_color']; ?>;
  color: <?php echo $smof_data['body_color']; ?>;
}
#contactform textarea.contact_message {
	color: <?php echo $smof_data['body_color']; ?>;
}

/**
* Pagenavi
*/
#pagenavi_birva .pagination > .active > a {
	background-color: <?php echo $smof_data['body_color']; ?>;
	border-color: <?php echo $smof_data['body_color']; ?>;
}
.widget_tags li a {
	background-color: <?php echo $smof_data['body_color']; ?>;
}
/**** Color Footer ****/
#footer {
	background-color: <?php echo $smof_data['footer_background']; ?> !important;
}
#footer a {
	color: <?php echo $smof_data['text_color']; ?>;
}
.btn-footer {
	color: #050F1E !important;
}
<?php if ( isset( $smof_data['style_css'] ) ) :
echo $smof_data['style_css'];
endif; ?>