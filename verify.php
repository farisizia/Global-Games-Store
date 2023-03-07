<?php
require 'functions.php';
session_start();
if(isset($_GET['email_code_verified'])) {
    $query = "SELECT * FROM user WHERE email_code_verified = '$_GET[email_code_verified]' AND email_verified_at IS NULL LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) == 1) {
        $query = "UPDATE user SET email_verified_at = NOW() WHERE id = '$row[id]'";
        $result = mysqli_query($conn, $query);
        if(mysqli_affected_rows($conn) == 1) {
            $_SESSION['email_verified_at'] = date('Y-m-d H:s:i');
            
            echo "<script>
                alert('Email Verified');
            </script>";
            header("location: ../../index.php");
            exit;
        } else {
            echo "<script>
                alert('Email Verification Failed');
                document.location.href = 'account/verify-email/verify-email.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Email Verification Failed');
            document.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Email Verification Failed');
        document.location.href = 'index.php'
        </script>";
    header("location: index.php");
    exit;
}