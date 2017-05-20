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
if($_POST && isset($_POST['email'])){

  $uname = $_SESSION['user'];
$name = mysql_real_escape_string($_REQUEST['name']);
$email = mysql_real_escape_string($_REQUEST['email']);
$mobile = mysql_real_escape_string($_REQUEST['mobile']);
$gender = mysql_real_escape_string($_REQUEST['gender']);
$zip = mysql_real_escape_string($_REQUEST['zip']);
$country = mysql_real_escape_string($_REQUEST['country']);
$state = mysql_real_escape_string($_REQUEST['state']);
$city = mysql_real_escape_string($_REQUEST['city']);
$address = mysql_real_escape_string($_REQUEST['address']);
$modeofconsultant = mysql_real_escape_string($_REQUEST['modeofconsultant']);
$datetime = mysql_real_escape_string($_REQUEST['datetime']);
$enddatetime = mysql_real_escape_string($_REQUEST['enddatetime']);
$datetime = trim($datetime);
$enddatetime= substr($enddatetime, 0, -3);
$doctor = mysql_real_escape_string($_REQUEST['doctor']);
$speciality = mysql_real_escape_string($_REQUEST['speciality']);
$timedate = mysql_real_escape_string($_REQUEST['date']);
$details= mysql_real_escape_string($_REQUEST['details']);
$amount= mysql_real_escape_string($_REQUEST['amount']);
$current_time = date("Y-m-d");
$update = date("Y-m-d");
if($_REQUEST['othersname']!=""){
$othersname=mysql_real_escape_string($_REQUEST['othersname']);
}
else{
 $othersname="";   
}
if($_REQUEST['othergender']!=""){
$othergender=mysql_real_escape_string($_REQUEST['othergender']);
}
else{
 $othergender="";   
}
if($_REQUEST['othersage']!=""){
$othersage=mysql_real_escape_string($_REQUEST['othersage']);
}
else{
 $othersage="";   
}
$age=mysql_real_escape_string($_REQUEST['age']);
$num = rand();
   function GetImageExtension($imagetype) {

            if (empty($imagetype))
                return false;

            switch ($imagetype) {

                case 'image/bmp': return '.bmp';

                case 'image/gif': return '.gif';

                case 'image/jpeg': return '.jpg';

                case 'image/png': return '.png';

                default: return false;
            }
        }
      $file_name = $_FILES["uploadedimage"]["name"];

        $temp_name = $_FILES["uploadedimage"]["tmp_name"];

        $imgtype = $_FILES["uploadedimage"]["type"];

        $ext = GetImageExtension($imgtype);

        $imagename = date("d-m-Y") . "-" . time();
$imagename.=$temp_name;


        $target_path = "../prescription/" . $imagename;

        move_uploaded_file($temp_name, $target_path);

   $info = mysql_fetch_array(mysql_query("select * from tbl_doctors where fld_id='$doctor'"));
$fld_doctor_fees=$info['fld_doctor_fees'];
 $datetimemd = date('Y-m-d H:i:s');
 $videourl = md5($datetimemd);
 $url = "https://appear.in/".$videourl;
 $_SESSION['url']=$url;
 $count=mysql_num_rows(mysql_query("select * from  tbl_patientlist where `fld_dcname`='$doctor' and consultant_date='$timedate' and fld_datetime='$datetime' " ));
if($count!=0){
    echo "<script>
    window.location.href='../alreadyused.php'
     </script>";
}
if($count==0){
	$payment_request = json_encode($_POST);
mysql_query("INSERT INTO `tbl_patientlist`(`fld_name`, `fld_gender`, `fld_email`, `fld_phone`, `fld_address`, `fld_pincode`, `fld_country`, `fld_state`, `fld_city`, `fld_dcname`, `fld_specility`, `fld_datetime`,`fld_enddatetime`, `fld_modeofconsult`, `fld_createdon`, `fld_updatedon`, `fld_delstatus`, `consultant_date`, `user`,`details`,`image`,`othersname`,`othersage`,`othersgender`,`age`,`fld_video_url`,`payment_status`,`payment_request`,`fl_amount`) VALUES 
('$name','$gender','$email','$mobile','$address','$zip','$country','$state','$city','$doctor','$speciality','$datetime','$enddatetime','$modeofconsultant','$datetimemd','$datetimemd','1','$timedate','$uname','$details','$imagename','$othersname','$othersage','$othergender','$age','$url','0','$payment_request','$amount')") or die(mysql_error());
$get_insert_id = mysql_insert_id();
$_SESSION['plog_id'] = $get_insert_id;
}

    $val = $_POST;


    $_SESSION['iv'] = $val['iv'];
    $_SESSION['key']   = $val['key'];

    $transactionRequestBean = new TransactionRequestBean();
    //Setting all values here
    $transactionRequestBean->setMerchantCode($val['mrctCode']);
    $transactionRequestBean->setAccountNo($val['tpvAccntNo']);
    $transactionRequestBean->setITC($val['itc']);
    $transactionRequestBean->setMobileNumber($val['mobile']);

    $transactionRequestBean->setCustomerName($val['name']);
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
    $transactionRequestBean->setemail($val['email']);
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

    }elseif(is_string($response) && preg_match('/^txn_status=/',$response)){
	
	}

   echo "<script>window.location = '".$response."'</script>";
    ob_flush();

}

