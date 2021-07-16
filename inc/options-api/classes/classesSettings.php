<?php

/**
 * Settings classes
 *
 * @package WordPress
 * @subpackage Customize
 * @since 3.4.0
 */

interface Settings {

	public function get_args(object $sender);

}

/**
 * SettingPage is the concrete class that handles the data and the interaction with the other classes.
 *
 *
 * @since 0.1.0
 */

class SettingsPage implements Settings {
	/**
	 *  Array of page settings argument
	 *
	 * @since 0.1.0
	 * @var Array
	 */

	public $args;

	public function __construct(Array $args) {
		
		$this->args = $args;
		
		$this->page_slug = $args['page_slug'];

		add_action('admin_menu', array($this, 'render_settings_page' ));

		add_action('admin_init', array($this, 'render_settings_sections' ));

		add_action('admin_init', array($this, 'render_settings_fields' ));

	}

	public function get_args(object $sender) {
		
		if($sender instanceof AddSettingsPage) {
			
			$this->page = array(
				'page_title' => $this->args['page_title'], 
				'menu_title' => $this->args['menu_title'],
				'capability' => $this->args['capability'], 
			);

			$sender->add_page();

		}

		if($sender instanceof AddSettingsSections) {
			
			foreach($this->args['sections'] as $section_id => $section_args) {
				$sender->add_section($section_id, $section_args['title']);
			}

		}

		if($sender instanceof AddSettingsFields) {
			foreach($this->args['sections'] as $section_id => $section_args ) {
				
				foreach( $section_args['fields'] as $field_id => $field ) {
					$field['section_id'] = $section_id;
					$sender->add_field( $field_id, $field );
				}

			}

		}

	}

	public function render_settings_page() {

		new AddSettingsPage($this, array());

	}

	public function render_settings_sections() {

		new AddSettingsSections($this, array());

	}

	public function render_settings_fields() {

		new AddSettingsFields($this, array());

	}

}

/**
 * ConnectWithSettingsPage is the base class that connects all the classes with the concrete class
 *
 *
 * @since 0.1.0
 */

class ConnectWithSettingsPage {
	
	public $settings;

	public $args;
	
	public function __construct(SettingsPage $settings = null, Array $args = array()) {		
		
		$this->settings = $settings;		
		$this->settings->get_args($this);

	}

}

class AddSettingsPage extends ConnectWithSettingsPage {
	
	public function add_page() {

		add_menu_page(
			$this->settings->page['page_title'], 
			$this->settings->page['menu_title'],
			$this->settings->page['capability'], 
			$this->settings->page_slug,
			array($this, 'callback')
		);

	}

	public function callback() {
		
		echo 
			'<div class="wrap">
				 <h1>' . $this->settings->page['page_title'] . '</h1>
				<form method="post" action="options.php">';
					settings_fields( $this->settings->page_slug );
					do_settings_sections( $this->settings->page_slug );
					submit_button();
		echo	'</form>
			</div>';

	}

}

class AddSettingsSections extends ConnectWithSettingsPage {

	public function add_section($section_id, $section_title) {
		
		add_settings_section( 
			$section_id,
			$section_title,
			array($this, 'callback'),
			$this->settings->page_slug				
		);

	}	

	public function callback() {
		//echo "<h2>" . $this->section_title . "</h2>";
	}

}

class AddSettingsFields extends ConnectWithSettingsPage {
	
	public function add_field( $field_id, $field_args ) {
		
			$this->register_setting($this->settings->page_slug, $field_id);

			$callback_args = array(
				'field_id' => $field_id,
				'type' => $field_args['type'],
				'value' => get_option($field_id)
			);

			add_settings_field( 
				$field_id, 
				$field_args['title'], 
				array($this, 'callback'), 
				$this->settings->page_slug, 
				$field_args['section_id'],
				$callback_args
			);

	}

	public function callback($args) {

		switch($args['type']) {

			case 'text':
				echo '<input type="text" name="' . esc_attr($args['field_id']) . '" id="' . esc_attr($args['fie ld_id']) . '" value="' . esc_attr($args['value'] ? $args['value'] : '') . '" />';
				break;

			case 'textarea': {
				echo '<textarea name="' . esc_attr($args['field_id']) . '" id="' . esc_attr($args['field_id']) . '" >' . esc_html($args['value'] ? $args['value'] : '') . '</textarea>';
				break;

			}

		}

	}

	public function register_setting($page, $field) {

		register_setting( $page, $field );

	}
}