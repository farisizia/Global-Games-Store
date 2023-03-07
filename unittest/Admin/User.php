<?php 
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "functions.php";

// Class untuk run Testing.
class User extends TestCase
{

    private $url = 'http://localhost/KPL/GlobalgamesStore/admin/';

    private $PHPSESSID = '';


    public function users() {
        global $conn;
        $query = "SELECT * FROM user";
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    public function testLoginAdmin() {
        $data = "username=admin&password=123&login=";
        $curl = curl('http://localhost/KPL/GlobalgamesStore/account/login/login.php', $data);
       
        $this->assertStringContainsString('login Success', $curl);
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

    public function testUrlUpdateProfileLinkTidakDitemukan() {
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'update=';
        $curl = curl($this->url . 'user1.php', $data, $headers);
       
        $this->assertStringContainsString('404 Not Found', $curl);
    }

    public function testUrlUpdateProfileLinkDitemukan() {
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'username=admin&email=rendijulianto37%40gmail.com&balance_avail=9000&balance_panding=200&id=12&level=admin&password=123&update=';
        $curl = curl($this->url . 'user.php', $data, $headers);
        $this->assertStringContainsString('account successfully updated', $curl);
    }

    public function testAddUserFailed() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'username=&email=adasda'.random_int(1,10000).'@gmail.com&balance_avail='.random_int(1,10000).'&balance_panding='.random_int(1,10000).'&level=user&password='.random_int(1,10000).'&add=';
        $curl = curl($this->url . 'adduser.php', $data, $headers);
        $this->assertStringContainsString('Username tidak boleh kosong', $curl);
    }

    public function testAddUserSuccess() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'username=admin'.random_int(1,10000).'&email=adasda'.random_int(1,10000).'@gmail.com&balance_avail='.random_int(1,10000).'&balance_panding='.random_int(1,10000).'&level=user&password='.random_int(1,10000).'&add=';
        $curl = curl($this->url . 'adduser.php', $data, $headers);
        $this->assertStringContainsString('account successfully add', $curl);
    }

    public function testViewUserFailed() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
  
        $id_not_found = random_int(1, 100000).'a';
        $curl = curl($this->url . 'view-user.php?id='.$id_not_found.'', NULL, $headers);
     
        $this->assertStringContainsString('User tidak ditemukan', $curl);
    }

    public function testViewUserSuccess() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $users = $this->users();
        $id = $users[count($users)-1]['id'];
        $username = $users[count($users)-1]['username'];
        $curl = curl($this->url . 'view-user.php?id='.$id.'', NULL, $headers);
        $this->assertStringContainsString($username, $curl);
    }


    public function testUpdateUserFailed() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $users = $this->users();
        $id = $users[count($users)-1]['id'];
      
        $data = 'id='.$id.'&username=&email=adasda'.random_int(1,10000).'@gmail.com&balance_avail='.random_int(1,10000).'&balance_panding='.random_int(1,10000).'&level=user&password='.random_int(1,10000).'&update=';
        $curl = curl($this->url . 'edit-user.php?id='.$id.'', $data, $headers);
      
        $this->assertStringContainsString('Username tidak boleh kosong', $curl);
    }

    public function testUpdateUserSuccess() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $users = $this->users();
        $id = $users[count($users)-1]['id'];
        $data = 'username=admin'.random_int(1,10000).'&email=adasda'.random_int(1,10000).'@gmail.com&balance_avail=9000&balance_panding='.random_int(1,10000).'&level=user&password='.random_int(1,10000).'&update=';
        $curl = curl($this->url . 'edit-user.php?id='.$id.'', $data, $headers);
        $this->assertStringContainsString('account successfully updated', $curl);
    }

    public function testDeleteUserFailed() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $users = $this->users();
        $id = random_int(1, 100000).'a';
        $curl = curl($this->url . 'delete-user.php?id='.$id.'', NULL, $headers);
        $this->assertStringContainsString('account unsuccess deleted', $curl);
    }

    public function testDeleteUserSuccess() {
        $this->testLoginAdmin();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $users = $this->users();
        $id = $users[count($users)-1]['id'];
        $curl = curl($this->url . 'delete-user.php?id='.$id.'', NULL, $headers);
        $this->assertStringContainsString('account successfully deleted', $curl);
    }

    
}