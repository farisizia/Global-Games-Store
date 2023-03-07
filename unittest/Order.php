<?php 
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "./functions.php";
// Class untuk run Testing.
class Order extends TestCase
{
    private $url = 'http://localhost/KPL/GlobalgamesStore';

    private $PHPSESSID = '';

    public function user() {
        global $conn;
        // Get 1 User
        $query = "SELECT * FROM user where username = 'admin' limit 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function seller($id_seller) {
        global $conn;
        // Get 1 Seller
        $query = "SELECT * FROM user where id = '$id_seller' limit 1";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function product($id_product) {
        global $conn;
        // Get 1 Product
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

    public function setAmountByPriceLebihDariSaldoReady() {
        global $conn;
        $user = $this->user();
        $balance_avail = $user['balance_avail'];
        $sql = "UPDATE product SET amount =  1 WHERE price  > $balance_avail";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    
    public function setAmountByPriceKurangDariSaldoReady() {
        global $conn;
        $user = $this->user();
        $balance_avail = $user['balance_avail'];
        $sql = "UPDATE product SET amount = 1 WHERE price  <= $balance_avail";
        $result = mysqli_query($conn, $sql);
        
        return $result;
    }


    public function products() {
        global $conn;
        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function productsAmountReady() {
        $product = $this->products();
        $products = array_filter($product, function($product) {
            return $product['amount'] > 0;
        });
         $products_ready = [];
         foreach ($products as $product) {
            $products_ready[] = $product;
         }
        return $products_ready;
    }

    public function login() {
        $data = "username=admin&password=123&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
       
        $this->assertStringContainsString('login Success', $curl);
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

    public function testOrderTanpaLogin() {
        $products = $this->productsAmountReady();
 
   
        $id_product = $products[0]['id_product'];
        $data ='checkout=';
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_product.'', $data);
      
     
        $this->assertStringContainsString('*you balance is not enough', $curl);
    }

    public function testOrderLoginSaldoKurang() {
        $this->setAmountByPriceLebihDariSaldoReady();
        $products = $this->productsAmountReady();
        $user = $this->user();
        $this->login(); 
        $id_product = $products[0]['id_product'];
        
        $id_seller = $products[0]['id_user'];
        
        $seller = $this->seller($id_seller);
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data ='checkout=&id_seller='.$id_seller.'&id_product='.$id_product.'&id_user='.$user['id'].'&balance='.$user['balance_avail'].'&balance_seller='.$seller['balance_avail'].'';
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_product.'', $data, $headers);

        $this->assertStringContainsString("you balance is not enough", $curl);
    }

    public function testOrderLoginSaldoPasAtauLebih() {
        $this->setAmountByPriceKurangDariSaldoReady();
        $products = $this->productsAmountReady();
        $user = $this->user();
        $this->login();
      
        $id_product = $products[0]['id_product'];
        $price = $products[0]['price'];
        $id_seller = $products[0]['id_user'];
        
        $seller = $this->seller($id_seller);
        $headers =[
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $balance = $user['balance_avail']-$price;
        $balance_seller = $seller['balance_panding'] + $price;
       
        $data ='checkout=&id_seller='.$id_seller.'&id_product='.$id_product.'&id_user='.$user['id'].'&balance='.$balance.'&balance_seller='.$balance_seller.'';
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_product.'', $data, $headers);
        $this->setAmountByPriceKurangDariSaldoReady();
        $invoice = fetch_value($curl, 'invoice.php?invoice=', "'");
       
        $this->assertStringContainsString("document.location.href = 'invoice.php?invoice=".$invoice."", $curl);
    }

    public function testViewInvoiceTanpaLogin() {
        $orders = $this->orders();
        $order = $orders[0];
        $invoice = $order['invoice'];
        $curl = curl($this->url . '/invoice.php?invoice='.$invoice.'');
        $this->assertStringContainsString('Location: account/login/login.php', $curl);

    }

    public function testViewInvoiceDenganLogin() {
        $orders = $this->orders();
        $order = $orders[0];
        $invoice = $order['invoice'];
        $date = $order['date'];
        $this->login();
        $headers =[
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $curl = curl($this->url . '/invoice.php?invoice='.$invoice.'', null,$headers);
        $this->assertStringContainsString($date, $curl);
    }

}