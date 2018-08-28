<?php
require_once('com_shortcode.php');
/**
 * Created by PhpStorm.
 * User: stephen
 */
add_action('acf/init', 'accordion_shortcode::acf_add_local_fields');

class accordion_shortcode extends com_shortcode {

	const name          = 'accordion'; // the text entered by the user (inside square brackets)
	const section_name  = 'accordion_settings'; //unique section id that organizes each setting
	const section_title = 'Accordion [accordion]'; // Section header for this shortcode's settings
	const taxonomy_shortcode_slug = 'page_category'; // Taxonomy name that contains the term for this shortcode. When checked, it will show the fields.

	public static function acf_add_local_fields(){
		// note: we need Advanced Custom Fields _Pro_ to use programmatic features such as this.
		//       Without the pro version, we have to manually add custom fields to each environment.
		// The 'acf/init' hook runs during the built-in wordpress 'init' hook, so adding an action
		//       to the 'acf/init' hook must be coded in a function run before init (ie adding an action
		//       while inside a function that is run in 'admin/init' is too late; the acf/init hook has already run).

		acf_add_local_field_group(
			array(
				'key'                   => 'ucf_accordion',
				'title'                 => 'Accordion',
				'fields'                => array(
					array(
						'key'        => 'field_accordion_repeater',
						'label'      => 'Accordion Repeater',
						'name'       => 'accordion_repeater',
						'type'       => 'repeater',
						'collapsed'  => 'field_accordion_title',
						'min'        => 1,
						'layout'     => 'block',
						'sub_fields' => array(
							array(
								'key'   => 'field_accordion_title',
								'label' => 'Title',
								'name'  => 'title',
								'type'  => 'text',
							),
							array(
								'key'           => 'field_accordion_description',
								'label'         => 'Description Paragraph',
								'name'          => 'description_paragraph',
								'type'          => 'wysiwyg',
							),
							array(
								'key'   => 'field_accordion_url',
								'label' => 'URL',
								'name'  => 'post_id',
								'type'  => 'post_object',
								'required' => 0,
								'post_type' => array (
									0 => 'page',
								),
								'allow_null' => 1,
								'allow_archives' => 0,
							),
							array(
								'key'   => 'field_accordion_url_title',
								'label' => 'URL Title',
								'name'  => 'post_manual_title',
								'type'  => 'text',
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
		add_action( 'init', array('accordion_shortcode', 'insert_term' ));

	}
	public static function insert_term() {
		wp_insert_term("Accordion", self::taxonomy_shortcode_slug, array(
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
		return $this->include_file_once_return_output( plugin_dir_path( __FILE__ ) . 'accordion.php' );
	}

} 