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
		$this->add_css( 'mimicslider-theme',       $this->url . 'css/slick-theme.css' );

	}

	/**
	 * @method render_slide
	 */
	public function render_slide( $slide ) {
		global $wp_embed;

		echo '<div class="content-wrap">';
		echo '<div class="content">';
		
		// if ( 'photo' == $slide->content_layout ) {
		// 	echo '<div class="content" style="background-image: url(' . $slide->slide_photo_src . ');">';
		// } else {
		// 	echo '<div class="content">';
		// }

		if ( ! empty( $slide->slide_photo_src ) ) {
			echo '<img style="width: 100%; height: 100%;" src="' . $slide->slide_photo_src . '" />';
		}

		if ( ! empty( $slide->title ) ) {
			echo '<h3 class="title">' . $slide->title . '</h3>';
		}
		if ( ! empty( $slide->text ) ) {
			echo '<div class="text">' . wpautop( $wp_embed->autoembed( $slide->text ) ) . '</div>';
		}

		echo '</div>';
		echo '</div>';
	}
}

/**
 * Register the module and its form settings.
 * We are using a very simple form here with only two options, photo_one and photo_two.
 */
FLBuilder::register_module('MimicSliderModule', array(
	'general' => array(
		'title' => __( 'General', 'fl-builder' ),
		'sections' => array(
			'general' => array(
				'title' => __( 'Slides', 'fl-builder' ),
				'fields' => array(
					'slider_name' => array(
						'type' => 'text',
						'label' => __( 'Slider Name', 'fl-builder' ),
						'help'  => __( 'A name for this Mimic Slider.', 'fl-builder' ),
						'default' => 'my_first_mimic_slider',
					),
					'name_of_target_slider' => array(
						'type' => 'text',
						'label' => __( 'Target Slider Name', 'fl-builder' ),
						'help'  => __( 'The name of the slider this Mimic Slider should control.', 'fl-builder' ),
						'default' => '',
					),
					'dots' => array(
						'type'    => 'select',
						'label'   => __( 'Show Dots?', 'fl-builder' ),
						'default' => 'false',
						'options' => array(
							'false' => __( 'No', 'fl-builder' ),
							'true'  => __( 'Yes', 'fl-builder' ),
						),
					),
				),
			),
		),
	),
	'slides'  => array(
		'title'    => __( 'Slides', 'fl-builder' ),
		'sections' => array(
			'general' => array(
				'title'  => '',
				'fields' => array(
					'slides' => array(
						'type'         => 'form',
						'label'        => __( 'Slide', 'fl-builder' ),
						'form'         => 'mimic_slider_slide',
						'preview_text' => 'label',
						'multiple'     => true,
					),
				),
			),
		),
	),
));

FLBuilder::register_settings_form('mimic_slider_slide', array(
	'title' => __( 'Slide Settings', 'fl-builder' ),
	'tabs'  => array(
		'general' => array( // Tab
			'title'    => __( 'General', 'fl-builder' ), // Tab title
			'sections' => array( // Tab Sections
				'general'    => array(
					'title'  => '',
					'fields' => array(
						'label' => array(
							'type'  => 'text',
							'label' => __( 'Slide Label', 'fl-builder' ),
							'help'  => __( 'A label to identify this slide on the Slides tab of the Content Slider settings.', 'fl-builder' ),
						),
					),
				),
				'content'    => array(
					'title'  => __( 'Content Layout', 'fl-builder' ),
					'fields' => array(
						'content_layout' => array(
							'type'    => 'select',
							'label'   => __( 'Type', 'fl-builder' ),
							'default' => 'text',
							'help'    => __( 'Insert content into your slide', 'fl-builder' ),
							'options' => array(
								'text'  => __( 'Text', 'fl-builder' ),
								'photo' => __( 'Photo', 'fl-builder' ),
							),
							'toggle'  => array(
								'text'  => array(
									'fields'   => array( 'title', 'text' ),
									'sections' => array( 'text' ),
								),
								'photo' => array(
									'fields'   => array( 'slide_photo' ),
									'sections' => array( ),
								),
							),
						),
						'slide_photo'       => array(
							'type'        => 'photo',
							'show_remove' => true,
							'label'       => __( 'Photo', 'fl-builder' ),
						),
						'title'          => array(
							'type'  => 'text',
							'label' => __( 'Heading', 'fl-builder' ),
						),
						'text'           => array(
							'type'          => 'editor',
							'media_buttons' => false,
							'wpautop'       => false,
							'rows'          => 16,
						),
					),
				),
			),
		),
	),
));
