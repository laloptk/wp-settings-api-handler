<?php

/**
 * AddSettingsFields class
 *
 * @package WordPress
 * @subpackage Reusable Classes
 * @since 0.1.0
 */

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

		$form_partials_path = plugin_dir_path( dirname(__FILE__) ) . 'form-parts/';
		include( $form_partials_path . $args['type'] . '.php' );
		
	}

	private function register_setting($page, $field) {

		register_setting( $page, $field );

	}
}