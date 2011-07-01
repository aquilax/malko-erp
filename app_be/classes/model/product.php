<?php

class Model_Product extends Model {
  
  function get($id) {
    return DB::select('*')
      ->from('product')
      ->where('id', $id)
      ->where('status_id', '>', 0)
      ->execute()
      ->as_array();
  }

  function getList($config){
    $res = array();
    $res['data']  = DB::select('*')
      ->from('product')
      ->where('status_id', '>', 0)
      ->order_by($config['sort'])
      ->limit($config['limit'])
      ->offset($config['start'])
      ->execute()
      ->as_array();
    $res['totalCount'] = DB::count_records('product');
    return $res;
  }

}

?>
