<?php 
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "functions.php";

// Class untuk run Testing.
class Topup extends TestCase
{
    private $url = 'http://localhost/KPL/GlobalgamesStore/admin/';

    private $PHPSESSID = '';

    public function login() {
        $data = "username=admin&password=123&login=";
        $curl = curl('http://localhost/KPL/GlobalgamesStore/account/login/login.php', $data);
       
       
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

        public function user($id_user) {
            global $conn;
            // Get 1 User
            $query = "SELECT * FROM user where id = '$id_user' limit 1";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }


    

        public function topups() {
            global $conn;
            $query = "SELECT * FROM topups";
            $result = mysqli_query($conn, $query);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }

        // Test Edit
        public function testEditTopupNotFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $curl = curl($this->url . 'edit-topup.php?id='.random_int(1,1000).'a', NULL, $headers);
            $this->assertStringContainsString('Data Not Found', $curl);
        }

        public function testEditTopupFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $topups = $this->topups();
            $topup = $topups[0];
            $curl = curl($this->url . 'edit-topup.php?id='.$topup['id'].'', NULL, $headers);
            $this->assertStringContainsString('See Your Topup', $curl);
        }

        public function testEditOrderFailed() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $topups = $this->topups();
            $topup = $topups[0];
            $data = "id_topup=".$topup['id']."&status=UNPAID&update_topu=";
            $curl = curl($this->url . 'edit-topup.php?id='.$topup['id'].'', $data, $headers);
            $this->assertStringNotContainsString('topup successfully completed', $curl);
        }

        public function testEditOrderStatusErrorSuccess() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $topups = $this->topups();
            $topup = $topups[0];
            $data = "id_topup=".$topup['id']."&status=ERROR&update_topup=";
            $curl = curl($this->url . 'edit-topup.php?id='.$topup['id'].'', $data, $headers);
            $this->assertStringContainsString('topup successfully completed', $curl);
        }

        public function testEditOrderStatusSuccess() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $topups = $this->topups();
            $topup = $topups[0];
            $user = $this->user($topup['user_id']);
            $tempBalance = $user['balance_avail'];
            $amount = $topup['amount_send'];
            $total = $tempBalance + $amount;
            $data = "id_topup=".$topup['id']."&status=PAID&update_topup=";
            $curl = curl($this->url . 'edit-topup.php?id='.$topup['id'].'', $data, $headers);
            $userUpdated = $this->user($topup['user_id']);
            $this->assertStringContainsString('topup successfully completed', $curl);
            $this->assertEquals($total, $userUpdated['balance_avail']);
        }

        public function testViewTopupNotFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $curl = curl($this->url . 'view-topup.php?id='.random_int(1,1000).'a', NULL, $headers);
            $this->assertStringContainsString('Data Not Found', $curl);
        }

        public function testViewTopupFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $topups = $this->topups();
            $topup = $topups[0];
            $curl = curl($this->url . 'view-topup.php?id='.$topup['id'].'', NULL, $headers);
            $this->assertStringContainsString('See Your Topup', $curl);
            $this->assertStringContainsString($topup['amount_send'], $curl);
            $this->assertStringContainsString($topup['checkout_url'], $curl);
        }

}