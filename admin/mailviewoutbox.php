<?php
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];

$viewoutmailid=$_REQUEST['outmailid'];

	//echo "mail".$viewmailid;
		
	
		$sql = mysql_query("SELECT smail.fld_sender,smail.fld_receiver,smail.fld_subject,smail.fld_message,smail.fld_attachments,
							smail.fld_createddate,user.fld_name,user.fld_email,user.fld_mobile,supplier.fld_fname
							FROM tbl_sendmail smail
							join tbl_user user on smail.fld_receiver = user.fld_email
							join tbl_supplierregister supplier on supplier.fld_email = smail.fld_sender
							where smail.fld_sendmailid='$viewoutmailid' group by fld_sender");		
								

	     while($row=mysql_fetch_array($sql))
	     {	
			$sender=$row['fld_sender']; 
			//$mailencrypt =md5($vwemail.time());	
			$receiver = $row['fld_receiver'];
			//$catencrypt =md5($vwemail.time()); 
			$subject = $row['fld_subject'];
			//$brndencrypt =md5($vwbrnd.time());
			$message = $row['fld_message'];
			//$prodencrypt =md5($vwprod.time());
			$sendername =$row['fld_fname'];
			
			$uuname = $row['fld_name'];
			$uuemail=$row['fld_email'];
			$uumobile =$row['fld_mobile'];
			
			//$files = $row['fld_attachments'];	 
			$attachments = $row['fld_attachments'];
			$date = $row['fld_createddate'];
			
			$newDate = date("d-m-Y", strtotime($date)); 
			
			$today=date('Y-m-d');
			if($today == $newDate)
			{
				$newDateTime = date('h:i A', strtotime($date));
			}
			else
			{
				$newDateTime = date('M j', strtotime($date));					
			}			
			
		 }
		?>
		

                                       <div id="msg_view" class="tab-pane">
											
                                            <div class="doc_view">
                                            
                                                <div class="doc_view_header">
                                                    <dl class="dl-horizontal">    
                                                    
                                                     <dt>Subject</dt>
                                                            <dd>Quotation</dd>
                                                        <dt>From</dt>
                                                            <dd><span><?php echo $sender; ?></span></dd>
                                                        <dt>To</dt>
                                                            <dd><span><?php echo $receiver; ?></span></dd>
                                                        <dt>Date</dt>
                                                           <dd><?PHP echo $newDateTime;?></dd>          
                                                   
                                                    </dl>
                                                </div>
                                                <div class="doc_view_content">
                                                
                                              		Dear <?php echo $uuname; ?>,<br/>
                                                 <?php /*?>   <br/>
                                                    Subject: <?php echo $subject; ?>       
                                                    <br/>
                                                    Message: <?php echo $message; ?>  <?php */?>                                           
                                                    <br/>
                                                    We have send the product details for your requirements.please find the attachments. 
                                                	<br/>
                                                    <br/>
                                                    With,
                                                    <br/>
                                                    <?php echo $sendername; ?>
                                                	<?php /*?><?php echo $subject;  ?>
                                                   
                                                   	<?php echo $message; ?><?php */?>
                                                   
                                                   
                                                </div>
                                                <div class="doc_view_footer clearfix">
                                                    <div class="btn-group pull-left">
                                                    <a class="btn" href="#"><i class="icon-share-alt"></i> Forward</a>
                           							<?php /*?><a class="btn" href="single_deleteoutmail.php?single_deleteoutmailid=<?php echo $viewoutmailid;?>"><i class="icon-trash"></i> Delete</a><?php */?>
                                                    </div>
                                                    <div class="pull-right">
														<?php if($attachments!="")
                                                        {
                                                        ?>
                                                   	   		   <i class="icon-adt_atach"></i>
                                                     		   <a href="<?php echo $attachments; ?>" download="<?php echo $attachments; ?>">Download</a>	
                                                        <?php 
                                                        }
                                                        ?>		
                                                    </div>
                                                </div>
                                                
                                            </div>                                           
                                           	    
                                        </div>
                                   