<?php

class Model_Product extends Model {
  
  function get($id) {
    return DB::select('*')
      ->from('product')
      ->where('id', $id)
      ->execute();
  }

}

?>
