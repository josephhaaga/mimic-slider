<?php
/**
 * Plugin Name: Beaver Builder Mimic Slider Module
 * Plugin URI: https://github.com/josephhaaga/mimic-slider
 * Description: A plugin to create synchronized sliders.
 * Version: 1.0
 * Author: Joseph Haaga
 * Author URI: https://www.joehaaga.xyz
 */
class MimicSliderPlugin {

	public static function init() {

		if( class_exists( 'FLBuilder' ) ) {
			require_once 'modules/mimicslider/mimicslider.php';
		}
	}
}
add_action( 'init', array( 'MimicSliderPlugin', 'init' ) );
