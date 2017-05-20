<?php

ob_start();
@include("../../config.php");
$strNo = rand(1,1000000);
error_reporting('0');
date_default_timezone_set('Asia/Calcutta');

//echo date_default_timezone_get();

$strCurDate = date('d-m-Y');

require_once 'TransactionRequestBean.php';
require_once 'TransactionResponseBean.php';

session_start();
$uname = $_SESSION['user'];
//echo  print_r($_POST);
if($_POST && isset($_POST['submit'])){

    $val = $_POST;

    $_SESSION['iv'] = $val['iv'];
    $_SESSION['key']   = $val['key'];
	$p_id = $_SESSION['plog_id'];
	
	$root_url  	 = 'http://drthajskin-haironlineexpert.in/admin/';

    $transactionRequestBean = new TransactionRequestBean();

    //Setting all values here
    $transactionRequestBean->setMerchantCode($val['mrctCode']);
    $transactionRequestBean->setAccountNo($val['tpvAccntNo']);
    $transactionRequestBean->setITC($val['itc']);
    $transactionRequestBean->setMobileNumber($val['mobNo']);
    $transactionRequestBean->setCustomerName($val['custname']);
    $transactionRequestBean->setRequestType($val['reqType']);
    $transactionRequestBean->setMerchantTxnRefNumber($val['mrctTxtID']);
    $transactionRequestBean->setAmount($val['amount']);
    $transactionRequestBean->setCurrencyCode($val['currencyType']);
    $transactionRequestBean->setReturnURL($val['returnURL']);
    $transactionRequestBean->setS2SReturnURL($val['s2SReturnURL']);
    $transactionRequestBean->setShoppingCartDetails($val['reqDetail']);
    $transactionRequestBean->setTxnDate($val['txnDate']);
    $transactionRequestBean->setBankCode($val['bankCode']);
    $transactionRequestBean->setTPSLTxnID($val['tpsl_txn_id']);
    $transactionRequestBean->setCustId($val['custID']);
    $transactionRequestBean->setCardId($val['cardID']);
    $transactionRequestBean->setKey($val['key']);
    $transactionRequestBean->setIv($val['iv']);
    $transactionRequestBean->setWebServiceLocator($val['locatorURL']);
    $transactionRequestBean->setMMID($val['mmid']);
    $transactionRequestBean->setOTP($val['otp']);
    $transactionRequestBean->setCardName($val['cardName']);
    $transactionRequestBean->setCardNo($val['cardNo']);
    $transactionRequestBean->setCardCVV($val['cardCVV']);
    $transactionRequestBean->setCardExpMM($val['cardExpMM']);
    $transactionRequestBean->setCardExpYY($val['cardExpYY']);
    $transactionRequestBean->setTimeOut($val['timeOut']);

   // $url = $transactionRequestBean->getTransactionToken();

    $responseDetails = $transactionRequestBean->getTransactionToken();
    $responseDetails = (array)$responseDetails;
    $response = $responseDetails[0];

    if(is_string($response) && preg_match('/^msg=/',$response)){
        $outputStr = str_replace('msg=', '', $response);
        $outputArr = explode('&', $outputStr);
        $str = $outputArr[0];

        $transactionResponseBean = new TransactionResponseBean();
        $transactionResponseBean->setResponsePayload($str);
        $transactionResponseBean->setKey($val['key']);
        $transactionResponseBean->setIv($val['iv']);

        $response = $transactionResponseBean->getResponsePayload();
        $payment_s_response_update = mysql_query("update tbl_patientlist set payment_s_response='$response' where fld_id ='$p_id'")or die(mysql_error());
    }elseif(is_string($response) && preg_match('/^txn_status=/',$response)){
		$payment_s_response_update = mysql_query("update tbl_patientlist set payment_s_response='$response' where fld_id ='$p_id'")or die(mysql_error());
	}

    echo "<script>window.location = '".$root_url."payment_transaction.php'</script>";
    ob_flush();

}else if($_POST){

    $response = $_POST;

    if(is_array($response)){
        $str = $response['msg'];
    }else if(is_string($response) && strstr($response, 'msg=')){
        $outputStr = str_replace('msg=', '', $response);
        $outputArr = explode('&', $outputStr);
        $str = $outputArr[0];
    }else {
        $str = $response;
    }

    $transactionResponseBean = new TransactionResponseBean();

    $transactionResponseBean->setResponsePayload($str);
    $transactionResponseBean->setKey($_SESSION['key']);
    $transactionResponseBean->setIv($_SESSION['iv']);

    $response = $transactionResponseBean->getResponsePayload();
	$payment_s_response_update = mysql_query("update tbl_patientlist set payment_s_response='$response' where fld_id ='$p_id'")or die(mysql_error());
	
}

?>
<html>
<body>
<?php
$root_url  	 = 'http://drthajskin-haironlineexpert.in/admin/';
if($payment_s_response_update)
{
?>
<a href='<?php echo $root_url.'payment_transaction.php';?>'>GO TO HOME</a>
<?php
}
else
{
?>
<?php
}
unset($_SESSION["plog_id"], $_SESSION["iv"], $_SESSION["key"]);
exit;
?>
</body>
</html>