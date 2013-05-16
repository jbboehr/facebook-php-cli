<?php

class PublicPersistentDataCliFacebook extends CliFacebook
{
  public $errors = array();
  
  public function errorLogNS($msg)
  {
    array_unshift($this->errors, $msg);
  }
  
  public function errorLogNSOriginal($msg)
  {
    return parent::errorLogNS($msg);
  }
  
  public function publicClearAllPersistentData()
  {
    return $this->clearAllPersistentData();
  }

  public function publicClearPersistentData($key)
  {
    return $this->clearPersistentData($key);
  }

  public function publicGetPersistentData($key, $default = false)
  {
    return $this->getPersistentData($key, $default);
  }

  public function publicSetPersistentData($key, $value)
  {
    return $this->setPersistentData($key, $value);
  }
  
  public function publicGetAllPersistentData()
  {
    return $this->persistentData;
  }
}

class FacebookPHPSDKCliTestCase extends PHPUnit_Framework_TestCase
{
  const APP_ID = '117743971608120';
  const SECRET = '9c8ea2071859659bea1246d33a9207cf';
  
  public function testClearAllPersistentData()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $facebook->publicSetPersistentData('user_id', '1');
    $this->assertEquals(array('user_id' => '1'), $facebook->publicGetAllPersistentData());
    $facebook->publicClearAllPersistentData();
    $this->assertEquals(array(), $facebook->publicGetAllPersistentData());
  }
  
  public function testClearPersistentData()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $facebook->publicSetPersistentData('user_id', '2');
    $facebook->publicSetPersistentData('code', '3');
    $this->assertEquals(array('user_id' => '2', 'code' => '3'), $facebook->publicGetAllPersistentData());
    $facebook->publicClearPersistentData('user_id');
    $this->assertEquals(array('code' => '3'), $facebook->publicGetAllPersistentData());
  }
  
  public function testClearPersistentData_IgnoresInvalidKeys()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $this->assertEmpty($facebook->errors);
    $facebook->publicClearPersistentData('invalid_key');
    $this->assertNotEmpty($facebook->errors);
  }
  
  public function testErrorLogNS()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    $facebook->errorLogNSOriginal('testErr');
  }
  
  public function testGetPersistentData()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $facebook->publicSetPersistentData('user_id', '4');
    $this->assertEquals('4', $facebook->publicGetPersistentData('user_id'));
  }
  
  public function testGetPersistentData_IgnoresInvalidKeys()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $this->assertEmpty($facebook->errors);
    $facebook->publicGetPersistentData('invalid_key');
    $this->assertNotEmpty($facebook->errors);
  }
  
  public function testSetPersistentData()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $facebook->publicSetPersistentData('user_id', '5');
    $this->assertEquals(array('user_id' => '5'), $facebook->publicGetAllPersistentData());
  }
  
  public function testsetPersistentData_IgnoresInvalidKeys()
  {
    $facebook = new PublicPersistentDataCliFacebook(array(
        'appId' => self::APP_ID,
        'secret' => self::SECRET,
    ));
    
    $this->assertEmpty($facebook->errors);
    $facebook->publicSetPersistentData('invalid_key', '6');
    $this->assertNotEmpty($facebook->errors);
  }
}
