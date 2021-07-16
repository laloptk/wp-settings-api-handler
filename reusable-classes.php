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

include( __DIR__ . '/inc/options-api/classes/classesSettings.php');

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

// This is a wrapper for the concrete class

function add_settings_page($args) {
    new SettingsPage($args);
}

add_settings_page($args);