<?php
namespace Src;

use App\Database;

/**
 * Class TurboSMS
 * @package Src
 */
class TurboSMS extends Database
{

    /**
     * @param $recepient
     * @param $message
     */
    public function sendSMS($recepient, $message)
    {
        $sign = SIGNATURE;
        $dbUser = DB_USER;
        $this->query("SET NAMES utf8;");
        $this->query("INSERT INTO $dbUser (`number`,`message`,`sign`)
              VALUES ('$recepient','$message', '$sign')");
    }

    /**
     * @return array
     */
    public function getStatusSMS()
    {
        $stmt = $this->query('SELECT * from 0TshEL_n1ck ORDER BY id DESC LIMIT 15');
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

}
