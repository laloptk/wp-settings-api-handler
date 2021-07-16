<?php

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

	private function register_setting($page, $field) {

		register_setting( $page, $field );

	}
}