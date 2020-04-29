<?php
/**
 * This is the module code for the Mimic Slider Plugin.
 *
 * @class MimicSliderModule
 */
class MimicSliderModule extends FLBuilderModule {

	/**
	 * The module construct, we need to pass some basic info here.
	 */
	public function __construct() {

		parent::__construct(array(
			'name'            => __( 'Mimic Slider', 'fl-builder' ),
			'description'     => __( 'A basic slider module using Slick.', 'fl-builder' ),
			'category'        => __( 'Example Modules', 'fl-builder' ),
			'dir'             => __DIR__,
			'partial_refresh' => true,
			'url'             => plugins_url( '', __FILE__ ),
		));

		/**
		 * Now we include our js and css files using the module classes built in methods.
		 */
		$this->add_js( 'jquery-mimicslider', $this->url . 'js/slick.min.js', array( 'jquery' ) );
		$this->add_css( 'mimicslider',       $this->url . 'css/slick.css' );
	}
}

/**
 * Register the module and its form settings.
 * We are using a very simple form here with only two options, photo_one and photo_two.
 */
FLBuilder::register_module( 'MimicSliderModule', array(
	'general' => array(
		'title' => __( 'General', 'fl-builder' ),
		'sections' => array(
			'general' => array(
				'title' => __( 'Section Title', 'fl-builder' ),
				'fields' => array(
					'photo_one' => array(
						'type' => 'photo',
						'label' => __( 'Photo One', 'fl-builder' ),
						'preview' => array(
							'type' => 'none',
						),
					),
					'photo_two' => array(
						'type' => 'photo',
						'label' => __( 'Photo Two', 'fl-builder' ),
						'preview' => array(
							'type' => 'none',
						),
					),
				),
			),
		),
	),
));
