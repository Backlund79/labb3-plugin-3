<?php
/**
* Plugin Name: Solid forms
* Author: Emil
*/
 require 'acf-field-data.php';
 require 'inc/submissions.php';
//function to generate thank you page.

function generate_thank_you()
{
    $post = array(
             'post_content'   =>  '<h2>Thank you for submitting your information</h2>',
             'post_title'     =>  'Thank you',
             'post_status'    =>  'publish' ,
             'post_type'      =>  'page',
             'post_author'    =>  1
   );
    $page_id = wp_insert_post($post);
    update_post_meta($page_id, 'thank_you', true);
}
register_activation_hook(__FILE__, 'generate_thank_you');

function find_thank_you_page()
{
    $args = array(
        'post_type' => 'page',
        'meta_key' => 'thank_you',
        'meta_value' => true
    );
    
    $the_query = new WP_Query($args);
    return $the_query->post->ID;
}
function delete_thank_you_page()
{
    wp_delete_post(find_thank_you_page(), true);
}
register_deactivation_hook(__FILE__, 'delete_thank_you_page');


//Generate shortcode form

function create_new_form()
{
    $obj_form = new Solid;
    $obj_form->set_solid_form_func(require 'inc/form.php');
    add_shortcode('solid_form', array($obj_form, 'get_solid_form_func' ));
}
add_action('init', 'create_new_form');
class Solid
{
    public $content = '';
    // public $name = $_POST['name'];
    // public $email = $_POST['email'];
    // public $message = $_POST['message'];
    
    public function set_solid_form_func($content)
    {
        $this->content = $content;
    }

    public function get_solid_form_func()
    {
        return $this->content;
    }
}
