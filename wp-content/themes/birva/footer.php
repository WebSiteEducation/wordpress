<?php
/**
 * The template for displaying the footer
 */
global $smof_data;
if ( isset( $smof_data['footer_phone'] ) || isset( $smof_data['footer_email'] ) || isset( $smof_data['twitter'] ) || isset( $smof_data['facebook'] ) || isset( $smof_data['gplus'] ) || isset( $smof_data['dribbble'] ) || isset($smof_data['footer_text']) || isset($smof_data['linkedin']) || isset($smof_data['social_more']) || isset($smof_data['flickr']) || isset($smof_data['pinterest']) ) {
	
	$phone = $smof_data['footer_phone'];
	$mail = $smof_data['footer_email'];
	$text = $smof_data['footer_text'];
	$twitter = $smof_data['twitter'];
	$facebook = $smof_data['facebook'];
	$googleplus = $smof_data['gplus'];
	$dribbble = $smof_data['dribbble'];
	$linkedin = $smof_data['linkedin'];
	$social_more = $smof_data['social_more'];
	$pinterest = $smof_data['pinterest'];
	$flickr = $smof_data['flickr'];
}
else {
	$phone = '';
	$mail = '';
	$twitter = '';
	$facebook = '';
	$googleplus = '';
	$dribbble = '';
	$linkedin = '';
	$text = '';
	$social_more = '';
	$pinterest = '';
	$flickr = '';
}
if (isset($smof_data['getstarted_text']) || isset($smof_data['getstarted_link'])){
	$getstarted_text = $smof_data['getstarted_text'];
	$getstarted_link = $smof_data['getstarted_link'];
}else{
	$getstarted_text = '';
	$getstarted_link = '';
}
$getstarted_showhide = ( isset($smof_data['getstarted_showhide']) ) ? $smof_data['getstarted_showhide'] : 0;
?>

<!-- Footer -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="footer-text clearfix">
					<?php if ((!empty($phone)) || (!empty($mail))) {
						echo '<a class="footer-link" href="mailto:'.$mail.'">'.$mail.'</a>';
						echo '<a class="footer-link" href="tel:'.$phone.'">'.$phone.'</a>';
					}else {?>
							
					<?php }?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="social social-networks-transparent">
			<?php	
				if (!empty($facebook)) { '<a href="'.$facebook.'" ><i class="fa fa-facebook fa-lg"></i></a>';}else {}
				if (!empty($linkedin)) {echo '<a href="'.$linkedin.'"><i class="fa fa-linkedin fa-lg"></i></a>';}else {}
				if (!empty($twitter)) {echo '<a href="'.$twitter.'" ><i class="fa fa-twitter fa-lg"></i></a>';}else {}
				if (!empty($dribbble)) {echo '<a href="'.$dribbble.'" ><i class="fa fa-dribbble fa-lg"></i></a>';}else {}
				if (!empty($flickr)) {echo '<a href="'.$flickr.'" ><i class="fa fa-flickr fa-lg"></i></a>';}else {}
				if (!empty($googleplus)) {echo '<a href="'.$googleplus.'" ><i class="fa fa-google-plus fa-lg"></i></a>';}else {}
				if (!empty($pinterest)) {echo '<a href="'.$pinterest.'" ><i class="fa fa-pinterest fa-lg"></i></a>';}else {}
				if (!empty($social_more)) {echo $social_more;}else {}
			 ?>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-cta clearfix">
				<p class="footer-p footer-cta-p"><?php echo $text; ?></p>
				<?php
					if($getstarted_showhide == 1){
						echo '<a class="btn btn-default btn-footer  footer-cta-a" href="'.$getstarted_link.'">'.$getstarted_text.'</a>';
					}
					else{}
				?>
				</div>
			</div>
		</div>		
	</div>
</footer>
<!-- end Footer -->

<?php wp_footer(); ?>
</body>
</html>