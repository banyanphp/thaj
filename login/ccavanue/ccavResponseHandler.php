<?php require "../include/config.php";
require "../include/money_format_class.php"; 
?>
<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='307E3E4BC3A992610AA5992CC791CBA5';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==10)	$order_amount=$information[1];
		if($i==3)	$order_status=$information[1];
		if($i==0)	$orderid=$information[1];
	}
	 //echo $orderid;
    // echo $order_status;
	if($order_status==="Success")
	{
		
	unset($session_id);
	$dupsesid=$session_id;
	session_regenerate_id();
	$session_id=session_id();
    $ord_date=date('Y-m-d H:i:s');



$selpro_statusitem=mysqli_query($con,"select * from tbl_order_details where ord_id='".$orderid."'") or die(mysqli_error());
$rpro_statusitem=mysqli_fetch_array($selpro_statusitem);


		

	
	


		$upd=mysqli_query($con,"update tbl_order_details set payment='Collected',pg='ca',ord_total_amount='$order_amount',ord_wstatus='W',ord_status='Y',ord_date='".date('Y-m-d H:i:s')."' where ord_id='".$orderid."'") or die(mysqli_error());
		

	$order_session=mysqli_query($con,"select * from tbl_order_details where  ord_id='".$orderid."'");
	$res_order_session= mysqli_fetch_array($order_session);
	
	$seluname_billing=mysqli_query($con,"select * from tbl_users where user_id='".$res_order_session['user_id']."'") or die(mysqli_error());
    $runame_billing=mysqli_fetch_array($seluname_billing);

	
	$order_session_cost=mysqli_query($con,"select sum(total_amount) as cost from tbl_order_items where ord_id='".$orderid."'");
	$res_order_session_cost= mysqli_fetch_array($order_session_cost);

	
	$seluname_del=mysqli_query($con,"select * from tbl_delivery_address where user_id='".$rpro_statusitem['user_id']."' and del_id='".$runame_billing['user_address_del']."'") or die(mysqli_error());
    $runame_del=mysqli_fetch_array($seluname_del);
	
	
	$to1=$runame_billing['user_email'];
	$sub1='Order Confirmation Details - '.$result['fromname'];


			$address=explode("|||",$runame_billing['user_address']);
			
			$add1=$address[0];
			$add2=$address[1];
			
			$selectcou=mysqli_query($con,"select * from tbl_country_list where cl_id='".$runame_billing['cl_id']."'") or die(mysqli_error());
			$rescou=mysqli_fetch_array($selectcou);
			
			$selectstat=mysqli_query($con,"select * from tbl_state where state_id='".$runame_billing['user_state']."'") or die(mysqli_error());
			$resstat=mysqli_fetch_array($selectstat);
			
			$selectcityb=mysqli_query($con,"select * from tbl_city where city_id='".$runame_billing['user_city']."'") or die(mysqli_error());
			$rescityb=mysqli_fetch_array($selectcityb);
	
	$message1='  <table width="680" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#fff; border:10px solid #CECECE;">
		<tr>
			<td style="padding-top:10px;"><table style="padding:8px 0 0 15px;" border="0" cellspacing="0" width="97%">
			  <tbody>
				<tr>
				  <td width="50%" style="font-size:12px; border-bottom:1px solid #EEEEEE;border-top:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding:5px 0 8px 10px;	line-height:20px;">
				  <img src="http://iiyndinai.com/images/iiyndinai_logo.png" alt="IIYNDINAI" width="200" height="120" title="IIYNDINAI">
                <p>IIYNDINAI ORGANIC FOODS<br/>
 No:18, 3rd Main Road,<br/>
Dhandeeswaram nagar, Velachery, Chennai-600 042,<br/>
Tamil Nadu, India<br>
Contact Us : +91 9600136699</td>
					
					
									  <td width="50%" height="30" style="font-size:12px; border-bottom:1px solid #EEEEEE;border-top:1px solid #EEEEEE; border-left:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding:5px 0 8px 10px;	line-height:20px;">
									  <strong>Date  </strong>            :  ' .date('d-m-Y',strtotime($rpro_statusitem['ord_date'])).'<br />
									  <strong>Order Id</strong>          :  '.$rpro_statusitem['ord_number'].'<br />
									 <strong> Payment Method</strong>    :   ONLINE<br />
									  <strong>TIN NO</strong>            :   33071581056<br />
									  <strong>CST NO</strong>            :    690161  dt 31-12-1996
				  </td>';
			    $message1.='</tr>';
			 $message1.=' </tbody>
			</table></td>
  </tr>';

						$message1.='
		  <tr>
			<td style="padding-top:10px;"><table style="padding:8px 0 0 15px;" border="0" cellspacing="0" width="97%">
			  <tbody>
				<tr>
				 <td width="40%" style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE; border-left:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE;	line-height:20px;">Billing Address :</td>

				  <td  width="40%" height="30" style="font-size:12px; background:#FBFBFB; border-left:1px solid #EEEEEE; border-top:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	line-height:20px;">Delivery Address :</td>
				  <td  width="20%" height="30" style="font-size:12px; background:#FBFBFB; border-left:1px solid #EEEEEE; border-top:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	line-height:20px;">Pay Status :</td>
				</tr>
				<tr>';
				
				$city_did=$runame_billing['user_address_del'];
				
			$seluname_del=mysqli_query($con,"select * from tbl_delivery_address where user_id='".$runame_billing['user_id']."' and del_id='".$city_did."'") or die(mysqli_error());
           $runame_del=mysqli_fetch_array($seluname_del);

			$selectcou1=mysqli_query($con,"select * from tbl_country_list where cl_id='".$runame_del['user_dcountry']."'") or die(mysqli_error());
			$rescou1=mysqli_fetch_array($selectcou1);
			
			$selectstat1=mysqli_query($con,"select * from tbl_state where state_id='".$runame_del['user_dstate']."'") or die(mysqli_error());
			$resstat1=mysqli_fetch_array($selectstat1);
			
			$selectcity1=mysqli_query($con,"select * from tbl_city where city_id='".$runame_del['user_dcity']."'") or die(mysqli_error());
			$rescity1=mysqli_fetch_array($selectcity1);

				  $message1.='<td width="40%" style="font-size:12px;border-left:1px solid #EEEEEE; border-bottom:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding:5px 0 8px 10px;	line-height:20px;">
				  '.$add1.',<br />
				  '.$add2.',<br />
				  '.$runame_billing['user_zip'].',<br />
				  '.$rescityb['city_name'] .',<br />
				  '.$resstat['state_name'] .',<br />
				  '.$rescou['cl_name'].'.
				  </td>
					
					
									  <td width="40%" height="30" style="font-size:12px; border-bottom:1px solid #EEEEEE; border-left:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding:5px 0 8px 10px;	line-height:20px;">
									  '.$runame_del['user_address'].',<br />
									  '.$runame_del['user_zip'].',<br />
									  '.$rescityd['city_name'].',<br />
									  '.$resstated['state_name'].',<br />
									  '.$rescoud['cl_name'].'.
				  </td>
									  <td width="20%" height="30" style="font-size:12px; border-bottom:1px solid #EEEEEE; border-left:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding:5px 0 8px 10px;	line-height:20px;">	PAID</td>';
        
				   $message1.='</tr>';
			 $message1.=' </tbody>
			</table></td>
		  </tr>
		  
		  
		  <tr>
			<td height="32"  style="font-size:12px;	font-family:Arial, Helvetica, sans-serif;	color:#FF6600;	text-align:left; padding-bottom:3px; padding-left:15px; font-weight:800;	line-height:20px;">Order Details</td>
		  </tr>
		  <tr>
			<td><table align="center" border="0" cellspacing="0" width="96%">
			  <tbody>
				<tr>
				  <td height="30" style="font-size:12px; background:#FBFBFB; border-left:1px solid #EEEEEE; border-top:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE;	line-height:20px;">Product Description</td>
				  <td style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left;padding-left:10px;	line-height:20px; border-bottom:1px solid #EEEEEE;">Product Size</td>
				  				  <td style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left;padding-left:10px;	line-height:20px; border-bottom:1px solid #EEEEEE;">Rate</td>
				  				  <td style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left;padding-left:10px;	line-height:20px; border-bottom:1px solid #EEEEEE;">Quantity</td>
				  <td width="22%" style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE;	line-height:20px;">Amount</td>
				  <td width="22%" style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE;	line-height:20px;">Tax</td>
				  <td width="22%" style="font-size:12px; background:#FBFBFB; border-top:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;border-bottom:1px solid #EEEEEE;	line-height:20px;">Total</td>
				</tr>';
				$select=mysqli_query($con,"select * from tbl_order_items where ord_id='".$orderid."'") or die(mysqli_error());
				$k=0;	
				$k1=1;	
					while($res=mysqli_fetch_array($select))
					{
						
						$city_did=$runame_billing['user_address_del'];
					
			$selectcou=mysqli_query($con,"select * from tbl_country_list where cl_id='".$runame_billing['cl_id']."'") or die(mysqli_error());
			$rescou=mysqli_fetch_array($selectcou);
			
			$selectstat=mysqli_query($con,"select * from tbl_state where state_id='".$runame_billing['user_state']."'") or die(mysqli_error());
			$resstat=mysqli_fetch_array($selectstat);
			
			$selectcity=mysqli_query($con,"select * from tbl_city where city_id='".$runame_billing['user_city']."'") or die(mysqli_error());
			$rescity=mysqli_fetch_array($selectcity);
			
				$seluname_del=mysqli_query($con,"select * from tbl_delivery_address where user_id='".$runame_billing['user_id']."' and del_id='".$city_did."'") or die(mysqli_error());
                $runame_del=mysqli_fetch_array($seluname_del);



			$selprod=mysqli_query($con,"select * from tbl_product where prod_id='".$res['prod_id']."'") or die(mysqli_error());
			$rprod=mysqli_fetch_array($selprod);
				
				$sel_tax_amount=mysqli_query($con,"select sum(prod_tcost) as taxamount from tbl_product where prod_id='".$prod_id."'") or die(mysqli_error());
				$r_tax_amount=mysqli_fetch_array($sel_tax_amount);
				
				$pt=$rprod['prod_cost']/100*$rprod['prod_tax'];
				$rate=$rprod['prod_cost']-$pt;
				
				$aaa=$res['taxamount']*$res['quantity']+$res['taxcost'];
				
					$tp=0;
					
                        if($rprod['prod_name']!=""){
						$message1.='<tr>
						<td height="30" style="font-size:12px; background:#F5F5F5; border-bottom:1px solid #EEEEEE; border-left:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">'.$rprod['prod_name'].' - '.$rprod['prod_code'];
						}
						
						
						
						$message1.='</td>
						<td style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">'.$res['size'].'</td>
						<td style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">Rs. '.$rate.'</td>
						<td style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">'.$res['quantity'].'</td>';
						
						if($rprod['prod_name']!=""){
						$message1.='<td width="22%" style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">Rs '.$res['taxamount']*$res['quantity'];
						}
						else
						{
						$message1.='<td width="22%" style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE; border-right:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">Rs '.$res['taxcost']*$res['quantity'];
						}
						$message1.='<td style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">Rs.'.$res['taxcost'].'('.$rprod['prod_tax'].'%)</td>';
						
						$message1.='<td style="font-size:12px; background:#FBFBFB; border-bottom:1px solid #EEEEEE;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:left; padding-left:10px;	line-height:20px;">Rs  '.$aaa.'</td>';

						$message1.='</tr>';
							$sub_total12=$res['taxamount']*$res['quantity']+$sub_total12+$res['taxcost'];
							$tax_total=$tax_total + $res['taxcost'];
						
				$k++;
				$k1++;
				}
			  $message1.='</tbody>
			</table></td>
		  </tr>';
						
						$message1.='		  <tr>
			<td  style="font-size:13px;	font-family:Arial, Helvetica, sans-serif;	color:#5D5D5D;	text-align:right; padding-right:20px; padding-top:8px; font-weight:800;	line-height:20px;">Grand Total : <span style="color:#298E01;">Rs '.$res_order_session['ord_total_amount'].'</span></td>
		  </tr>';
		 $message1.=' 
<tr>
                	<td colspan="10"><p style="font-size:10px; line-height:15px; text-align:justify; padding:10px;">&nbsp;</p></td>
                </tr>
                <tr>
                	<td colspan="10" align="right" ><p style="margin-right:10px;"><strong>FOR IIYNDINAI</strong></p></td>
                </tr>
                <tr>
                	<td colspan="10" align="left">
                    <div style="float:left; width:40%;"><p><strong>E: contact@iiyndinai.com</strong></p></div>
                    <div style="float:right; margin-right:10px;"><p><strong>W: www.iiyndinai.com</strong></p></div>
                    </td>
                </tr>		  <tr>
			<td>&nbsp;</td>
		  </tr>
		</table></td>
	  </tr>
	  <tr>
		<td align="center"><img src="'.$result['set_url'].'/images/mail-bottom.gif"/></td>
	  </tr>
	  <tr>
		<td style="font-size:11px; font-family:Arial, Helvetica, sans-serif; padding-bottom:15px; color:#828282; text-align:center; line-height:20px;">Email :<a href="mailto:'.$result['set_email'].'
	" style="color:#a8a8a8; text-decoration:none;">'.$result['set_email'].'</a> <span style="padding-left:50px; color:#828282;">Website :</span> <a href="'.$result['set_url'].'" target="_blank" style="color:#a8a8a8; text-decoration:none;">'.$result['set_url'].'</a></td>
	  </tr>
	</table>';
	//echo $message;
	//echo $message1;
	//echo $message3;exit;

	$headers1  = "MIME-Version: 1.0" . "\r\n";
	$headers1 .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
	$headers1 .= "From: $fromname1 <$from1>" . "\r\n";
    $headers2 .= 'Cc: sales@iiyndinai.com,testcrb@gmail.com' . "\r\n";
	@mail($to1, $sub1, $message1, $headers1);
	

	echo '<script language="javascript">window.location.href="'.$result['set_url'].'/thanks.php?id='.$orderid.'";</script>';

		
	}
	else if($order_status==="Aborted")
	{
		
		//echo "update tbl_order_details set payment='Failed',pg='cc',ord_total_amount='$order_amount',ord_wstatus='W',ord_status='N',ord_date='".date('Y-m-d H:i:s')."' where ord_id='".$orderid."'";
			$upd=mysqli_query($con,"update tbl_order_details set payment='Failed',pg='ca',ord_total_amount='$order_amount',ord_wstatus='W',ord_status='N',ord_date='".date('Y-m-d H:i:s')."' where ord_id='".$orderid."'") or die(mysqli_error());
	unset($_SESSION['ntot']);
	unset($_SESSION['register_new']);
	unset($_SESSION['delivery']);
	unset($_SESSION['comment']);
	unset($_SESSION['pay']);
	unset($_SESSION['order']);
	unset($session_id);
	$dupsesid=$session_id;
	session_regenerate_id();
	$session_id=session_id();
	echo '<script language="javascript">window.location.href="'.$result['set_url'].'/ccavenue-fail.php?id='.$orderid.'";</script>';


	}
	else if($order_status==="Failure")
	{
		

			$upd=mysqli_query($con,"update tbl_order_details set payment='Failed',pg='ca',ord_total_amount='$order_amount',ord_wstatus='W',ord_status='N',ord_date='".date('Y-m-d H:i:s')."' where ord_id='".$orderid."'") or die(mysqli_error());
	unset($_SESSION['ntot']);
	unset($_SESSION['register_new']);
	unset($_SESSION['delivery']);
	unset($_SESSION['comment']);
	unset($_SESSION['pay']);
	unset($_SESSION['order']);
	unset($session_id);
	$dupsesid=$session_id;
	session_regenerate_id();
	$session_id=session_id();
	echo '<script language="javascript">window.location.href="'.$result['set_url'].'/ccavenue-fail.php?id='.$orderid.'";</script>';
	}
	else
	{
		echo "<br>Security Error. Illegal access detected";
	
	}

?>
