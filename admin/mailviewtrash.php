<?php
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];

$viewmailid=$_REQUEST['tradshmailid'];

	//echo "mail".$viewmailid;
	
		$sql = mysql_query("SELECT user.fld_name,user.fld_email,suppplier.fld_fname,post.fld_postid,post.fld_category,post.fld_subcategory,post.fld_brand,post.fld_createddate,post.fld_attachments FROM `tbl_postrequirement` post 
														join `tbl_user` user on post.fld_userid = user.fld_userid
														join `tbl_supplierregister` suppplier on  suppplier.fld_category = post.fld_category
														and suppplier.fld_subcategory = post.fld_subcategory
														
														and suppplier.fld_brand = post.fld_brand
														where post.fld_quotstatus=1 and post.fld_postid ='$viewmailid'");		
								

	    while($row=mysql_fetch_array($sql))
	     {	
			$vwemail=$row['fld_email']; 
			$vwname = $row['fld_name'];
			//$mailencrypt =md5($vwemail.time());	
			$vwcat = $row['fld_category'];
			
			$vwsubcat = $row['fld_subcategory'];
						
			//$catencrypt =md5($vwemail.time());
			$vwbrnd = $row['fld_brand'];
			
			//$brndencrypt =md5($vwbrnd.time());

			//$prodencrypt =md5($vwprod.time());
			$vwdate = $row['fld_createddate'];	 
			$attachments = $row['fld_attachments']; 
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
			$link="<a href='matrix.php?mail=$viewmailid&category=$vwcat&subcategoy=$vwsubcat&brand=$vwbrnd'><img src='View_Quotation.png'></a>";                                          
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
                           <a class="btn" href="#"><i class="icon-share-alt"></i> Forward</a>
                           							<?php /*?><a class="btn" href="single_deletetrashmail.php?single_deletetrashmailid=<?php echo $viewmailid;?>"><i class="icon-trash"></i> Delete</a><?php */?>
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
                        <a href="<?php echo $attachments; ?>" download="<?php echo $attachments; ?>">Download</a>	
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
