<?php

/**
 * SettingsPage class
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

	private $args;

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

		new \AddSettingsPage($this, array());

	}

	public function render_settings_sections() {

		new AddSettingsSections($this, array());

	}

	public function render_settings_fields() {

		new AddSettingsFields($this, array());

	}

}