<?php declare(strict_types=1);

namespace Y0x54aTest\Oid;

use Throwable;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Y0x54a\Base64url\Base64url;

class Base64urlTest extends TestCase
{
  protected $resources;

  protected function setUp(): void{
    $this->resources = require(__DIR__.'/resources.php');
  }

  public function testEncode(){
    foreach ($this->resources['validInputs'] as $input) {
      $result = Base64url::encode($input[0]);
      $this->assertEquals($result, $input[2]);
    }
  }

  public function testDecode(){
    foreach ($this->resources['validInputs'] as $input) {
      $result = Base64url::decode($input[2]);
      $this->assertEquals($result, $input[0]);
    }
  }

  public function testValidateValidInputs(){
    foreach ($this->resources['validInputs'] as $input) {
      $result = Base64url::validate($input[2]);
      $this->assertTrue($result);
    }
  }

  public function testValidateInvalidInputs(){
    foreach ($this->resources['invalidInputs'] as $input) {
      $result = Base64url::validate($input);
      $this->assertFalse($result);
    }
  }

  public function testConvertBase64ToBase64url(){
    foreach ($this->resources['validInputs'] as $input) {
      $result = Base64url::convertBase64ToBase64url($input[1]);
      $this->assertEquals($result, $input[2]);
    }
  }

  public function testConvertBase64urlToBase64ValidInputs(){
    foreach ($this->resources['validInputs'] as $input) {
      $result = Base64url::convertBase64urlToBase64($input[2]);
      $this->assertEquals($result, $input[1]);
    }
  }

  public function testConvertBase64urlToBase64InvalidInputs(){
    foreach ($this->resources['invalidInputs'] as $input) {
      try {
        Base64url::convertBase64urlToBase64($input);
      } catch (Throwable $e) {
        $this->assertInstanceOf(InvalidArgumentException::class, $e);
        continue;
      }
      $this->assertTrue(false);
    }
  }
}