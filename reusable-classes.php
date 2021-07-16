<?php
/**
 * Plugin Name:     Reusable Classes
 * Plugin URI:      
 * Description:     
 * Author:          Eduardo Sánchez Hidalgo
 * Author URI:      
 * Text Domain:     reusable-classes
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Reusable_Classes
 */

include(__DIR__ . '/inc/options-api/classes/classSettingsPage.php');
include(__DIR__ . '/inc/options-api/classes/classConnectWithSettingsPage.php');
include(__DIR__ . '/inc/options-api/classes/classAddSettingsPage.php');
include(__DIR__ . '/inc/options-api/classes/classAddSettingsSections.php');
include(__DIR__ . '/inc/options-api/classes/classAddSettingsFields.php');

/*$args = array(
    'page_title' => "This is a cool title",
    'menu_title' => "Test",
    'capability' => "manage_options", // Required
    'page_slug'  => "lalo_settings", // Required
    'sections'   => array(
        'eg_section_1' => array(
            //'title' => 'This is the first example title',
            'fields' => array(
                'input_text_2' => array( // Required field name
                    'title' => 'First field title 2', // Required
                    'label' => 'label 1',
                    'class' => 'class',
                    'type' => 'text' //Required
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
);*/

// This is a wrapper for the main class

function add_settings_page($args) {
    new SettingsPage($args);
}

//add_settings_page($args);