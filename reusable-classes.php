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

/*$args = array(
    'page_title' => "This is a cool title", 
    'menu_title' => "Test",
    'capability' => "manage_options", 
    'page_slug'  => "lalos_options",
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

function add_settings_page($args) { 
    $settingsPage = new SettingsPage($args); 
    add_action('admin_menu', function() use ($args, $settingsPage) {
        new AddSettingsPage($settingsPage, array());
    });
}

function add_settings_page_sections_and_fields($args) {        
    $settingsPage = new SettingsPage($args);
    add_action('admin_init', function() use ($args, $settingsPage) {              
        new AddSettingsSections($settingsPage, array());
        new AddSettingsFields($settingsPage, array());
    });

}

add_action('add_settings_page', 'add_settings_page', 2, 1);
add_action('add_settings_page', 'add_settings_page_sections_and_fields', 10, 1);

do_action('add_settings_page');
*/

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

$settingsPage = new SettingsPage($args);

//function initialize_settings_page($args) {
    
    /*add_action('admin_menu', function() use ($args) {    
        $settingsPage = new SettingsPage($args);    
        new AddSettingsPage($settingsPage, array());
    });

    add_action('admin_init', function() use ($args) { 
        $settingsPage = new SettingsPage($args);       
        new AddSettingsSections($settingsPage, array());
        new AddSettingsFields($settingsPage, array());
    });*/
//}

//initialize_settings_page($args);

