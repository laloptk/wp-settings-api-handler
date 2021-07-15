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

		//This can be better, check it
		$this->args = $args;
		$this->sections = array();
		$this->fields = array();

		if(isset($this->args['sections']) && !empty($this->args['sections'])) {
			foreach($this->args['sections'] as $section_key => $section) {
				
				$this->sections[$section_key] = $section;
				$this->sections[$section_key]['page_slug'] = $this->args['page_slug'];

				foreach($section['fields'] as $field_key => $field) {
					$this->fields[$field_key] = $field;
					$this->fields[$field_key]['section_id'] = $section_key;
					$this->fields[$field_key]['page_slug'] = $this->args['page_slug']; // check a better way to manage this
				}
			}

			unset($this->args['sections']);

		}
	}

	public function get_args(object $sender) {
		if($sender instanceof AddSettingsPage) {
			$this->args = $sender->settings->args;
			$sender->add_page();
		}

		if($sender instanceof AddSettingsSections) {
			$this->args = $this->settings->sections;
			$sender->add_sections();
		}

		if($sender instanceof AddSettingsFields) {
			$this->args = $this->settings->fields;
			$sender->add_fields();
		}

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
	
	public function __construct(SettingsPage $settings = null, Array $args) {
		
		$this->settings = $settings;		
		$this->args = $this->settings->get_args($this);

	}

	//abstract public function callback();
}

class AddSettingsPage extends ConnectWithSettingsPage {
	public function add_page() {
		
		add_menu_page(
			$this->settings->args['page_title'], 
			$this->settings->args['menu_title'],
			$this->settings->args['capability'], 
			$this->settings->args['page_slug'],
			array($this, 'callback')
		);

	}

	public function callback() {
		
		echo 
			'<div class="wrap">
				 <h1>' . $this->settings->args['page_title'] . '</h1>
				<form method="post" action="options.php">';
					settings_fields( $this->settings->args['page_slug'] );
					do_settings_sections( $this->settings->args['page_slug'] );
					submit_button();
		echo	'</form>
			</div>';

	}	
}

class AddSettingsSections extends ConnectWithSettingsPage {

	public function add_sections() {
		foreach($this->settings->sections as $section_key => $section) {
			$this->section_title = $section['title'];
			add_settings_section( 
				$section_key,
				$this->section_title,
				array($this, 'callback'),
				$section['page_slug']				
			);
		}
	}	

	public function callback() {
		//echo "<h2>" . $this->section_title . "</h2>";
	}

}

class AddSettingsFields extends ConnectWithSettingsPage {
	
	public function add_fields() {

		foreach($this->settings->fields as $field_id => $field) {
			$this->register_settings($field['page_slug'], $field_id);

			$callback_args = array(
				'field_id' => $field_id,
				'type' => $field['type'],
				'value' => get_option($field_id)
			);

			add_settings_field( 
				$field_id, 
				$field['title'], 
				array($this, 'callback'), 
				$field['page_slug'], 
				$field['section_id'],
				$callback_args
			);		
		}

	}

	public function callback($args) {

		switch($args['type']) {
			case 'text':
				echo '<input type="text" name="' . $args['field_id'] . '" id="' . $args['fie ld_id'] . '" value="' . esc_attr($args['value'] ? $args['value'] : '') . '" />';
				break;
			case 'textarea': {
				echo '<textarea name="' . $args['field_id'] . '" id="' . $args['field_id'] . '" >' . esc_html($args['value'] ? $args['value'] : '') . '</textarea>';
				break;
			}
		}

	}

	public function register_settings($page, $field) {

		register_setting( $page, $field );

	}
}



add_action( 'admin_menu', 'add_page' );


function add_page($render) {
	$args = array(
		'page_title' => "This is a cool title", 
		'menu_title' => "Test",
		'capability' => "manage_options", 
		'page_slug'  => "lalo_settings",
		'sections'   => array(
			'eg_section_1' => array(
				'title' => 'This is the first example title',
				'fields' => array(
					'input_text_2' => array(
						'title' => 'First field title 2',
						'label' => 'label 1',
						'class' => 'class',
						'type' => 'text'
					)
				)
			),
			'eg_section_2' => array(
				'title' => 'This is the second example title',
				'fields' => array(
					'input_text_1' => array( 
						'title' => 'First field title',
						'label' => 'label 2',
						'class' => 'class',
						'type' => 'text'
					),
					'textarea_id' => array(
						'title' => 'First textarea',
						'label' => 'label 2',
						'class' => 'class',
						'type' => 'textarea'
					)
				)
			)
		)
	);


	$renderPage = new SettingsPage($args);	
	$addOptionsPage = new AddSettingsPage($renderPage, array());
	
}

add_action('admin_init', 'add_everything');
function add_everything() {
	$args = array(
		'page_title' => "This is a cool title", 
		'menu_title' => "Test",
		'capability' => "manage_options", 
		'page_slug'  => "lalo_settings",
		'sections'   => array(
			'eg_section_1' => array(
				'title' => 'This is the first example title',
				'fields' => array(
					'input_text_2' => array(
						'title' => 'First field title 2',
						'label' => 'label 1',
						'class' => 'class',
						'type' => 'text'
					)
				)
			),
			'eg_section_2' => array(
				'title' => 'This is the second example title',
				'fields' => array(
					'input_text_1' => array( 
						'title' => 'First field title',
						'label' => 'label 2',
						'class' => 'class',
						'type' => 'text'
					),
					'textarea_id' => array(
						'title' => 'First textarea',
						'label' => 'label 2',
						'class' => 'class',
						'type' => 'textarea'
					)
				)
			)
		)
	);


	$renderPage = new SettingsPage($args);
	$addSettingsSections = new AddSettingsSections($renderPage, array());
	$addSettingsFields = new AddSettingsFields($renderPage, array());
}

