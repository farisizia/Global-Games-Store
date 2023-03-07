<?php 
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "functions.php";

// Class untuk run Testing.
class Game extends TestCase
{
    private $url = 'http://localhost/KPL/GlobalgamesStore/admin/';

    private $PHPSESSID = '';

    public function login() {
        $data = "username=admin&password=123&login=";
        $curl = curl('http://localhost/KPL/GlobalgamesStore/account/login/login.php', $data);
       
       
        $this->PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
    }

    public function platforms() {
        global $conn;
        $query = "SELECT * FROM platforms";
        $result = mysqli_query($conn, $query);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
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

    public function testUrlAddGameLinkTidakDitemukan() {
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'update=';
        $curl = curl($this->url . 'addgame1.php', $data, $headers);
       
        $this->assertStringContainsString('404 Not Found', $curl);
    }

    public function testUrlAddGameLinkDitemukan() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $curl = curl($this->url . 'addgame.php', NULL, $headers);
        $this->assertStringContainsString('Add Game', $curl);
    }

    public function testAddFailed() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'name_game=&id_platforms=1&addgame=';
        $curl = curl($this->url . 'addgame.php', $data, $headers);
        $this->assertStringContainsString('Name game tidak boleh kosong', $curl);
    }

    public function tesAddSuccess() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'name_game=test.'.random_int(1,10000).'&id_platforms=1&editgames=';
        $curl = curl($this->url . 'addgame.php', $data, $headers);
        $this->assertStringContainsString('game successfully add', $curl);
    }


    public function testUrlUpdateGameLinkTidakDitemukan() {
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $data = 'editgames=';
        $curl = curl($this->url . 'edit-game.php?id='.random_int(1,10000).'a', $data, $headers);
       
        $this->assertStringContainsString('Data Tidak ditemukan', $curl);
    }

    public function testUpdateFailed() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $games = $this->games();
        
        $id = $games[count($games)-1]['id_game'];
   
        $data = 'name_game=&id_platforms=1&editgames=';
        $curl = curl($this->url . 'edit-game.php?id='.$id.'', $data, $headers);

        $this->assertStringContainsString('Name game tidak boleh kosong', $curl);
    }

    public function tesUpdateSuccess() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $games = $this->games();
        $id = $games[count($games)-1]['id_game'];
        $data = 'name_game=test.'.random_int(1,10000).'&id_platforms=1&editgames=';
        $curl = curl($this->url . 'edit-game.php?id='.$id.'', $data, $headers);
        $this->assertStringContainsString('game successfully updated', $curl);
    }

    public function testViewGameFailed() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
  
        $id_not_found = random_int(1, 100000).'a';
        $curl = curl($this->url . 'view-game.php?id='.$id_not_found.'', NULL, $headers);
     
        $this->assertStringContainsString('Game tidak ditemukan', $curl);
    }

    public function testViewGameSuccess() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $games = $this->games();
        $id = $games[count($games)-1]['id_game'];
        $name_game = $games[count($games)-1]['name_game'];
        $curl = curl($this->url . 'view-game.php?id='.$id.'', NULL, $headers);
        $this->assertStringContainsString($name_game, $curl);
    }


    public function testDeleteGameFailed() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $games = $this->games();
        $id = random_int(1, 100000).'a';
        $curl = curl($this->url . 'delete-game.php?id='.$id.'', NULL, $headers);
        $this->assertStringContainsString('game unsuccess deleted', $curl);
    }

    public function testDeleteGameSuccess() {
        $this->login();
        $headers = [
            'Cookie: PHPSESSID=' . $this->PHPSESSID
        ];
        $games = $this->games();
        $id = $games[count($games)-1]['id_game'];
        $curl = curl($this->url . 'delete-game.php?id='.$id.'', NULL, $headers);
        $this->assertStringContainsString('game successfully deleted', $curl);

    }



  
}