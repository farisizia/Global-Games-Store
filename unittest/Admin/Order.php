<?php 
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "functions.php";

// Class untuk run Testing.
class Order extends TestCase
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

        public function product($id_product) {
            global $conn;
            // Get 1 User
            $query = "SELECT * FROM product where id_product = '$id_product' limit 1";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($result);
            return $row;
        }
    

        public function orders() {
            global $conn;
            $query = "SELECT * FROM orderproduct";
            $result = mysqli_query($conn, $query);
            $data = [];
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
            return $data;
        }

        // Test Edit
        public function testEditOrderNotFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $curl = curl($this->url . 'edit-order.php?id='.random_int(1,1000).'a', NULL, $headers);
            $this->assertStringContainsString('Data Not Found', $curl);
        }

        public function testEditOrderFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $orders = $this->orders();
            $order = $orders[0];
            $curl = curl($this->url . 'edit-order.php?id='.$order['id_order'].'', NULL, $headers);
            $this->assertStringContainsString('See Your Order', $curl);
        }

        public function testEditOrderFailed() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $orders = $this->orders();
            $order = $orders[0];
            $data = "id_order=".$order['id_order']."&status=process&update_orde=";
            $curl = curl($this->url . 'edit-order.php?id_order='.$order['id_order'].'', $data, $headers);
            $this->assertStringNotContainsString('order successfully completed', $curl);
        }

        public function testEditOrderStatusProcessFailed() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $orders = $this->orders();
            $order = $orders[0];
            $data = "id_order=".$order['id_order']."&status=process&update_order=";
            $curl = curl($this->url . 'edit-order.php?id_order='.$order['id_order'].'', $data, $headers);
            $this->assertStringContainsString('order successfully completed', $curl);
        }

        public function testEditOrderStatusSuccessFailed() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $orders = $this->orders();
            $order = $orders[0];

            $product = $this->product($order['id_product']);
            $user = $this->user($product['id_user']);
            $tempBalance = $user['balance_avail'];
            $tempPrice = $product['price'];
            $data = "id_order=".$order['id_order']."&status=completed&update_order=";
            $curl = curl($this->url . 'edit-order.php?id_order='.$order['id_order'].'', $data, $headers);
            $userUpdated = $this->user($product['id_user']);
            $this->assertStringContainsString('order successfully completed', $curl);
            $this->assertEquals($tempBalance + $tempPrice, $userUpdated['balance_avail']);
        }

        public function testViewOrderNotFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $curl = curl($this->url . 'view-order.php?id_order='.random_int(1,1000).'a', NULL, $headers);
            $this->assertStringContainsString('Data Not Found', $curl);
        }

        public function testViewOrderFound() {
            $this->login();
            $headers = [
                'Cookie: PHPSESSID=' . $this->PHPSESSID
            ];
            $orders = $this->orders();
            $order = $orders[0];
            $curl = curl($this->url . 'view-order.php?id_order='.$order['id_order'].'', NULL, $headers);
            $this->assertStringContainsString('See Your Order', $curl);
        }





}