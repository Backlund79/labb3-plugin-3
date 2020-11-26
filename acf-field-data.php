<?php

/**
* ACF Options page
*/

add_action('acf/init', 'solid_form');
    function solid_form()
    {
        acf_add_options_page('Solid Forms');
    }
    if (function_exists('acf_add_local_field_group')):

        acf_add_local_field_group(array(
            'key' => 'group_5fbfa4accf980',
            'title' => 'Solid Forms',
            'fields' => array(
                array(
                    'key' => 'field_5fbfa4c05d046',
                    'label' => 'Shortcode',
                    'name' => '',
                    'type' => 'message',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => 'Solid Forms will att a simple contact form to your page. The plugin will auto generate a "thank you page" on submit. You will see submitted forms in the Solid Forms posts in your admin menu. 
        Use Shortcode <h3><b> [solid_form] </b></h3> to add the form where you want it to show up.
        
        Thats it.',
                    'new_lines' => 'wpautop',
                    'esc_html' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'acf-options-solid-forms',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));
        
        endif;
