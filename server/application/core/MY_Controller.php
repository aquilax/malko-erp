<?php

class MY_Controller extends CI_Controller{

  protected $data = array();

  protected function render(){
    $this->output->set_content_type('application/json');
    $this->output->set_output(json_encode($this->data));
  }

}

?>
