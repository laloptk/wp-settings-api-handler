<?php

class FieldFiles {
	
	public function __construct() {
		$this->fields_folder = './fields-html/';
	}

	private function get_file_name($filetype) {
		$file_name = '';

		switch($filetype) {
			case 'text-input':
				return 'text-input.php';
			default:
				return '';
		}
	}

	/*private function get_html_from_file($filetype) {
		ob_start();
		$this->set_file_path('text-input.php');
		$file_path = $this->file_path;
		include( __DIR__ . $file_path );
		$fieldHTML = ob_get_contents();
		ob_end_clean();
		return $fieldHTML;
	}*/

	public function getFilePath($filetype) {
		$filename = $this->get_file_name($filetype);
		return __DIR__ . $this->fields_folder . $filename;
	}
}

