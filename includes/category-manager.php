<?php 
	if ( ! defined( 'ABSPATH' ) ) {
		exit; // Exit if accessed directly.
	}
	/**
	 * Register new Elementor category.
	 *
	 */
	add_action( 'elementor/init', function () {
		$elementsManager = Elementor\Plugin::instance()->elements_manager;
		$elementsManager->add_category(
			'customaddons',
			array(
				'title' => 'Custom Widgets',
				1
			)
		);
	} );
?>