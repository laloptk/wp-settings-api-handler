<?php

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