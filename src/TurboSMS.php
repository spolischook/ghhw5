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
        $pdo = new Database ("DB_TYPE:host=DB_HOST;dbname=DB_NAME", 'DB_USER', 'DB_PASS');
        $pdo->query("SET NAMES utf8;");
        $pdo->query("INSERT INTO 0TshEL_n1ck (`number`,`message`,`sign`)
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
