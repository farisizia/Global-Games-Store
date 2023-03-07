<?php 
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "./functions.php";

// Class untuk run Testing.
class View extends TestCase
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

    public function testLoginBenar() {
        $data = "username=admin&password=123&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
       
        $this->assertStringContainsString('login Success', $curl);
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

    public function games() {
        global $conn;
        $query = "SELECT * FROM game";
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
    public function testGameTidakDitemukan() {
        $games = $this->games();
        $id_not_found = $games[count($games)-1]['id_game']+1;
        $curl = curl($this->url . '/view-game.php?id_game='.$id_not_found.'');
       
        $this->assertStringContainsString('<a href="#men" data-toggle="tab"></a>', $curl);
    }

    public function testGameDitemukan() {
        $games = $this->games();
        $id_found = $games[count($games)-1]['id_game'];
        $name =  $games[count($games)-1]['name_game'];
        $curl = curl($this->url . '/view-game.php?id_game='.$id_found.'');
        $this->assertStringContainsString('<a href="#men" data-toggle="tab">'.$name.'</a>', $curl);
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

   


   
    public function testProductTidakDitemukan() {
        $products = $this->products();
        $id_not_found = $products[count($products)-1]['id_product']+1;
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_not_found.'');
       
        //Cek Deskripsi Kosong Atau Tidak
        $this->assertStringContainsString('style="width: 1000px; height: 200px;"></textarea>', $curl);
    }

    public function testProductDitemukan() {
        $products = $this->products();
        $product = $products[count($products)-1];
        
        $id_found = $product['id_product'];
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_found.'');
       
        //Cek Apakah Title Dan Deskripsi Ditemukan
        $this->assertStringContainsString($product['title'], $curl);
        $this->assertStringContainsString($product['description'], $curl);
    }

    public function testProductDitemukanSaldoKurangAtauBelumLogin() {
        $this->setAmountByPriceLebihDariSaldoReady();
        $products = $this->products();
        $user = $this->user();
        

        // Filter Product 
        $product_s = array_filter($products, function($product_s) use ($user) {
            if($product_s['price'] > $user['balance_avail'] AND $product_s['amount'] > 0) {
                return $product_s;
            }
        });

       
        foreach($product_s as $p) {
            $products[] = $p;
        }
     
        $product = $products[0];
        
        $id_found = $product['id_product'];
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_found.'');
       
        //Cek Apakah Title Dan Deskripsi Ditemukan
        $this->assertStringContainsString($product['title'], $curl);
        $this->assertStringContainsString($product['description'], $curl);
        $this->assertStringContainsString('*you balance is not enough', $curl);
    }

    public function testProductDitemukanSaldoCukupDanProductTersedia() {
        $products = $this->products();
      
        $user = $this->user();
        $this->testLoginBenar();


        $headers = array(
            'Cookie: PHPSESSID=' . $this->PHPSESSID 
        );
        

        // Filter Product 
        $product_s = array_filter($products, function($product_s) use ($user) {
            if($product_s['price'] < $user['balance_avail'] AND $product_s['amount'] > 0) {
                return $product_s;
            }
        });
        $products =array();
        foreach($product_s as $p) {
            $products[] = $p;
        }
     
       $product = $products[0];
    
       
        
        $id_found = $product['id_product'];
        
        $curl = curl($this->url . '/view-detail.php?id_product='.$id_found.'', null, $headers);
       
        //Cek Apakah Title Dan Deskripsi Ditemukan
        $this->assertStringContainsString($product['title'], $curl);
        $this->assertStringContainsString($product['description'], $curl);
        $this->assertStringContainsString('BUY NOW', $curl);
    }

}