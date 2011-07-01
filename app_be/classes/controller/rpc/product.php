<?php

class Controller_Rpc_Product extends Controller_Rest {
  
  protected $data = array();


  public function render($data, $success = TRUE){
    $res = array();
    if ($data){
      $res['success'] = $success;
      foreach ($data as $name => $rows){
        $res[$name] = $rows;
      }
    } else {
      $res['success'] = FALSE;
    }
    $this->response($res);
  }


  public function get_index(){
    $id = Input::get('id');
    $this->data['data'] = \Model_Product::get($id);
    $this->render($this->data, count($this->data['data']) > 0);
  }

  public function get_list(){
    $config = array();
    $config['dir'] = Input::get('dir', 'ASC');
    $config['limit'] = Input::get('limit', 50);
    $config['page'] = Input::get('page', 1);
    $config['sort'] = Input::get('sort', 'id');
    $config['start'] = Input::get('start', 0);
    $this->data = \Model_Product::getList($config);
    $this->render($this->data, count($this->data['data']) > 0);
  }

}
