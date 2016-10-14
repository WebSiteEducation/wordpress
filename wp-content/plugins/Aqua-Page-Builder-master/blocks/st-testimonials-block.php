<?php
/* List Block */
if(!class_exists('ST_Testimonials_Block')) {
class ST_Testimonials_Block extends AQ_Block {

	function __construct() {
		$block_options = array(
		'name' => '<i class="fa fa-thumbs-o-up"></i> Testimonial',
		'size' => 'col-md-12',
	);
	
	//create the widget
	parent::__construct('st_testimonials_block', $block_options);
	
	//add ajax functions
	add_action('wp_ajax_aq_block_test_add_new', array($this, 'add_test_item'));
	
	}
	
	function form($instance) {
	
		$defaults = array(
			'title' => 'What Our Clients Say',
			'items' => array(
				1 => array(
					'title' => 'New Testimonial',
					'content' => '',
					'position' => ''
				)
			)
		);
	
	$instance = wp_parse_args($instance, $defaults);
	extract($instance);
	
	?>
	
	<div class="description">
		<label for="<?php echo $this->get_field_id('title') ?>">
			Title
			<?php echo aq_field_input('title', $block_id, $title, $size = 'full') ?>
		</label>
	</div>
	
	<div class="cf"></div>
	
	<div class="description cf">
	<ul id="aq-sortable-list-<?php echo $block_id ?>" class="aq-sortable-list" rel="<?php echo $block_id ?>">
	<?php
		$items = is_array($items) ? $items : $defaults['items'];
		$count = 1;
		foreach($items as $item) {	
			$this->item($item, $count);
			$count++;
		}
	?>
	</ul>
		<p></p>
		<a href="#" rel="test" class="aq-sortable-add-new button">Add New</a>
		<p></p>
	</div>

	<?php
	}
	
	function item($item = array(), $count = 0) {
	
	?>
	<li id="sortable-item-<?php echo $count ?>" class="sortable-item" rel="<?php echo $count ?>">
		<div class="sortable-head cf">
			<div class="sortable-title">
				<strong><?php echo $item['title'] ?></strong>
			</div>
			<div class="sortable-handle">
				<a href="#">Open / Close</a>
			</div>
		</div>
		<div class="sortable-body">
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title">
					Name<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-title" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][title]" value="<?php echo $item['title'] ?>" />
				</label>
			</div>
			
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-position">
					Position<br/>
					<input type="text" id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-position" class="input-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][position]" value="<?php echo $item['position'] ?>" />
				</label>
			</div>
			
			<div class="tab-desc description">
				<label for="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content">
					Testimonial<br/>
					<textarea id="<?php echo $this->get_field_id('items') ?>-<?php echo $count ?>-content" class="textarea-full" name="<?php echo $this->get_field_name('items') ?>[<?php echo $count ?>][content]" rows="5"><?php echo $item['content'] ?></textarea>
				</label>
			</div>
		
		<p class="tab-desc description"><a href="#" class="sortable-delete">Delete</a></p>
		</div>
	</li>
	<?php
	}
	
	function block($instance) {
	extract($instance);
	
	$output = '';
	
	$output .= '<div class="background-overlay"></div>	
	<div class="container">
	    <ul class="slideshow-vertical list-unstyled">';
	if (!empty($items)) {	
		foreach( $items as $item ) {
		      $output .= '<li>
		        <blockquote>';
		          $output .='<p>'.htmlspecialchars_decode($item['content']).'</p>';
				  $output .=	'<cite>&middot; '.strip_tags($item['title']).' - '.strip_tags($item['position']).' &middot;</cite>';			            
		      $output .= '</blockquote>
		      </li>';
		}
	}	  
	$output .= '</ul>
	</div>	';

	echo $output;
	
	}
	
	/* AJAX add testimonial */
	function add_test_item() {
	$nonce = $_POST['security'];	
	if (! wp_verify_nonce($nonce, 'aqpb-settings-page-nonce') ) die('-1');
	
	$count = isset($_POST['count']) ? absint($_POST['count']) : false;
	$this->block_id = isset($_POST['block_id']) ? $_POST['block_id'] : 'aq-block-9999';
	
	//default key/value for the testimonial
	$item = array(
		'title' => 'New Testimonial',
		'content' => '',
		'position' => ''
	);
	
	if($count) {
		$this->item($item, $count);
	} else {
		die(-1);
	}
	
	die();
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = aq_recursive_sanitize($new_instance);
		return $new_instance;
	}
}
}