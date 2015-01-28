<?php

namespace Omise\Tests;

require_once dirname(__FILE__).'/../../vendor/autoload.php';

define('OMISE_PUBLIC_KEY', 'pkey');
define('OMISE_SECRET_KEY', 'skey');

class OmiseBalanceTest extends \PHPUnit_Framework_TestCase {
  public static function setUpBeforeClass() {
    /** Do Nothing **/
  }
  
  public function setUp() {
    /** Do Nothing **/
  }

  /**
   * ----- reloadのテスト -----
   * reloadに成功し、objectの値がbalanceであれば正しいとみなす
   */
  public function testReload() {
    $balance = \Omise\Balance::retrieve();
    $balance->reload();

    $this->assertArrayHasKey('object', $balance);
    $this->assertEquals('balance', $balance['object']);
  }

  /**
   * ----- retrieveのテスト -----
   * retrieveに成功し、objectの値がbalanceであれば正しいとみなす
   */
  public function testRetrieve() {
    $balance = \Omise\Balance::retrieve();
    
    $this->assertArrayHasKey('object', $balance);
    $this->assertEquals('balance', $balance['object']);
  }

  /**
   * ----- シングルトンになっているかのテスト -----
   * retrieveを2度実行した結果のインスタンスが同一であれば正しいとみなす
   */
  public function testSameInstance() {
    $balance1 = \Omise\Balance::retrieve();
    $balance2 = \Omise\Balance::retrieve();
    
    $this->assertTrue($balance1 === $balance2);
  }
  
  public function tearDown() {
    /** Do Nothing **/
  }
  
  public static function tearDownAfterClass() {
    /** Do Nothing **/
  }
}
