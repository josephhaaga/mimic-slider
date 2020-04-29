<?php

/**
 * This file should be used to render each module instance.
 * You have access to two variables in this file:
 *
 * $module An instance of your module class.
 * $settings The module's settings.
 *
 */

?>
<div class="fl-mimic-slider mimicslider-container">
    <?php
		for ( $i = 0; $i < count( $settings->slides ); $i++ ) :
			if ( ! is_object( $settings->slides[ $i ] ) ) {
				continue;
			} else {
				$slide = $settings->slides[ $i ];
			}
			?>
        <div>
            <?php $module->render_slide( $slide ); ?>
        </div>
    <?php
        endfor;
    ?>
</div>
