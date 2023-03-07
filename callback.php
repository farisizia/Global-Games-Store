<?php 

include_once 'functions.php';
error_reporting(0);
use Tripay\Main;

$main = new Main(
    TRIPAY_API_KEY,
    TRIPAY_API_PRIVATE,
    TRIPAY_KODE_MERCHANT,
    "sandbox" // fill for sandbox mode, leave blank if in production mode
);

$init = $main->initCallback(); // return callback
global $conn;
if($init->validateSignature()) {
    $data = $init->getJson();
    $reference = $data->reference;
    $sql = "SELECT topups.id as topup_id,topups.status,topups.amount_send, user.* FROM topups INNER JOIN user ON user.id = topups.user_id WHERE reference_code = '$reference' LIMIT 1";
    $result = mysqli_query($conn, $sql);
  
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row['topup_id'];
        $status = $row['status'];
        $user_id = $row['id'];
        $username = $row['username'];
        $amount_send = $row['amount_send'];
        if($data->status != $status) {
            if($data->status == "PAID" AND $amount_send == $data->amount_received) {
                $sql = "UPDATE topups SET status = 'PAID', updated_at = NOW() WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_affected_rows($conn) == 1) {
                    $sql = "UPDATE user SET balance_avail = balance_avail + $amount_send WHERE id = '$user_id'";
                    $result = mysqli_query($conn, $sql);
                  
                    if(mysqli_affected_rows($conn) > 0 ) {
                        echo "Pembayaran Berhasil";
                    } else {
                        echo "Pembayaran Gagal Update Saldo";
                    }
                } else {
                    echo "Pembayaran Gagal diupdate";
                }
            } else if($data->status == "FAILED") {
                $sql = "UPDATE topups SET status = 'FAILED', updated_at = NOW() WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_affected_rows($conn) == 1) {
                    echo "Pembayaran Gagal";
                } else {
                    echo "Pembayaran Gagal diupdate failed";
                }
            } else if($data->status == "EXPIRED") {
                $sql = "UPDATE topups SET status = 'EXPIRED', updated_at = NOW() WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_affected_rows($conn) == 1) {
                    echo "Pembayaran Expired";
                } else {
                    echo "Pembayaran Gagal diupdate expired";
                }
            } else {
                echo "Pembayaran Belum Selesai 2";
            }
        }
    } else {
        echo "Pembayaran Belum Selesai 1";
    }

} else {
    return 'signature not valid';
}

// $init->get(); // get all callback

// $init->getJson(); // get json callback

// $init->signature(); // callback signature

// $init->callbackSignature(); // callback signature

// $init->callEvent(); // callback event, return `payment_status`

// $init->validateSignature(); // return `true` is valid signature, `false` invalid signature

// $init->validateEvent(); // return `true` is PAID, `false` meaning UNPAID,REFUND,etc OR call event undefined