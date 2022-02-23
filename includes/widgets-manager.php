<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register new Elementor widgets.
 *
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_new_custom_widgets( $widgets_manager ) {

   //Overly Box
    require_once( __DIR__ . '/widgets/auto-slider-box.php' );

   $widgets_manager->register( new \Auto_Slider_Box_Widget() );

}
add_action( 'elementor/widgets/register', 'register_new_custom_widgets' );

?>