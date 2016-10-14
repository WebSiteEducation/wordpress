<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */

add_filter( 'cmb_meta_boxes', 'cmb_sample_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';
	/**
	 * Metabox for the user profile screen
	 */
    $meta_boxes['test_metabox'] = array(
		'id'         => 'test_metabox',
		'title'      => __( 'Birva Metabox', 'cmb' ),
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'     => array( 	      
			array(
				'name' => __( 'Link Video', 'cmb' ),
				'desc' => __( 'Add link Video Youtube, Vimeo. Ex: http://www.youtube.com/watch?v=tDvBwPzJ7dY or http://vimeo.com/47989207', 'cmb' ),
				'id'   => $prefix . 'linkvideo',
				'type' => 'oembed',
			
			),
             
		),
	);
	// Add other metaboxes as needed
	
	 $meta_boxes['portfolio_metabox'] = array(
		'id'         => 'portfolio_metabox',
		'title'      => __( 'Portfolio Metabox', 'cmb' ),
		'pages'      => array( 'portfolio', ),  //Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true,  //Show field names on the left
		// 'cmb_styles' => true,  Enqueue the CMB stylesheet on the frontend
		'fields'     => array(			
			array(
				'name' => __( 'Job', 'cmb' ),
				'desc' => __( 'Job out portfolio', 'cmb' ),
				'id'   => $prefix . 'portfolio_job',
				'type' => 'text',
                'std'  => '',			
			),
            array(
				'name' => __( 'Project', 'cmb' ),
				'desc' => __( 'Link to project out portfolio', 'cmb' ),
				'id'   => $prefix . 'portfolio_project',
				'type' => 'text',
				'std'  => '#',	
            ),	
			array(
				'name' => __( 'Link Video', 'cmb' ),
				'desc' => __( 'Add link Video Youtube, Vimeo, Other. Ex: http://www.youtube.com/watch?v=tDvBwPzJ7dY or http://vimeo.com/47989207', 'cmb' ),
				'id'   => $prefix . 'portfolio_video',
				'type' => 'oembed',
			),
			array(
				'name'    => __( 'Layout Type', 'cmb' ),
				'desc'    => __( 'Select Layout type for portfolio <code>Default: One Column</code>', 'cmb' ),
				'id'      => $prefix . 'portfolio_layout',
				'type'    => 'select',
				'options' => array(
					array( 'name' => __( 'One Column', 'cmb' ), 'value' => 'one_columm', ),
                    array( 'name' => __( 'Two Column', 'cmb' ), 'value' => 'two_columm', ),
					array( 'name' => __( 'Full Width', 'cmb' ), 'value' => 'full_columm', ),
				),
			),
        ),				
	);   
	// Add other metaboxes as needed
	
	return $meta_boxes;
}

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( ! class_exists( 'cmb_Meta_Box' ) )
		require_once 'init.php';

}
