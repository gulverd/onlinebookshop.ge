<?php

include 'tbcpay.lib.php';

$Payment = new tbcpay( 'https://securepay.ufc.ge:18443/ecomm2/MerchantHandler', __DIR__ . 'cert/tbcpay.pem', 'Globalupper1133)*', $_SERVER['REMOTE_ADDR'] );

if ( isset($_REQUEST['trans_id']) ) {
	$trans_id = $_REQUEST['trans_id'];
	$result   = $Payment->get_transaction_result( $trans_id );
}

if ($result['RESULT'] == 'OK') {
	// success
	mail('v.pataraia@englishbook.co.uk', 'newpayment', 'payement success');
		header('Location: http://onlinebookshop.ge/test/oka.php');
	exit;
}
else {
	// failed
	mail('v.pataraia@englishbook.co.uk', 'newpayment', 'payment failed');
		header('Location: http://onlinebookshop.ge/test/oka.php');
	exit;
	
}

?>



