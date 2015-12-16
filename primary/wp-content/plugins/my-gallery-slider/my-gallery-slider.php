<?php
/*
Plugin Name: My Gallery Slider for Primary Technology
Description: This plugin show images like slider
Version: 1.0
Author: Dmytro Stelmakh
*/

/*  Copyright YEAR  PLUGIN_AUTHOR_NAME  (email : dmytriistelmakh@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// Include the CSS and JavaScript (JOuery)
include_once('my-gallery-slider-cjs.php');
// Include the plugin
include_once('my-gallery-slider-script.php');



// Hook the plugin
add_filter('post_gallery', 'my_gallery_slider', 10, 2);




