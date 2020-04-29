jQuery(function($) {
	$('.fl-node-<?php echo $id; ?> .fl-mimic-slider').slick();
	var target_slider_name = "<?php echo $settings->name_of_target_slider; ?>";
	console.log("name_of_target_slider=" + target_slider_name);
});
