jQuery(function($) {
	
	const thisSliderName = "<?php echo $settings->slider_name; ?>";
	if (thisSliderName.length < 1) {
		console.warn("Mimic Slider at .fl-node-<?php echo $id; ?> has no slider_name!" + 
		"Please visit the module settings in Page Builder and add a name.");
	}
	
	let controlsAnotherSlider = false;
	const targetSliderName = "<?php echo $settings->name_of_target_slider; ?>";
	if(targetSliderName.length < 1) {
		console.log("Mimic Slider at .fl-node-<?php echo $id; ?> does not control another Mimic Slider.");
	} else {
		controlsAnotherSlider = true;
	}

	// TODO could this be a const?
	let thisSlider = $('.fl-node-<?php echo $id; ?> .fl-mimic-slider').slick({
		// config go skrra
	});

	if (controlsAnotherSlider) {
		// TODO could this go after the window.mimicSliders registration?
		const targetSlider = window.mimicSliders[targetSliderName]
		thisSlider.on('beforeChange', function(event, slick, currentSlide, nextSlide){
			targetSlider.slickGoTo(nextSlide);
		});
	}

	// Register this slider so other Mimic Sliders can see it.
	if (window.mimicSliders === undefined) {
		window.mimicSliders = {};
	}
	window.mimicSliders[thisSliderName] = thisSlider;

});
