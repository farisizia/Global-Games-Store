<?php 
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "./functions.php";
// Class untuk run Testing.
class Topup extends TestCase
{
    private $url = 'http://localhost/KPL/GlobalgamesStore';

    private $PHPSESSID = '';

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

    public function testLinkTidakDitemukan() {
        $curl = curl($this->url . '/topup1.php', null);
        $this->assertStringContainsString('404 Not Found', $curl);
    }
    public function testLinkDitemukan() {
        $curl = curl($this->url . '/topup.php', null);
        $this->assertStringContainsString('Jumlah Topup', $curl);
    }
    public function login() {
        $data = "username=admin&password=123&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
       
        $this->assertStringContainsString('login Success', $curl);
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }
    public function testTopup() {
        $this->login();
        $data = "amount=100000&method=QRIS&topup=topup";
        $headers = array(
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        );
        $curl = curl($this->url . '/topup.php', $data, $headers);
        $invoice = fetch_value($curl, 'invoice-topup.php?invoice=', "'");
        $this->assertStringContainsString("document.location.href = 'invoice-topup.php?invoice=".$invoice."", $curl);
    }
    public function testViewInvoice() {
        $topups = $this->topups();
        $topup = $topups[0];
        $invoice = $topup['invoice'];
        $date = $topup['created_at'];
        $this->login();
        $headers =[
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $curl = curl($this->url . '/invoice-topup.php?invoice='.$invoice.'', null,$headers);
        $this->assertStringContainsString($date, $curl);
    }

}