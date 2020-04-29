# Mimic Slider
This module plugin for Beaver Builder uses Ken Wheeler's `slick` to create sliders that mimic and control each other.

![Module Demo](assets/module-demo.gif?raw=true)

## Usage

Create two Mimic Sliders, and give them descriptive names (e.g. `my_slider_A` and `my_slider_B`).

Then, set the `target_slider_name` attribute of the _controlling_ slider to the name you gave the other slider (e.g. enter `my_slider_B` in the `target_slider_name` input for `my_slider_A`). Then, events (e.g. `nextSlide()`, `prevSlide()`)on the _controlling_ slider (`my_slider_A`) will propogate to the targeted slider (`my_slider_B`).

## Installation

Create a zip containing all the files in this repository.

Upload the zip as a new Plugin on your Wordpress site, and Activate the new plugin.

Use the component in a Page Builder page!

# Resources

Jquery TwentyTwenty https://github.com/zurb/twentytwenty

Custom module developer guide http://kb.wpbeaverbuilder.com/article/124-custom-module-developer-guide

BeaverBuilder KB tutorial https://kb.wpbeaverbuilder.com/article/578-create-a-module-plugin-with-a-jquery-plugin
