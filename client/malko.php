<?php
  
define ('LIST_CONTROLLERS', '_/list_controllers');

abstract class M_Connection{
  abstract protected function get($request);
  abstract protected function post($request);
  abstract protected function put($request);
}

class M_HTTPConnection extends M_Connection{
  
  protected $default = array();

  function __construct($config){
    $this->config = array_merge($this->default, $config);
  }

  function _createUrl($request){
    $r = $request['controller'];
    return $r;
  }

  function get($request){
    $url = $this->_createUrl($request);
    return file_get_contents($url);
  }

  function post($request){
    //TODO: POST data
  }

  function put($request){
    //TODO: PUT data
  }

}

class Malko {

  private $connection = null;
  private $argv = array();
  private $controller = '';
  private $method = '';

  function __construct($argv){
    $this->argv = $argv;
    $this->getSettings();
    $this->connection = new M_HTTPConnection(array());
  }

  function getSettings(){
    //TODO: load settings from ~/.malkorc
  }

  function getOptions(){
    if (count($this->argv) == 1){
      $controller = 'LIST_CONTROLLERS';
    }
  }

  function run(){
    $this->getOptions();
  }
}

$malko = new Malko($argv);
$malko->run();

?>