else if($_POST){

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

    echo "<br><br><br><br>";
//print_r (explode("|",$response));
  //$data = explode("|",$response);
$decryptValues=explode('|', $response);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==1)	$payment_status=$information[1];
		if($i==3)	$order_status=$information[1];
		if($i==0)	$orderid=$information[1];
	}
					  
	if($payment_status==="success")
	{
         
             $url=$_SESSION['url'];
           
//update payment status 

	$p_id = $_SESSION['plog_id'];
	$payment_log_update = mysql_query("update tbl_patientlist set payment_response='$response', payment_status = '1' where fld_id ='$p_id'")or die(mysql_error());
	
	$query=	mysql_query("update tbl_patientlist set payment_status='1', `fld_payment_transaction_id`='test'  where fld_video_url='$url'")or die(mysql_error());
	
               if($query){
                  $_SESSION['msg']='y';
                   ?><script>
                      
                       window.location.href='../transaction.php';
                   </script>
                       <?php
               }
	
	}
	if($payment_status==="failure")
	{ 
               $url=$_SESSION['url'];
		mysql_query("DELETE FROM `tbl_patientlist` WHERE fld_video_url='$url' and payment_status='0'") or die(mysql_error());

                  $_SESSION['msg']='n';
                 ?><script>
                     
                       window.location.href='../transaction.php';
                   </script>
                       <?php
	
	}
	
   // session_destroy();
                      ?>

    <a href='<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['SCRIPT_NAME'];?>'>GO TO HOME</a>

    <?php
    exit;
}

?>
<?php
											 $root_url  	 = $_SERVER['HTTP_HOST'];
$root_url 	.= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
$base_url	 = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443) ? 'https://'.$root_url : 'http://'.$root_url;
											 ?>

<script>
                     
                       window.location.href='<?php echo $root_url."validate/"; ?>';
                   </script>
