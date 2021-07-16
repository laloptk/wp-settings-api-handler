<?php

/**
 * ConnectWithSettingsPage is the base class that connects all the classes with the concrete class
 *
 *
 * @since 0.1.0
 */

class ConnectWithSettingsPage {
	
	protected $settings;

	private $args;
	
	public function __construct(SettingsPage $settings = null, Array $args = array()) {		
		
		$this->settings = $settings;		
		$this->settings->get_args($this);

	}

}