# Reusable Classes

**Contributors:**

    1. Eduardo Sanchez Hidalgo

**Tags:** settings, options

**Requires at least:** 4.5

**Tested up to:** 5.7.2

**Requires PHP:** 7.2

**Stable tag:** 0.1.0

**License:** GPLv2 or later

**License URI:** https://www.gnu.org/licenses/gpl-2.0.html

This plugin gives you a PHP class that makes it easy for you to create option pages in the WP Admin, it is intended for developers, so, it does not have a graphic interface. Installing the plugin will make the PHP class available for you in WordPress, but you can also just copy the `options-api` folder, and paste it in your child theme or your own plugin, and include the files to make the class available.

## Description

With this plugin you only have to build an array with the page options, sections and fields info, pass it to a class and you will have your options page.

**Note:** for now, only input and textarea fields are available, more to come, but you can include more fields placing the html with its respective variables in the `form-parts` folder, in the same way input and textarea are included. The plugin uses file names to choose between fields, so, if you include a `checkbox.php` file into the `form-parts` folder, you should make sure you use "checkbox" in the array's "type" option, to render the HTML you placed inside the file.

The array will look like this:

```
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
```

Once you formed your array, you can make this plugin work by calling the following function in your functions.php and passing the array as argument:

```
add_settings_page($args);
```

## Installation

The plugin works now, but it is still in the making, that why this part of the documentation has placeholder text.

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

## TO DO

1. ~~Separate classes into its own files.~~
1. Namespace all classes files
1. Sanitize input and output
1. Escape attributes, urls and HTML (when necessary).
1. Make the plugin translatable
1. ~~Find a way to make it easier to use (less verbose to render the settings page, maybe a custom action).~~
1. Add actions and filters where pertinent (e.g. To filter the switch function and add more fields)
1. Add more field types
