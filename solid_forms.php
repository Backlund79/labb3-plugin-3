<?php
/**
* Plugin Name: Solid forms
* Author: Emil
*/
 require 'inc/acf-field-data.php';
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
    
    public function set_solid_form_func($content)
    {
        $this->content = $content;
    }

    public function get_solid_form_func()
    {
        return $this->content;
    }
}
function submit_form_to_post_submission()
{
    if ('POST' == $_SERVER['REQUEST_METHOD'] && !empty($_POST['action'])) {

    // Do some minor form validation to make sure there is content
        if (isset($_POST['solid-name'])) {
            $solid_name =  sanitize_text_field($_POST['solid-name']);
        } else {
            echo 'Please enter a title';
        }
        if (isset($_POST['solid-email'])) {
            $solid_email = sanitize_email($_POST['solid-email']);
        } else {
            echo 'Please enter e-mail';
        }
        if (isset($_POST['solid-message'])) {
            $solid_message = sanitize_textarea_field($_POST['solid-message']);
        } else {
            echo 'Please enter a message';
        }


        $new_submission = array(
        'post_title'    => $solid_name,
        'post_status'   => 'publish',
        'post_type'     => 'submissions'
    );
    
        $submission_id = wp_insert_post($new_submission);

        update_post_meta($submission_id, 'user_name', $solid_name);
        update_post_meta($submission_id, 'user_email', $solid_email);
        update_post_meta($submission_id, 'user_message', $solid_message);
    }
    wp_redirect(get_permalink(find_thank_you_page()));
    die;
}
add_action('wp_ajax_user_submission', 'submit_form_to_post_submission');
add_action('wp_ajax_nopriv_user_submission', 'submit_form_to_post_submission');
