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
  private $file_name = '/tmp/test';

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

  function getTemplate(){}

  function createFile(){
    $this->file_name = tempnam('/tmp', 'MALKO_');
    $handle = fopen($this->file_name, 'w');
    fwrite($handle, '# MALKO ERP FILE');
    fclose($handle);
  }

  function validFile(){
    return TRUE;
  }

  function processFile(){}

  function editFile($file_name){
    $cmd = '/usr/bin/editor '.escapeshellarg($file_name).' > `tty`';
    system($cmd, $result);
    return $result;
  }

  function submitData(){}

  function clearFile(){
    unlink($this->file_name);
  }

  function run(){
    $this->getOptions();
    $this->getTemplate();
    $this->createFile();
    do {
      $this->processFile();
      $this->editFile($this->file_name);
    } while (!$this->validFile());
    $this->submitData();
    $this->clearFile();
    exit(0);
  }
}

$malko = new Malko($argv);
$malko->run();

?>
