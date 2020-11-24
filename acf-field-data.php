<?php

/**
* ACF Options page
*/

add_action('acf/init', 'solid_options');
    function solid_options()
    {
        acf_add_options_page('Solid forms');
    }
