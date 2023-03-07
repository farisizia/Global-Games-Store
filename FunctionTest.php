<?php 
require 'vendor/autoload.php';
use PHPUnit\Framework\TestCase;

// Class yang mau di TEST.
require_once "functions.php";

// Class untuk run Testing.
class FunctionTest extends TestCase
{

    public function testTambahProductBerhasil()
    {

    
        $data = [
            'id_user' => 12,
            'title' => 'Produk Terster',
            'price' => 10000,
            'id_platforms' =>  1,
            'id_game' => 7,
            'amount' => 1,
            'description' => 'Loremmmmmmmmmm'
        ];
        // Kita assert equal, ekspektasi nya harus 1, jika benar berarti berfungsi dengan baik.
        $this->assertEquals(1, add_product($data)); 
    }
    public function testTambahProductGagal()
    {

    
        $data = [
            'id_user' => 12,
            'title' => 'Produk Terster',
            'price' => 1000,
            'id_platforms' =>  1,
            'id_game' => 7,
            'amount' => 1,
            'description' => 'Loremmmmmmmmmm'
        ];
        // Kita assert equal, ekspektasi nya harus 0, jika benar berarti berfungsi dengan baik.
        $this->assertEquals(0, add_product($data)); 
    }

    public function testEditProductBerhasil()
    {

    
        $data = [
            'id_product' => get_last_id_product(),
            'id_user' => 12,
            'title' => 'Produk Terster Update',
            'price' => 10000,
            'id_platforms' =>  1,
            'id_game' => 7,
            'amount' => 1,
            'description' => 'Loremmmmmmmmmm'
        ];
        // Kita assert equal, ekspektasi nya harus 1, jika benar berarti berfungsi dengan baik.
        $this->assertEquals(1, update_product($data)); 
    }
    public function testEditProductGagal()
    {

    
        $data = [
            'id_product' => get_last_id_product(),
            'id_user' => 12,
            'title' => 'Produk Terster',
            'price' => 100,
            'id_platforms' =>  1,
            'id_game' => 7,
            'amount' => 1,
            'description' => 'Loremmmmmmmmmm'
        ];
        // Kita assert equal, ekspektasi nya harus 0, jika benar berarti berfungsi dengan baik.
        $this->assertEquals(0, update_product($data)); 
    }
    public function testDeleteProductBerhasil()
    {
        // Kita assert equal, ekspektasi nya harus 1, jika benar berarti berfungsi dengan baik.
        $this->assertEquals(1, delete_product(get_last_id_product())); 
    }
    public function testDeleteProductGagal()
    {
        get_last_id_product();
        // Kita assert equal, ekspektasi nya harus 0, jika benar berarti berfungsi dengan baik.
        $this->assertEquals(0, delete_product(0)); 
    }
}