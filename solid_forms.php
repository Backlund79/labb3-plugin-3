<?php
/**
* Plugin Name: Solid forms
* Author: Emil
*/

require 'acf-field-data.php';
require 'inc/form.php';

$obj_form = new Solid;


add__shortcode('solid_form', array($obj_form, 'set_solid_form_func' ));
class Solid
{
    public $content = '';
    public $name = $_POST['name'];
    public $email = $_POST['email'];
    public $message = $_POST['message'];
    
    public function set_solid_form_func($content){
        $this-content = $content;
    }

    public function get_solid_form_func(){
        return $this->content; 
    }
}
