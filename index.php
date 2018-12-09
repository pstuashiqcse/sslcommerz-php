<?php
session_start();
include("SSLCommerz.php");
$name = "Ashiq";
$email = "ashiq@mcc.com.bd";
$address = "MCC Ltd. 6/12 Humayun Road, Bloc B, Mohammodpur, Dhaka";
$phone = "01715959851";
$transaction_amount =10;
$transaction_id = uniqid();
$currency = 'BDT';

if ($_SERVER['SERVER_NAME'] == "localhost") {
    $server_name = 'http://localhost/sslcommerz-php/';
} else {
    $server_name = 'http://mccltd.info/projects/test-projects/sslcommerz-php/';
}

$post_data = array();
$post_data['total_amount'] = $transaction_amount;
$post_data['currency'] = $currency;
$post_data['tran_id'] = $transaction_id;
$post_data['success_url'] = $server_name . "success.php";
$post_data['fail_url'] = $server_name . "fail.php";
$post_data['cancel_url'] = $server_name . "cancel.php";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $name;
$post_data['cus_email'] = $email;
$post_data['cus_add1'] = $address;
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = $phone;


$_SESSION['payment_values'] = array();

$_SESSION['payment_values']['tran_id'] = $transaction_id;
$_SESSION['payment_values']['amount'] = $transaction_amount;
$_SESSION['payment_values']['currency'] = $currency;


$sslc = new SSLCommerz();
$payment_options = $sslc->initiate($post_data, false);

?>