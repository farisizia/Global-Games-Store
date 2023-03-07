<?php 
require './vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "./functions.php";

// Class untuk run Testing.
class Auth extends TestCase
{

    private $url = 'http://localhost/KPL/GlobalgamesStore';

    public function testUrlRegisterTidakDitemukan() {
        $curl = curl($this->url . '/account/register/register1.php');
       
        $this->assertStringContainsString('404 Not Found', $curl);
    }

    public function testUrlRegisterDitemukan() {
        $curl = curl($this->url . '/account/register/register.php');
       
        $this->assertStringContainsString('Register your account', $curl);
    }
    public function testRegisterUsernameSudahDigunakan() {
        $data = "username=admin&password=123&email=adasdsa@gmail.com&register=";
        $curl = curl($this->url . '/account/register/register.php', $data);
       
        $this->assertStringContainsString('Username sudah terdaftar', $curl);
    }

    public function testRegisterBerhasilTetapiGagalMengirimEmail() {
        $data = "username=demo".random_int(1,100000)."&password=123&email=adasdsa@gmail.com&register=";
        $curl = curl($this->url . '/account/register/register.php', $data);
       
        $this->assertStringContainsString('account successfully registered', $curl);
    }


    public function testRegisterBerhasilTetapiBerhasilMengirimEmail() {
        $data = "username=demo".random_int(1,100000)."&password=123&email=rendijuliant.o37@gmail.com&register=";
        $curl = curl($this->url . '/account/register/register.php', $data);
       
        $this->assertStringContainsString('account successfully registered, please check your email to activate your account', $curl);
    }


    public function testUrlLoginTidakDitemukan() {
        $curl = curl($this->url . '/account/login/login1.php');
       
        $this->assertStringContainsString('404 Not Found', $curl);
    }

    public function testUrlLoginDitemukan() {
        $curl = curl($this->url . '/account/login/login.php');
       
        $this->assertStringContainsString('Sign into your account', $curl);
    }

    public function testLoginSalah() {
        $data = "username=admin&password=adminasdasdas&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
       
        $this->assertStringContainsString('email / password wrong', $curl);
    }

    public function testLoginBenar() {
        $data = "username=admin&password=123&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
       
        $this->assertStringContainsString('login Success', $curl);
    }

    // Test Send Verify Email
    public function testSendVerifyEmail() {
        global $conn;
        $sql_update = "UPDATE user SET email_verified_at = NULL WHERE username = 'admin'";
        mysqli_query($conn, $sql_update);
        $data = "username=admin&password=123&login=";
        $curl = curl($this->url . '/account/login/login.php', $data);
        $this->assertStringContainsString('login Success', $curl);
        $PHPSESSID = fetch_value($curl, 'PHPSESSID=', ';');
        $headers = array(
            'Cookie: PHPSESSID=' . $PHPSESSID
        );

        $data = "resend_email=";
        $curl = curl($this->url . '/account/verify-email/verify-email.php', $data, $headers);
        
        $this->assertStringContainsString('email successfully resend', $curl);
    }

    public function testSuccessVerifyEmail() {
        global $conn;
       
        $sql = "SELECT * FROM user WHERE username = 'admin' and email_verified_at IS NULL LIMIT 1";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) == 1 ) {
            $row = mysqli_fetch_assoc($result);
            $curl = curl($this->url . '/verify.php?email='.$row['email'].'&email_code_verified='.$row['email_code_verified'].'', null);
            $this->assertStringContainsString('Email Verified', $curl);
        } else {
            $this->assertTrue(false);
        }
    }
    public function testFaieldVerifyEmail() {
        global $conn;
        
        $sql = "SELECT * FROM user WHERE username = 'admin' LIMIT 1";
        $result = mysqli_query($conn, $sql);
    
        if(mysqli_num_rows($result) == 1 ) {
            $row = mysqli_fetch_assoc($result);
          
            $curl = curl($this->url . '/verify.php?email='.$row['email'].'&email_code_verified='.$row['email_code_verified'].'', null);
            $this->assertStringContainsString('Email Verification Failed', $curl);
        } else {
            $this->assertTrue(false);
        }
    }
    
}