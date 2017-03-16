<?php
include 'tbcpay.lib.php';

$Payment = new tbcpay( 'https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', __DIR__ . '/cert/tbcpay.pem', 'Globalupper1133)*' );

$Payment->close_day();

$result =  $Payment->close_day();

print $result;

?>