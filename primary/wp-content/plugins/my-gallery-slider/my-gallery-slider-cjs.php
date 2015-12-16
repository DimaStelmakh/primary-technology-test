<?php

class my_slider
{
    public function my_slider()
    {
        if (!is_admin()) {
            // Header styles
            add_action('wp_head', array('my_slider', 'header'));
        }
    }

    public function header()
    {
        // Styles
        wp_enqueue_style('owl-carousel-css', my_slider::get_directory_of_plugin() . "/owl.carousel.2.0.0-beta.2.4/assets/owl.carousel.css");
        wp_enqueue_style('owl-theme-green-css', my_slider::get_directory_of_plugin() . "/owl.carousel.2.0.0-beta.2.4/assets/owl.theme.green.css", array('owl-carousel-css'));
        //owl.theme.green.css"

        // Scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('owl-carousel-min-js', my_slider::get_directory_of_plugin() . "/owl.carousel.2.0.0-beta.2.4/owl.carousel.min.js", array('jquery'));
        wp_enqueue_script('my-gallery-slider-jquery', my_slider::get_directory_of_plugin() . '/my-gallery-slider.js', array('jquery', 'owl-carousel-min-js'));
    }


    public static function get_directory_of_plugin()
    {
        return WP_PLUGIN_URL . '/my-gallery-slider';
    }
}

$my_slider = new my_slider();