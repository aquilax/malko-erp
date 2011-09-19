<?php

class Client extends MY_Controller{

  function add(){
    $this->data = array(
      'f' => array(
        array(
          'label' => 'Name',
          'value' => '',
          'hint' => 'Client name',
          'validation' => 'required|max_length[100]'
        )
      )
    );
    $this->render();
  }

}

?>
