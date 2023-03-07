<?php 
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "functions.php";

// Class untuk run Testing.
class Result extends TestCase
{
    private $url = 'http://localhost/KPL/GlobalgamesStore/admin/';

    private $PHPSESSID = '';

    public function login() {
        $data = "username=admin&password=123&login=";
        $curl = curl('http://localhost/KPL/GlobalgamesStore/account/login/login.php', $data);
       
       
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

        public function seller($id_seller) {
            global $conn;
            // Get 1 User
            $query = "SELECT * FROM user where id = '$id_seller' limit 1";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    

        public function results() {
            global $conn;
            $query = "SELECT * FROM result";
            $result = mysqli_query($conn, $query);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }

        public function testViewResultNotFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $curl = curl($this->url . 'view-result.php?id_order='.random_int(1,1000).'a', NULL, $headers);
            $this->assertStringContainsString('Data Not Found', $curl);
        }

        public function testViewResultFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $results = $this->results();
            $result = $results[0];
            $curl = curl($this->url . 'view-result.php?id_order='.$result['id_order'], NULL, $headers);
           
            $this->assertStringContainsString($result['data'], $curl);
            $this->assertStringContainsString($result['email'], $curl);
            $this->assertStringContainsString($result['username'], $curl);
        }

        public function testResultUpdateStatusFailed() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $results = $this->results();
            $result = $results[0];
            $data = 'id_order='.$result['id_order'].'&update=';
            $curl = curl($this->url . 'view-result.php?id_order='.$result['id_order'], $data, $headers);
            $this->assertStringNotContainsString('order successfully completed', $curl);
        }

        public function testResultUpdateStatusSuccess() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $results = $this->results();
            $result = $results[0];
            $seller = $this->seller($result['id_seller']);
            $balance_avail = $seller['balance_avail'];
            $balance_panding = $seller["balance_panding"];
            
            $data = 'id_order='.$result['id_order'].'&status=completed&id_seller='.$result['id_seller'].'&balance_avail='.$balance_avail.'&balance_panding='.$balance_panding.'&update_order=';
            $curl = curl($this->url . 'view-result.php?id_order='.$result['id_order'], $data, $headers);
            $this->assertStringContainsString('order successfully completed', $curl);
        }

}