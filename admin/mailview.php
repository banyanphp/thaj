<?php
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];

$viewmailid=$_REQUEST['mailid'];

	//echo "mail".$viewmailid;
	
		$Reademail = mysql_query("Update tbl_postrequirement SET fld_quotstatus =1 WHERE fld_postid='$viewmailid'");
	
		$sql ="SELECT suppplier.fld_fname,suppplier.fld_category,suppplier.fld_level1name,post.fld_postid,post.fld_email,post.fld_name,post.fld_createddate,post.fld_attachments,post.fld_cityid FROM `tbl_postrequirement` post join `tbl_supplierregister` suppplier on  suppplier.fld_category=post.fld_category and post.fld_cityid = suppplier.fld_cityid
 where post.fld_quotstatus=1 and post.fld_postid ='$viewmailid' group by post.fld_postid";	
		$sqlqry = mysql_query($sql) or die(mysql_error());
		while($row=mysql_fetch_array($sqlqry,MYSQL_ASSOC))
	     {	
			$vwemail=$row['fld_email']; 
			$vwname = $row['fld_name'];
			//$mailencrypt =md5($vwemail.time());	
			$vwcat = $row['fld_category'];
			//$catencrypt =md5($vwemail.time());
			//$brndencrypt =md5($vwbrnd.time());
			//$prodencrypt =md5($vwprod.time());
			$quotcity = $row['fld_cityid'];
			$quotcat = $row['fld_category'];
			//$quotsubcat = $row['fld_subcategory'];
			//$quotbrand = $row['fld_brand'];
			$vwdate = $row['fld_createddate'];	 
			$attachments = $row['fld_attachments']; 
			$attach = "../";
			$attachmnts = $attach.$attachments;
			//$newDate = date("d-m-Y", strtotime($vwdate)); 
			
			$newDate = date("Y-m-d", strtotime($vwdate));
			
			$today=date('Y-m-d');
			if($today == $newDate)
			{
				$newDateTime = date('h:i A', strtotime($vwdate));
			}
			else
			{
				$newDateTime = date('M j', strtotime($vwdate));		

			}
			
			
			$vwquery= $row['fld_query'];
			$link="<a href='matrix.php?mail=$viewmailid&category=$quotcat&city=$quotcity'><img src='View_Quotation.png'></a>";                                          
		 }
		?>
  

<!DOCTYPE html>
<html>
<head>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("p").slideToggle();
  });
});
</script>-->
</head>

<body>

 <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>        
        
        <div id="msg_view" class="tab-pane">
                
                <div class="doc_view">
                
                    <div class="doc_view_header">
                        <dl class="dl-horizontal">    
                        
                         <dt>Subject</dt>
                                <dd>Quotation</dd>
                            <dt>From</dt>
                                <dd><span><?php echo $vwemail; ?></span></dd>
                            <dt>To</dt>
                                <dd><span><?php echo $email; ?></span></dd>
                            <dt>Date</dt>
                               <dd><?PHP echo $newDateTime;?></dd>  
                               
        
                       
                        </dl>
                    </div>
                    <div class="doc_view_content">
                    Dear <?php echo $uname; ?>, 
                    <br/>
                    <br/>
                    We need some products as mentioned brands in attached file.please find it.
                    <br/>
                    <br/>
                    Thanks,<br/>
                    <?php echo $vwname; ?>
                    <div>
                    </div>
                     <?php /*?>/*  <?php echo "<img src='post.jpg' title='view'> "; ?><?php */?>
                       
                       <?php echo $vwquery; ?>
                       
                    </div>
                    <div class="doc_view_footer clearfix">
                        <div class="btn-group pull-left">
                            <a class="btn" href="#" id="btnfrwrdmail"><i class="icon-share-alt"></i> Forward</a>
                            
                        </div>
                        
                        <div class="pull-right">
                        <div style="float:left">
                         <?php echo $link; ?>
                        </div>
							&nbsp;
							&nbsp;
							&nbsp;
                        <div style="float:right">
                         <?php if($attachments!="")
						{
					    ?>
                        <i class="icon-adt_atach"></i>
						<a href="<?php echo $attachmnts;?>" download>Download</a>
                        
                        <?php 
						}
						?>		                        
                        
                           <?php echo $attachsize; ?>
                        </div>
                        </div>
                        

                    </div>
                    
                </div>                                           
                    
            </div>                                        
            
        <div id="divreply" name="divreply" style="display:none">                                      
          
                 <div class="doc_view">
                  <div class="doc_view_content">
                
<td><input type="text" name="txtreplymail" id="txtreplymail" value="<?php echo $vwemail; ?>" style="width:100%" /></td>
<td><input type="text" name="txtreplymail" id="txtreplymail" value="<?php echo "admin@build99.com"; ?>" style="width:100%" disabled="disabled" /></td>
                  </div>                                                
                </div>  
            </div>         


</body>
</html>
