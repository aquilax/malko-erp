<?php

class Controller_Rpc_Product extends Controller_Rest {

  public function get_index(){
    $id = Input::get('id');
    $data = \Model_Product::get($id);
    if ($data){
      $this->response(array(
        'success' => TRUE,
        'data' => $data->as_array(),
      ));
    } else {
      $this->response(array(
        'success' => FALSE,
      ));
    }
  }
}
