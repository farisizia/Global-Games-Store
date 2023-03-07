<?php 
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "./functions.php";
// Class untuk run Testing.
class Seller extends TestCase
{
    private $url = 'http://localhost/KPL/GlobalgamesStore';

    private $PHPSESSID = '';

    public function user($id) {
        global $conn;
        // Get 1 User
        $query = "SELECT * FROM user where id = '$id' limit 1";
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
    
    public function updateOrderStatus($id) {
        global $conn;
        $sql = "UPDATE orderproduct SET status = 'process' WHERE id_order = '$id'";
        $result = mysqli_query($conn, $sql);
        return $result;
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


    public function login() {
        $data = "username=admin&password=123&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

    // Test Upload Result
    public function testUploadOrderFound() {
        $login = $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $orders = $this->orders();
        $order = $orders[0];
   
        $this->updateOrderStatus($order['id_order']);
        $data = "username=tester&email=tester@gmail.com&id_order=".$order['id_order']."&id_user=".$order['id_user']."&password=tester&detail=tester&validation=";
        $curl = curl($this->url . '/validation.php?id_order='.$order['id_order'].'', $data, $headers);
  
        $this->assertStringContainsString('Thank You For Your Submit', $curl);
    }
        
}