<?php
define('PROTOCOL', isset($_SERVER['HTTPS']) ? 'https://' : 'http://');
define('ROOT_URL', PROTOCOL . $_SERVER['HTTP_HOST']);

$database_server = "localhost";
$database_port = "3306";
$database_username = "username";
$database_password = "password";
$database_name = "bkwatch";
$session_time = 600;
$upload_image_url = 'vietnguyen2000.ddns.net:5000/upload.php';

// VNPAY
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_TmnCode = '93OQVSQD';
$vnp_HashSecret = 'HPEMBCTNFJEBSVJHOEXYCLYCTJCHNXTG';
$vnp_ReturnUrl = ROOT_URL . "/payment/VNPay/result";
$vnp_IpnUrl = ROOT_URL . "/payment/VNPay/ipn";
