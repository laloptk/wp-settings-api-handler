# Reusable Classes #
**Contributors:** 

    1. Eduardo Sanchez Hidalgo

**Donate link:** https://example.com/ 

**Tags:** settings, options

**Requires at least:** 4.5  

**Tested up to:** 5.7.2  

**Requires PHP:** 7.2

**Stable tag:** 0.1.0  

**License:** GPLv2 or later  

**License URI:** https://www.gnu.org/licenses/gpl-2.0.html  

This plugin makes it easy to create option pages in WordPress.

## Description ##

As WordPress mentions, the Settings API is a mess. It is convoluted to connect everything in order to build an options page.
With this plugin you only have to build an array with the page options, sections and fields info, pass it to a class and you will have your options page.

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

## Installation ##

The plugin works now, but it is still in the making, that why this part of the documentation has placeholder text.

This section describes how to install the plugin and get it working.

e.g.

1. Upload `plugin-name.php` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Place `<?php do_action('plugin_name_hook'); ?>` in your templates

## TO DO ##

1. Separate classes into its own files.
1. Namespace all classes files
1. Sanitize input and output
1. Escape attributes, urls and HTML (when necessary).
1. Make the plugin translatable
1. Find a way to make it easier to use (less verbose to render the settings page, maybe a custom action).
1. Add actions and filters where pertinent (e.g. To filter the switch function and add more fields)

## Screenshots ##

### 1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from ###
![This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from](http://ps.w.org/reusable-classes/assets/screenshot-1.png)

the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
### 2. This is the second screen shot ###
![This is the second screen shot](http://ps.w.org/reusable-classes/assets/screenshot-2.png)


## Changelog ##

### 1.0 ###
* A change since the previous version.
* Another change.

### 0.5 ###
* List versions from most recent at top to oldest at bottom.

## Upgrade Notice ##

### 1.0 ###
Upgrade notices describe the reason a user should upgrade.  No more than 300 characters.

### 0.5 ###
This version fixes a security related bug.  Upgrade immediately.

## Arbitrary section ##

You may provide arbitrary sections, in the same format as the ones above.  This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation."  Arbitrary sections will be shown below the built-in sections outlined above.

## A brief Markdown Example ##

Ordered list:

1. Some feature
1. Another feature
1. Something else about the plugin

Unordered list:

* something
* something else
* third thing

Here's a link to [WordPress](https://wordpress.org/ "Your favorite software") and one to [Markdown's Syntax Documentation][markdown syntax].
Titles are optional, naturally.

[markdown syntax]: https://daringfireball.net/projects/markdown/syntax
            "Markdown is what the parser uses to process much of the readme file"

Markdown uses email style notation for blockquotes and I've been told:
> Asterisks for *emphasis*. Double it up  for **strong**.

`<?php code(); // goes in backticks ?>`
