=== Scribol.com ===
Contributors: tybulewicz
Tags: scribol
Requires at least: 2.8.0
Tested up to: 3.4
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Scribol.com integration, widget and template tag

== Description ==

This plugin simplifies integration of Scribol.com with WordPress based blogs.

**Information:** We collect information about impressions and CTR's for our widgets stories.
As our partner you cen see them in your Scriblo.com account at [My Stats](http://u.scribol.com/my-stats) section.

== Installation ==

1. Upload `scribol` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

= Where can I find `Widget id` =

You can find it in your Scribol.com account at Widget ([Module](http://u.scribol.com/my-feeds)) edit screen.

== Changelog ==

= 1.0 =
* Initial version.

== Widget usage ==

1. Place Scribol Widget on desired position
1. Configure placed widget (set id, width and height)

== Template tag usage ==

1. insert code in template file:
`<?php scribol_widget($widget_id, $width, $height); ?>`