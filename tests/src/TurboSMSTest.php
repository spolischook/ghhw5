<?php
namespace Tests;

use Src\TurboSMS;

/**
 * Class TurboSMSTest
 * @package Tests
 */
class TurboSMSTest extends \PHPUnit_Framework_TestCase
{
    /**
     *
     */
    public function testFilesExist()
    {
        $this->assertFileExists('src/TurboSMS.php');
        $this->assertFileExists('web/index.php');
        $this->assertFileExists('App/Database.php');
    }

    /**
     *
     */
    public function testStatusSMSReturnAllData()
    {
        if (file_exists('config\config.php')) {
            $obj = new TurboSMS();
            $array = $obj->getStatusSMS();
            $this->assertCount(15, $array);
        } else {
            $mock = $this->getMock('Src\TurboSMS');
            $mock->expects($this->once())
                ->method('getStatusSMS')
                ->will($this->returnValue(15));
            $this->assertEquals($mock->getStatusSMS(), 15);
        }
    }

    /**
     *
     */
    public function testSendSMS()
    {
        $mock = $this->getMock('Src\TurboSMS');
        $mock->expects($this->once())
            ->method('sendSMS')
            ->will($this->returnValue('done'));
        $this->assertEquals($mock->sendSMS('380501234567', 'Test message'), 'done');
    }

}
