<?php

class CliFacebook extends BaseFacebook
{
  protected static $kSupportedKeys =
    array('state', 'code', 'access_token', 'user_id');
  
  protected $persistentData = array();
  
  protected function clearAllPersistentData()
  {
    $this->persistentData = array();
  }

  protected function clearPersistentData($key)
  {
    if( !in_array($key, self::$kSupportedKeys) ) {
      $this->errorLogNS('Unsupported key passed to setPersistentData.');
      return;
    }
    
    unset($this->persistentData[$key]);
  }
  
  public function errorLogNS($msg)
  {
    self::errorLog($msg);
  }

  protected function getPersistentData($key, $default = false)
  {
    if( !in_array($key, self::$kSupportedKeys) ) {
      $this->errorLogNS('Unsupported key passed to setPersistentData.');
      return;
    }
    
    if( isset($this->persistentData[$key]) ) {
      return $this->persistentData[$key];
    } else {
      return $default;
    }
  }

  protected function setPersistentData($key, $value)
  {
    if( !in_array($key, self::$kSupportedKeys) ) {
      $this->errorLogNS('Unsupported key passed to setPersistentData.');
      return;
    }
    
    $this->persistentData[$key] = $value;
  }
}
