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
    public function testFileTurboSMSExist()
    {
        $this->assertFileExists('src/TurboSMS.php');
    }

    /**
     *
     */
    public function testStatusSMSReturnAllData()
    {
        $obj = new TurboSMS();
        $array = $obj->getStatusSMS();
        $this->assertCount(15, $array);
    }

}
