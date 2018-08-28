<?php
require_once('com_shortcode.php');
/**
 * Created by PhpStorm.
 * User: stephen
 */
add_action('acf/init', 'image_boxes_shortcode::acf_add_local_fields');

class image_boxes_shortcode extends com_shortcode {

	const name          = 'image_boxes'; // the text entered by the user (inside square brackets)
	const section_name  = 'image_boxes_settings'; //unique section id that organizes each setting
	const section_title = 'Image Boxes [image_boxes]'; // Section header for this shortcode's settings
	const taxonomy_shortcode_slug = 'page_category';    // Taxonomy name that contains the term for this shortcode.
														// When the taxonomy array of 'page_category' contains 'image_boxes'
														// (the 'name' of the shortcode), then the page editor will show options.

	public static function acf_add_local_fields(){
		// note: we need Advanced Custom Fields _Pro_ to use programmatic features such as this.
		//       Without the pro version, we have to manually add custom fields to each environment.
		// The 'acf/init' hook runs during the built-in wordpress 'init' hook, so adding an action
		//       to the 'acf/init' hook must be coded in a function run before init (ie adding an action
		//       while inside a function that is run in 'admin/init' is too late; the acf/init hook has already run).

		acf_add_local_field_group(
			array(
				'key'                   => 'ucf_image_boxes',
				'title'                 => 'Image Boxes',
				'fields'                => array(
					array(
						'key'        => 'field_image_box_repeater',
						'label'      => 'Image Box Repeater',
						'name'       => 'image_box_repeater',
						'type'       => 'repeater',
						'collapsed'  => 'field_box_title',
						'min'        => 1,
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'   => 'field_box_title',
								'label' => 'Box Title',
								'name'  => 'box_title',
								'type'  => 'text',
							),
							array(
								'key'   => 'field_box_url',
								'label' => 'Box URL',
								'name'  => 'box_url',
								'type'  => 'url',
								'required' => 0,
							),
							array(
								'key'           => 'field_box_image',
								'label'         => 'Box Image',
								'name'          => 'box_image',
								'type'          => 'image',
								'return_format' => 'id',
								'preview_size'  => 'thumbnail',
								'library'       => 'all',
							),
						),
					),
				),
				'location'              => array(
					array(
						array(
							'param'    => 'post_taxonomy',
							'operator' => '==',
							'value'    => self::taxonomy_shortcode_slug . ':' . self::name,
						),
					),
				),
				'menu_order'            => 0,
				'position'              => 'normal',
				'style'                 => 'default',
				'label_placement'       => 'top',
				'instruction_placement' => 'label',
				'active'                => 1,
			)
		);
		add_action( 'init', array('image_boxes_shortcode', 'insert_term' ));

	}
	public static function insert_term() {
		wp_insert_term("Image Boxes", self::taxonomy_shortcode_slug, array(
			'description' => self::section_title,
			'slug'        => self::name
		) );
	}

	public function get_name() {
		return self::name;
	}

	public function get_css() {
		return '';
	}

	public function get_section_name() {
		return self::section_name;
	}

	public function get_section_title() {
		return self::section_title;
	}

	public function add_settings() {
		$this->add_setting_custom_fields_group();
	}

	public function replacement( $attrs = null ) {
		return $this->include_file_once_return_output( plugin_dir_path( __FILE__ ) . 'image-boxes.php' );
	}

} 