<?php

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