<html>
<body>
<form method="post" action="https://www.tekprocess.co.in/PaymentGateway/txnreq.pg?id=03903acc-9e0a-4b9b-ae86-7661a353aa65">
	<table class="tbl" width="60%" border="1" cellpadding="2" cellspacing="0">
	<tr>
    	<th width="40%">Field Description</th>
        <th width="20%">Field Name</th>
    </tr>
    <tr>
    	<td><label>Request Type</label>o</td>
        <td><select name="reqType">
        	<option value="T">T</option>
        	<option value="S">S</option>
        	<option value="O">O</option>
        	<option value="R">R</option>
        	<option value="TNR">TNR</option>
        	<option value="TCI">TCI</option>
        	<option value="TWC">TWC</option>
			<option value="TRC">TRC</option>
			<option value="TCC">TCC</option>
			<option value="TWI">TWI</option>
			<option value="TIC">TIC</option>
			<option value="TIO">TIO</option>
			<option value="TWD">TWD</option>
        	</select>
        </td>
    </tr>
    <tr>
    	<td><label>Merchant Code</label></td>
        <td><input type="text" name="mrctCode" value="T112268"/></td>
    </tr>
	<tr>
    	<td><label>Merchant Transaction ID</label></td>
        <td><input type="text" name="mrctTxtID" value="<?php echo $strNo; ?>"/></td>
    </tr>
     <tr>
    	<td><label>Currency Code</label></td>
        <td><input type="text" name="currencyType" value="INR"/></td>
    </tr>
    <tr>
    	<td><label>Amount</label></td>
        <td><input type="text" name="amount" value="1.00"/></td>
    </tr>
    <tr>
    	<td><label>Client Meta Data</label></td>
        <td><input type="text" name="itc" value="NIC~TXN0001~122333~rt14154~8 mar 2014~Payment~forpayment"/></td>
    </tr>
    <tr>
    	<td><label>Request Detail</label></td>
        <td><input type="text" name="reqDetail" value="DrTh_1.0_0.0"/></td>
    </tr>
     <tr>
    	<td><label>Transaction Date</label></td>
        <td><input type="text" name="txnDate" value="<?php echo $strCurDate;?>"/></td>
    </tr>
    <tr>
    	<td><label>Bank Code</label></td>
        <td><input type="text" name="bankCode" value="470"/></td>
    </tr>
     <tr>
    	<td><label>Locator URL</label></td>
        <td><select name="locatorURL">
		        <option value="https://www.tekprocess.co.in/PaymentGateway/TransactionDetailsNew.wsdl">TEST</option>
	        	<option value="http://10.10.60.46:8080/PaymentGateway/services/TransactionDetailsNew">E2EWithIP</option>
	        	<option value="https://tpslvksrv6046/PaymentGateway/services/TransactionDetailsNew">E2EWithDomain</option>
	        	<option value="https://www.tekprocess.co.in/PaymentGateway/services/TransactionDetailsNew">UATWithDomain</option>
	        	<option value="http://10.10.102.157:8081/PaymentGateway/services/TransactionDetailsNew">UATWithIP</option>
	        	<option value="http://10.10.102.158:8081/PaymentGateway/services/TransactionDetailsNew">EAP UATWithIP</option>
				<option value="http://www.tpsl-india.in/PaymentGateway/TransactionDetailsNew.wsdl">LIVE</option>
				<option value="http://10.10.60.247:8080/PaymentGateway/services/TransactionDetailsNew">Linux E2E</option>
        	</select>
        </td>
    </tr>
	<tr>
    	<td><label>S2S URL </label></td>
        <td>
	       <input type="text" name="s2SReturnURL" value="https://tpslvksrv6046/LoginModule/DrtTh.jsp"/>
		</td>
    </tr>
    <tr>
    	<td><label>TPSL Transaction ID</label></td>
        <td><input type="text" name="tpsl_txn_id" value="NA"/></td>
    </tr>
	 <tr>
    	<td><label>Card ID</label></td>
        <td><input type="text" name="cardID" value=""/></td>
    </tr>
    <tr>
    	<td><label>Customer ID</label></td>
        <td><input type="text" name="custID" value="19872627"/></td>
    </tr>
    <tr>
    	<td><label>Customer Name</label></td>
        <td><input type="text" name="custname" value="<?php echo $name ?>"/></td>
    </tr>
	<tr>
    	<td><label>Timeout</label></td>
        <td><input type="text" name="timeOut" value=""/></td>
    </tr>
	<tr>
    	<td><label>Mobile Number</label></td>
        <td><input type="text" name="mobNo" value="<?php echo $mobile ?>"/></td>
    </tr>
	<tr>
    	<td><label>Account Number</label></td>
        <td><input type="text" name="accNo" value=""/></td>
    </tr>
	<tr>
    	<td><label>Tpv Account Number</label></td>
        <td><input type="text" name="tpvAccntNo" value=""/></td>
    </tr>
    <tr>
    	<td><label>MMID</label></td>
        <td><input type="text" name="mmid" value=""/></td>
    </tr>
	<tr>
    	<td><label>OTP</label></td>
        <td><input type="text" name="otp" value=""/></td>
    </tr>
	<tr>
    	<td><label>Transaction Type</label></td>
        <td><input type="text" name="TxnType" value=""/></td>
    </tr>
	<tr>
    	<td><label>Transaction SubType</label></td>
        <td><input type="text" name="TxnSubType" value=""/></td>
    </tr>
	<tr>
    	<td><label>Card name</label></td>
        <td><input type="text" name="cardName" value=""/></td>
    </tr>
	<tr>
    	<td><label>Card Number</label></td>
        <td><input type="text" name="cardNo" value=""/></td>
    </tr>
	<tr>
    	<td><label>Card CVV Number</label></td>
        <td><input type="text" name="cardCVV" value=""/></td>
    </tr>
	<tr>
    	<td><label>Card Exp MM</label></td>
        <td><input type="text" name="cardExpMM" value=""/></td>
    </tr>
	<tr>
    	<td><label>Card Exp YY</label></td>
        <td><input type="text" name="cardExpYY" value=""/></td>
    </tr>
	<tr>
    	<td><label>Key</label></td>
        <td><input type="text" name="key" value="8960851697CHYSTX"/></td>
    </tr>
	<tr>
    	<td><label>IV</label></td>
        <td><input type="text" name="iv" value="1319387261FPTURM"/></td>
    </tr>
	<tr>
    	<td><label>Return URL </label></td>
        <td>
	        <input type="text" name="returnURL" value='<?php echo "http://".$_SERVER["HTTP_HOST"].$_SERVER['SCRIPT_NAME'];?>'/>
		</td>
    </tr>
	<tr>
        <td colspan=2>
         <input type="submit" name="submit" value="Submit" />
        </td>
	</tr>
</table>
</form>
</body>
</html>