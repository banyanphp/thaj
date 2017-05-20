<?php
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$viewemail=$_SESSION['pstemail'];
$p = $_GET['id'];
?>


<?php /*
$counter = mysql_query("SELECT COUNT(*) AS id FROM tbl_postrequirement pst
						join tbl_supplierregister supplier on pst.fld_category=supplier.fld_level1name                                                 
                                                and pst.fld_city = supplier.fld_city
                                                where supplier.fld_userstatus=0");
$num = mysql_fetch_array($counter);
$count = $num["id"];
*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
        
        <script>
		$(function() 
		{
		var availableTags = [
								<?php
									//$sdata = "SELECT distinct fld_productname FROM tbl_product";
									
									$sdata="Select distinct supp.fld_email from tbl_postrequirement pst 
											join  tbl_supplierregister supp on pst.fld_category = supp.fld_level1name
											where supp.fld_userstatus =1";
									
									$results = mysql_query($sdata);
									while($sqry = mysql_fetch_array($results, MYSQL_ASSOC ))
									{
										$name = $sqry['fld_email'];
										$colon = "\"";
										$comma = ",";
										echo $colon.$name.$colon.$comma;
									}		
								?>					 
							];
							$("#mail_recipients").autocomplete({
							source: availableTags
							});
		});
		</script> 

<!--<script>

function setDeleteAction() {
if(confirm("Are you sure want to delete these Item(s)?")) {
document.frmInbox.action = "delete_mail.php";
document.frmInbox.submit();
}
}

function DeleteOutbox()
{
	if(confirm("Are you sure want to delete these Item(s)?")) {
		document.frmOutbox.action = "delete_mail.php";
		document.frmOutbox.submit();
	}
	
}

function DeleteTrash()
{
	if(confirm("Are you sure want to delete these Item(s)?")) {
		document.frmTrash.action = "delete_mail.php";
		document.frmTrash.submit();
	}
}

</script>-->

<script>
$('#dt_inbox').on('click', 'tr', function() {
    $(this).find('td:first :checkbox').trigger('click');
})
.on('click', ':checkbox', function(e) {
    e.stopPropagation();
    $(this).closest('tr').toggleClass('selected', this.checked);
});

</script>
<style>
table {border-collapse: collapse;}
th, td {border: 1px #DDD solid; padding: 3px 6px;}

tr.selected td {
    background: #DCE9FF;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript">
	
$(function(){
 
 	//Inbox Chkbox select all//
  
    $("#chk_allinbox").click(function () {
          $('.select_msg').attr('checked', this.checked);
    });
 
    $(".select_msg").click(function(){
 
        if($(".select_msg").length == $(".select_msg:checked").length) {
            $("#chk_allinbox").attr("checked", "checked");
        } else {
            $("#chk_allinbox").removeAttr("checked");
        }
 
    });	
	
	//Outbox Chkbox select all//
	
	 $(".chk_alloutbox").click(function () {
          $('.select_msgoutbox').attr('checked', this.checked);
    }); 
 
    $(".select_msgoutbox").click(function(){
 
        if($(".select_msgoutbox").length == $(".select_msgoutbox:checked").length) {
            $(".chk_alloutbox").attr("checked", "checked");
        } else {
            $(".chk_alloutbox").removeAttr("checked");
        }
 
    });
	
	//Trash Chkbox select all//	
	
    $(".chk_alltrash").click(function () {
          $('.select_msgtrash').attr('checked', this.checked);
    }); 
   
    $(".select_msgtrash").click(function(){
 
        if($(".select_msgtrash").length == $(".select_msgtrash:checked").length) {
            $(".chk_alltrash").attr("checked", "checked");
        } else {
            $(".chk_alltrash").removeAttr("checked");
        }
 
    });
	
	
});

	


</script>
<script src="jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript">

function mailview(mailid)
{	
	if (window.XMLHttpRequest)
		{
		xmlhttp=new XMLHttpRequest();
		}
	else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{	
		document.getElementById("msg_view").style.display="block";
		document.getElementById("jCrumbs").style.display="block";	
		//document.getElementById("headertab").style.display="none";	
		document.getElementById("dt_inbox").style.display="none";	
		document.getElementById("dt_inbox_wrapper").style.display="none";
		document.getElementById("msg_view").innerHTML=xmlhttp.responseText;
		}
    }
	xmlhttp.open("GET","mailview.php?mailid="+mailid,true);
	xmlhttp.send();
}


function mailviewoutbox(outmailid)
{	
	if (window.XMLHttpRequest)
		{
		xmlhttp=new XMLHttpRequest();

		}
	else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{		
		document.getElementById("msg_view").style.display="block";
		document.getElementById("jCrumbs").style.display="block";	
		//document.getElementById("headertab").style.display="none";	
		document.getElementById("dt_outbox").style.display="none";	
		document.getElementById("dt_outbox_wrapper").style.display="none";
		document.getElementById("msg_view").innerHTML=xmlhttp.responseText;
		}
    }
	xmlhttp.open("GET","mailviewoutbox.php?outmailid="+outmailid,true);
	xmlhttp.send();
}



function mailviewtrash(trashmailid)
{	
	if (window.XMLHttpRequest)
		{
		xmlhttp=new XMLHttpRequest();
		}
	else
		{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
	{
	if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{		
		document.getElementById("msg_view").style.display="block";
		document.getElementById("jCrumbs").style.display="block";
		//document.getElementById("headertab").style.display="none";	
		document.getElementById("dt_trash").style.display="none";	
		document.getElementById("dt_trash_wrapper").style.display="none";
		document.getElementById("msg_view").innerHTML=xmlhttp.responseText;
		}
    }
	xmlhttp.open("GET","mailviewtrash.php?tradshmailid="+trashmailid,true);
	xmlhttp.send();
}

</script>


<script type="text/javascript">
$(document).ready(function (e){
$("#new_message_form").on('submit',(function(e){
	
		var mail_sender = $("#mail_sender").val();
		alert(mail_sender);
		
		var mail_recipients = $("#mail_recipients").val();
		if(mail_recipients == "")
		{
			alert("Enter Sender Mail ID(s)");
			$("#mail_recipients").focus();
			return false;
		}
		var mail_subject = $("#mail_subject").val();
		if(mail_subject == "")
		{
			alert("Enter Subject Name");
			$("#mail_subject").focus();
			return false;
		}

		var fupload = $("#fupload").val();	
		if(fupload == ""){
		alert("Choose Attachments");
		$("#fupload").focus();
		return false;
		}
	
e.preventDefault();
$.ajax({
url: "composemail.php",
type: "POST",
data:  new FormData(this),
contentType: false,
cache: false,
processData:false,

beforeSend: function() {
		
		$("#divmsgbox").html("<div class='msgboxinfo'><center><img src='loading.gif'/></center></div>");
		// setTimeout("div.innerHTML=''",360000);
		},


success: function(data){
	alert("Mail Send Successfully");
	window.location="mailbox.php";
//$("#targetLayer").html(data);
},
error: function(){
	alert("Error");
	} 	        });
}));
});
</script>




<script>
function fn_yes()
{
	 alert('Mail Uploaded Successfully');
		$('#divmsgbox').html('');
		window.location="postreq.php";
		
}
function fn_error()
{
	alert('Size is too large. Choose another one');
	document.getElementById('divmsgbox').innerHTML='';
	//window.location="postreq.php";
	//window.location="uadmin.php";
}

function fn_errorimg()
{
	alert('Invalid Image Extension');
	document.getElementById('divmsgbox').innerHTML='';
	//window.location="postreq.php";

}
 
</script>

<!--<script>
$(document).ready(function(){
  $("#mbox_new1").click(function(){
   alert("test");
  });
}); 


</script>
-->
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>
        
        <div id="maincontainer" class="clearfix">
            <!-- header -->
			
			<?php 
			include("header.php");
			?>
            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module" style="display:none">
                            <ul>
                                <li>
                                    <a href="mailbox.php" title="Back"><i class="splashy-mail_light_left"></i></a>
                                    
                                   <!-- <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    <a href="#">Sports & Toys</a>
                                </li>
                                <li>
                                    <a href="#">Toys & Hobbies</a>
                                </li>
                                <li>
                                    <a href="#">Learning & Educational</a>
                                </li>
                                <li>
                                    <a href="#">Astronomy & Telescopes</a>
                                </li>
                                <li>
                                    Telescope 3735SX                                  
                                    -->
                                </li>
                               
                            </ul>
                        </div>
                    </nav>
                    <div id="bordermail" style="border-color:#fff">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="mbox">
                                <div class="tabbable">                               
                                
                                    <!--<div class="heading" id="headertab">
                                        <ul class="nav nav-tabs">
                                            <li><a href="#mbox_new" data-toggle="tab"><i class="splashy-document_letter_edit"></i> New message</a></li>
                                            <li class="active"><a href="#mbox_inbox" data-toggle="tab"><i class="splashy-mail_light_down"></i>  Inbox</a></li>
                                            <li><a href="#mbox_outbox" data-toggle="tab"><i class="splashy-mail_light_up"></i> Outbox</a></li>
                                            <li><a href="#mbox_trash" data-toggle="tab"><i class="icon-adt_trash"></i> Trash</a></li>
                                        </ul>
                                    </div>-->
                                    
                                    <div class="tab-content">
                                    	<?php 
									
                                  		  switch($p) {
										  case "1":
                                    	?>
                                      	<div class="tab-pane active" id="mbox_new">
                                            <form id="new_message_form" name="new_message_form" method="post" enctype="multipart/form-data">
	                                            <div id="preview" style="display:none;"></div>
                                                <div class="sepH_b">
                                                    <label for="mail_sender">Sender</label>
                                                    <select name="mail_sender" id="mail_sender" class="span4">
                                                    <option value="<?php echo $email; ?>"><?php echo $email; ?> </option>                                                       </select>
                                                </div>
                                                
                                              <!--  <div class="sepH_b">
                                                  
                                                  <div class="sepH_b">
                                                    <label>Recipient</label>
                                                    <ul id="mail_recipients"></ul>
                                                </div>   
                                                    
                                                    
                                                    <ul id="mail_recipients"></ul>
                                                </div>-->
                                             <!--   <div class="sepH_b"> 
                                                  <label>Recipient</label>                                                  
                                                 <input type="text" name="mail_recipients" id="mail_recipients"/>  
                                                </div>-->
                                                
                                                 <div class="sepH_b">
                                                    <label for="mail_subject">Recipient</label>
                                                    <input type="text" class="span12" id="mail_recipients" name="mail_recipients">
                                                </div>
                                                
                                                <div class="sepH_b">
                                                    <label for="mail_subject">Subject</label>
                                                    <input type="text" class="span12" id="mail_subject" name="mail_subject">
                                                </div>
                                                
                                                
                                                <div class="sepH_c">
                                                    <label>Attachments</label>
                                                    <input type="file" name="fupload" id="fupload" onKeyDown="if(event.keyCode == 13) document.getElementById('btnsav').click()" />
                                                </div>
                                                
                                                
                                                <!--<div class="sepH_c">
                                                    <label>Attachments</label>
                                                    <a class="add_files" id="add_files" href="#">Add files</a>
                                                    <div class="mail_uploader" id="mail_uploader">
                                                        <div class="gebo-upload" id="mail_attachments">
                                                            <p>You browser doesn't have Flash, Silverlight or HTML5 support.</p>
                                                        </div>
                                                        <span class="help-block">This files will be uploaded on form submit.</span>
                                                    </div>
                                                </div>-->
                                                <div class="formSep">
                                                    <label for="mail_message">Message</label>
                                                    <textarea class="span12 auto_expand" rows="12" cols="10" id="mail_message" name="mail_message"></textarea>
                                                </div>
                                                                                                <div>
                                          	<input type="submit" name="btnsendquotation" id="btnsendquotation" value="Send Quotation"/>
                                                     <div id="divmsgbox"></div>
                                                    <input type="hidden" name="hidoper" id="hidoper" value="0" />
                                                </div>
                                                
                                            </form>
                                        </div>
                                        <?php
										break;
										?>
                                        <?php 
										case "2":
                                    	?>
                                        
										<!--Inbox Start-->
            	                        <div class="tab-pane active" id="mbox_inbox">
                                        <form name="frmInbox" method="post" action="">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
                                               <thead>
                                                <tr>
													<th class="table_checkbox"><input type="checkbox" data-tableid="dt_inbox" class="chk_all" id="chk_allinbox" name="chk_all"></th>
													<th><i class=""></i></th>
													<th><i class="splashy-mail_light"></i></th>
													<th style="width:35%">Subject</th>
													<th style="width:35%">From</th>
													<th hidden="HID">View</th>
													<th style="width:20%">Date</th>                                                        
													<th style="width:10%"><i class="icon-adt_atach"></i></th>
                                                </tr>
                                                </thead>
											<tbody>
                                                    
                                                   <?php
		                                            // $sql="SELECT * FROM tbl_postrequirement order by fld_createddate ASC";	
													$sql ="SELECT distinct suppplier.fld_fname,post.fld_name,post.fld_postid,post.fld_category,post.fld_attachments 
													FROM `tbl_postrequirement` post 
													join `tbl_supplierregister` suppplier on post.fld_cityid = suppplier.fld_cityid and suppplier.fld_category = post.fld_category 
													where post.fld_delstatus=0 and post.fld_quotstatus=0 group by post.fld_postid";
													$sqlqry = mysql_query($sql) or die(mysql_error());
                                                        while($rows=mysql_fetch_array($sqlqry,MYSQL_ASSOC))
                                                        {
														$postname = $rows['fld_name'];
														$suppliername =$rows['fld_fname'];
														$postemaail = $rows['fld_email'];
                                                        $postid=$rows['fld_postid'];
														$postcat = $rows['fld_category'];
														$postsubcat = $rows['fld_subcategory'];
														$postsubminicat = $rows['fld_subminicategory'];
														$postbrnd = $rows['fld_brand'];
                                                        $postdate=$rows['fld_createddate'];
														//$newDate = date("d-m-Y", strtotime($postdate));
														$newDate = date("Y-m-d", strtotime($postdate));
														
														$today=date('Y-m-d');
														if($today == $newDate)
														{
															$newDateTime = date('h:i A', strtotime($postdate));
														}
														else
														{
															$newDateTime = date('M j', strtotime($postdate));		
						
														}												
														
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];	
														$attachments = $rows['fld_attachments'];
														$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&subminicategory=$postsubminicat&brand=$postbrnd&product=$postprod'>Click here</a>";                                                        ?>                                                    

                                                      <tr class="unread">
                             <td class=""><input type="checkbox" class="select_msg" name="msg_sel[]" value="<?php echo $rows["fld_postid"]; ?>" ></td>
                                                        <td class="starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_new_2"></i></td>												          
														<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)">Quotation</td>
										            	<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)"><span><?php echo $postname; ?></span></td>
                                                        <td hidden="HID" onClick="mailview(<?php echo $postid; ?>)"><span><?php echo $link; ?></span></td>
                                                        <td style="width:20%" onClick="mailview(<?php echo $postid; ?>)"><?php echo $newDateTime; ?></td>                                                        <td style="width:10%" onClick="mailview(<?php echo $postid; ?>)">
                                                     <?php
														if($attachments!="")
														{
														?>
														<i class="icon-adt_atach"></i>
                                                        </td>
                                                        <?php
														}
														?>
											  </tr>
                                             
                                             		<?php 
														}
													?>
                                                    <?php
										$sql1 ="SELECT distinct suppplier.fld_fname,post.fld_name,post.fld_postid,suppplier.fld_level1name,post.fld_createddate,post.fld_attachments 
										FROM `tbl_postrequirement` post 
										join `tbl_supplierregister` suppplier on post.fld_cityid = suppplier.fld_cityid and suppplier.fld_category = post.fld_category 
										where post.fld_delstatus=0 and post.fld_quotstatus=1 group by post.fld_postid";
														$sqlll = mysql_query($sql1) or die(mysql_error());
														while($rows=mysql_fetch_array($sqlll,MYSQL_ASSOC))
															{
															$postid=$rows['fld_postid'];	
															$postname = $rows['fld_name'];													
															$suppliername =$rows['fld_fname'];
															$postcat = $rows['fld_level1name'];														
															$postdate=$rows['fld_createddate'];
															$query = $rows['fld_query'];
															$attachments = $rows['fld_attachments'];
															$newDate = date("Y-m-d", strtotime($postdate));														
															$today=date('Y-m-d');
															if($today == $newDate)
															{
																$newDateTime = date('h:i A', strtotime($postdate));
															}
															else
															{
																$newDateTime = date('M j', strtotime($postdate));		
															}
														
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];		
														$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&subminicategory=$postsubminicat&brand=$postbrnd&product=$postprod'>Click here</a>";
														$view = "<a href='mailview.php?mailid=$postid'></a>";          
														?>                                                   
                                                <tr class="read"> 
													<td class=""><input type="checkbox" class="select_msg" name="msg_sel[]" value="<?php echo $rows["fld_postid"]; ?>" ></td>
													<td class="starSelect"><i class="splashy-star_empty mbox_star"></i></td>
													<td><i class="splashy-mail_light"></i></td>											
													<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)">Quotation</td>
													<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)"><span><?php echo $postname; ?></span></td>
													<td hidden="HID" onClick="mailview(<?php echo $postid; ?>)"><?php echo $view; ?></td>
													<td style="width:20%" onClick="mailview(<?php echo $postid; ?>)"><?php echo $newDateTime; ?></td>       
													<td style="width:10%" onClick="mailview(<?php echo $postid; ?>)">
                                        
                                          				<?php
														if($attachments!="")
														{
														?>
														<i class="icon-adt_atach"></i>
                                                        </td>
                                                        <?php
														}
														?>
												</tr>  
                                                        <?php 
														}
														?>   
                                                </tbody>                                                    	

                                            </table>    
                                            </form>
                                        </div>
                                        
                                          <?php 
										 break;                                 		
                                    	  ?>
                                        <?php
										case "3":
										?>                         
										<!--Outbox Start-->
                                   	    <div class="tab-pane active" id="mbox_outbox">
                                          <form name="frmOutbox" method="post" action="">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_outbox">
                                                <thead>
                                                    <tr>
                                                        <th class="table_checkbox"><input type="checkbox" data-tableid="dt_outbox" class="chk_alloutbox" name="chk_alloutbox"></th>
                                                        <th><i class="splashy-star_empty"></i></th>
                                                        <th><i class="splashy-mail_light"></i></th>
                                                        <th style="width:35%">Subject</th>
                                                        <th style="width:35%">Receiver</th>
														<th hidden="d">Link</th>
                                                        <th style="width:20%">Date</th>
                                                        <th style="width:10%"><i class="icon-adt_atach"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
														<?php		                                                
                                                        
                                                        $sql2 ="SELECT * FROM tbl_sendmail smail 
                                                        where smail.fld_delstatus=0 and smail.fld_sender like '$email'";
														$sql2qry = mysql_query($sql2) or die(mysql_error());   
                                                        while($rows=mysql_fetch_array($sql2qry,MYSQL_ASSOC))
                                                        {
                                                        $smailid=$rows['fld_sendmailid'];
                                                        $sreceiver = $rows['fld_receiver'];
                                                        $ssubject=$rows['fld_subject'];
                                                        $smessage = $rows['fld_message'];
                                                        $scdate = $rows['fld_createddate'];	
                                                        $attachments = $rows['fld_attachments'];
                                                        $newDate = date("d-m-Y", strtotime($scdate));
														
														$today=date('Y-m-d');
														if($today == $newDate)
														{
															$newDateTime = date('h:i A', strtotime($scdate));
														}
														else
														{
															$newDateTime = date('M j', strtotime($scdate));		
						
														}														
														
                                                        $_SESSION['createddate'] =$rows['fld_createddate'];
                                                        $crddate = $_SESSION['createddate'];							
                                                        $link="<a href='matrix.php?username=$postname&category=$postcat&brand=$postbrnd&product=$postprod'>Click here</a>";                                                        ?>
                                                    <tr>
                                                        <td class="nohref"><input type="checkbox" class="select_msgoutbox" name="msg_selout[]" value="<?php echo $rows["fld_smailid"]; ?>" ></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_right"></i></td>
                                                        <td style="width:35%" onClick="mailviewoutbox(<?php echo $smailid; ?>)"><?php echo $ssubject; ?></a></td>
                                                        <td style="width:35%" onClick="mailviewoutbox(<?php echo $smailid; ?>)"><span><?php echo $sreceiver;?></span></td>
                                                        <td hidden="d" onClick="mailviewoutbox(<?php echo $smailid; ?>)"><?php echo $link; ?></td>
                                                        <td style="width:20%" onClick="mailviewoutbox(<?php echo $smailid; ?>)"><?php echo $newDateTime;?></td>
                                                        <td style="width:10%" onClick="mailviewoutbox(<?php echo $smailid; ?>)">
														<?php
														if($attachments!="")
														{
														?>
														<i class="icon-adt_atach"></i>
                                                        </td>
                                                        <?php
														}
														?>
                                                    </tr>
                                                    
                                                        <?php
														}
														?>
                                                    
                                                </tbody>

                                            </table>
                                            </form>
                                        </div>                                        
										<!--Outbox End-->
                                        <?php
										break;
										?>
                                        <?php
										case "4":
										?>
                                        <!--Trash Start-->                                         
    	                             	<div class="tab-pane active" id="mbox_trash">
                                       <form name="frmTrash" method="post" action="">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_trash">
                                                <thead>
                                                    <tr>
                                                        <th class="table_checkbox"><input type="checkbox" data-tableid="dt_trash" class="chk_alltrash" name="chk_alltrash"></th>
                                                        <th><i class="splashy-star_empty"></i></th>
                                                        <th><i class="splashy-mail_light"></i></th>
                                                        <th style="width:35%">Subject</th>
                                                        <th style="width:35%">From</th>
                                                        <th hidden="tr">Link</th>
                                                        <th style="width:20%">Date</th>
                                                        <th style="width:10%"><i class="icon-adt_atach"></i></th>
                                                    </tr>
                                                </thead>                                               
                                                  	
                                                <tbody>
                                                
                                                <?php
		                                                // $sql="SELECT * FROM tbl_postrequirement order by fld_createddate ASC";	
													
		echo $refinesubminicatproduct1 = "SELECT distinct suppplier.fld_fname,post.fld_name,post.fld_postid,post.fld_category,post.fld_attachments FROM `tbl_postrequirement` post join `tbl_supplierregister` suppplier on post.fld_cityid = suppplier.fld_cityid and suppplier.fld_category = post.fld_category where post.fld_delstatus=2 group by post.fld_postid";
															
														$refinesubminicatproduct11 = mysql_query($refinesubminicatproduct1) or die(mysql_error());														 
														while($rows=mysql_fetch_array($refinesubminicatproduct11,MYSQL_ASSOC))
                                                        {
                                                        $trpostid=$rows['fld_postid'];
														$trpostname = $rows['fld_name'];														
														$postcat = $rows['fld_category'];
														$postsubcat = $rows['fld_subcateogry'];
														$postbrnd = $rows['fld_brand'];														
                                                        $postdate=$rows['fld_createddate'];
														$attachtrash = $rows['fld_attachments'];
														$newDate = date("d-m-Y", strtotime($postdate));
														
														$today=date('Y-m-d');
														if($today == $newDate)
														{
															$newDateTime = date('h:i A', strtotime($postdate));
														}
														else
														{
															$newDateTime = date('M j', strtotime($postdate));		
						
														}			
														
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];
														$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&brand=$postbrnd&product=$postprod'>Click here</a>";                                                        ?>                                               
                                                
                                                    <tr>
              	 <td class="nohref"><input type="checkbox" class="select_msgtrash" name="msg_seltrash[]" value="<?php echo $rows["fld_postid"]; ?>" s></td>
                                                        <td class="nohref starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_stuffed"></i></td>
                                                        <td style="width:35%" onClick="mailviewtrash(<?php echo $trpostid; ?>)"><a href="#"><?php echo "Quotation"; ?></a></td>
                                                        <td style="width:35%" onClick="mailviewtrash(<?php echo $trpostid; ?>)"><span><?php echo $trpostname; ?></span></td>
                                                        <td hidden="tr" onClick="mailviewtrash(<?php echo $trpostid; ?>)"><?php echo $link; ?></td>
                                                        <td style="width:20%" onClick="mailviewtrash(<?php echo $trpostid; ?>)"><?php echo $newDateTime; ?></td>
                                                        <td style="width:10%" onClick="mailviewtrash(<?php echo $trpostid; ?>)">
                                                        
                                                       	<?php
														if($attachtrash!="" || $attachtrash!= null)
														{
														?>
														<i class="icon-adt_atach"></i>
                                                        </td>
                                                        <?php
														}
														?>                                                      
                                                        
                                                        
                                                    </tr>
                                                <?php
														}
														?>  
                                                 
                                                </tbody>
                                                
                                            </table>
                                            </form>
                                        </div>	                                        
                                        <!--Trash End--> 
                                        <?php
										break;										
										?>
                                       <?php
									   default:
									   ?>
                                       <div class="tab-pane active" id="mbox_inbox">
                                        <form name="frmInbox" method="post" action="">
                                            <table data-msg_rowlink="a" class="table table_vam mbox_table dTableR" id="dt_inbox">
                                               <thead>
                                                    <tr>
												    <th class="table_checkbox"><input type="checkbox" data-tableid="dt_inbox" class="chk_all" id="chk_allinbox" name="chk_all"></th>
													<th><i class=""></i></th>
													<th><i class="splashy-mail_light"></i></th>
													<th style="width:35%">Subject</th>
													<th style="width:35%">From</th>
													<th hidden="HID">View</th>
													<th style="width:20%">Date</th>                                                        
													<th style="width:10%"><i class="icon-adt_atach"></i></th>
                                                    </tr>
                                                    </thead>
													<tbody>
                                                   <?php
		                                            // $sql="SELECT * FROM tbl_postrequirement order by fld_createddate ASC";	
													$refinesubminicatproduct1 = "SELECT distinct suppplier.fld_fname,post.fld_name,post.fld_postid,post.fld_category,post.fld_attachments,post.fld_createddate FROM `tbl_postrequirement` post join `tbl_supplierregister` suppplier on post.fld_cityid = suppplier.fld_cityid and suppplier.fld_category = post.fld_category where post.fld_delstatus=0 and post.fld_quotstatus=0 group by post.fld_postid";															
														$refinesubminicatproduct11 = mysql_query($refinesubminicatproduct1) or die(mysql_error());     
														while($rows=mysql_fetch_array($refinesubminicatproduct11,MYSQL_ASSOC))                                                
                                                        {
														$postname = $rows['fld_name'];
														$suppliername =$rows['fld_fname'];
														//$postemaail = $rows['fld_email'];
                                                        $postid=$rows['fld_postid'];
														$postcat = $rows['fld_category'];														
                                                        $postdate=$rows['fld_createddate'];
														//$newDate = date("d-m-Y", strtotime($postdate));
														$newDate = date("Y-m-d", strtotime($postdate));
														
														$today=date('Y-m-d');
														if($today == $newDate)
														{
															$newDateTime = date('h:i A', strtotime($postdate));
														}
														else
														{
															$newDateTime = date('M j', strtotime($postdate));		
														}
														
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];	
														$attachments = $rows['fld_attachments'];					
														$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&subminicategory=$postsubminicat&brand=$postbrnd&product=$postprod'>Click here</a>";                                                   
													?>
                                                        <tr class="unread">
														<td class=""><input type="checkbox" class="select_msg" name="msg_sel[]" value="<?php echo $rows["fld_postid"]; ?>" ></td>
                                                        <td class="starSelect"><i class="splashy-star_empty mbox_star"></i></td>
                                                        <td><i class="splashy-mail_light_new_2"></i></td>
														<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)">Quotation</td>
										            	<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)"><span><?php echo $postname; ?></span></td>
                                                        <td hidden="HID" onClick="mailview(<?php echo $postid; ?>)"><span><?php echo $link; ?></span></td>
                                                        <td style="width:20%" onClick="mailview(<?php echo $postid; ?>)"><?php echo $newDateTime; ?></td>                                                        <td style="width:10%" onClick="mailview(<?php echo $postid; ?>)">
                                                     <?php
														if($attachments!="")
														{
														?>
														<i class="icon-adt_atach"></i>
                                                        </td>
                                                        <?php
														}
														?>
														</tr>                                             
                                             		  <?php 
														}
														?>
														<!--    Read messages-->
                                                        <?php		                                                
														$refinesubminicatproduct1 = "SELECT distinct suppplier.fld_fname,post.fld_name,post.fld_postid,post.fld_category,post.fld_attachments,post.fld_createddate FROM `tbl_postrequirement` post join `tbl_supplierregister` suppplier on post.fld_cityid = suppplier.fld_cityid and suppplier.fld_category = post.fld_category where post.fld_delstatus=0 and post.fld_quotstatus=1 group by post.fld_postid";															
														$refinesubminicatproduct11 = mysql_query($refinesubminicatproduct1) or die(mysql_error());     
														while($rows=mysql_fetch_array($refinesubminicatproduct11,MYSQL_ASSOC))
                                                        {
                                                        $postid=$rows['fld_postid'];	
														$postname = $rows['fld_name'];													
														$suppliername =$rows['fld_fname'];
														$postcat = $rows['fld_category'];
														$postdate=$rows['fld_createddate'];
														$query = $rows['fld_query'];
														$attachments = $rows['fld_attachments'];
														$postdate=$rows['fld_createddate'];
														//$newDate = date("d-m-Y", strtotime($postdate));
														$newDate = date("Y-m-d", strtotime($postdate));
														
														$today=date('Y-m-d');
														if($today == $newDate)
														{
															$newDateTime = date('h:i A', strtotime($postdate));
														}
														else
														{
															$newDateTime = date('M j', strtotime($postdate));		
						
														}
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];		
									$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&subminicategory=$postsubminicat&brand=$postbrnd&product=$postprod'>Click here</a>";                            $view = "<a href='mailview.php?mailid=$postid'></a>";          
														?>
                                                        <tr class="read">
															<td class=""><input type="checkbox" class="select_msg" name="msg_sel[]" value="<?php echo $rows["fld_postid"]; ?>" ></td>
															<td class="starSelect"><i class="splashy-star_empty mbox_star"></i></td>
															<td><i class="splashy-mail_light"></i></td>
															<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)">Quotation</td>
															<td style="width:35%" onClick="mailview(<?php echo $postid; ?>)"><span><?php echo $postname; ?></span></td>
															<td hidden="HID" onClick="mailview(<?php echo $postid; ?>)"><?php echo $view; ?></td>
															<td style="width:20%" onClick="mailview(<?php echo $postid; ?>)"><?php echo $newDateTime; ?></td>       
															<td style="width:10%" onClick="mailview(<?php echo $postid; ?>)">
                                        
															<?php
															if($attachments!="")
															{
															?>
															<i class="icon-adt_atach"></i>
															</td>
															<?php
															}
															?>
														</tr>  
															<?php 
															}
															?>
                                                </tbody>                                                    	

                                            </table>    
                                            </form>
                                        </div>
                                       <?php									  
										  }
									   ?>
                                       <!--Inbox End-->                                                                      
	                                          <div id="msg_view" class="tab-pane">
											
                                            <div class="doc_view">
                                                <div class="doc_view_header">
                                                    <dl class="dl-horizontal">    
                                                    
                                                     <dt>Subject</dt>
                                                            <dd>Quotation</dd>
                                                        <dt>From</dt>
                                                            <dd><span></span></dd>
                                                        <dt>To</dt>
                                                            <dd><span></span></dd>
                                                        <dt>Date</dt>
                                                            <dd></dd>
                                                                
                                                    </dl>
                                                </div>
                                                <div class="doc_view_content">
                                                    Tamilselvan
                                                   
                                                </div>
                                                <div class="doc_view_footer clearfix">
                                                    <div class="btn-group pull-left">
                                                        <a class="btn" href="javascript:void(0)"><i class="icon-pencil"></i> Answer</a>
                                                        <a class="btn" href="javascript:void(0)"><i class="icon-share-alt"></i> Forward</a>
                                                       
                                                    </div>
                                                    <div class="pull-right">
                                                        Size: 240 KB
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>       
                                        
                                       <div id="reply" class="tab-pane">
											
                                            <div class="doc_view">
                                                <div class="doc_view_header">
                                                    <dl class="dl-horizontal">    
                                                    
                                                     <dt>Subject</dt>
                                                            <dd>Quotation</dd>
                                                        <dt>From</dt>
                                                            <dd><span></span></dd>
                                                        <dt>To</dt>
                                                            <dd><span></span></dd>
                                                        <dt>Date</dt>
                                                            <dd></dd>
                                                                
                                                    </dl>
                                                </div>
                                                <div class="doc_view_content">
                                                    Tamilselvan
                                                   
                                                </div>
                                                <div class="doc_view_footer clearfix">
                                                    <div class="btn-group pull-left">
                                                        <a class="btn" href="javascript:void(0)"><i class="icon-pencil"></i> Answer</a>
                                                        <a class="btn" href="javascript:void(0)"><i class="icon-share-alt"></i> Forward</a>                                                    </div>
                                                    <div class="pull-right">
                                                        Size: 240 KB
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    </div>
                    
                 
                    <!-- hide elements -->
                    <div class="hide">
                        <!-- actions for inbox -->
                        <div class="dt_inbox_actions">
                            <div class="btn-group">    
                           		 <a href="javascript:void(0)" class="btn" title="Resend"><i class="icon-share-alt"></i></a>                                                            
                               <!-- <a href="#" class="delete_msg btn" title="Delete" data-tableid="dt_inbox" onClick="setDeleteAction()";><i class="icon-trash"></i></a>-->
                            </div>
                        </div>
                        <!-- actions for outbox -->
                        <div class="dt_outbox_actions">
                            <div class="btn-group">
                                <!--<a href="javascript:void(0)" class="btn" title="Resend"><i class="icon-share-alt"></i></a>-->
                               <!-- <a href="#" class="btn" title="Delete" data-tableid="dt_outbox" onClick="DeleteOutbox()";><i class="icon-trash"></i></a>-->
                            </div>
                        </div>
                        <!-- actions for trash -->
                        <div class="dt_trash_actions">
                            <div class="btn-group">
                               <!-- <a href="#" class="btn" title="Delete permamently" data-tableid="dt_trash" onClick="DeleteTrash()";><i class="icon-trash"></i></a>-->
                            </div>
                        </div>
                        <!-- confirmation box -->
                        <!--<div id="confirm_dialog">
                            <div class="cbox_content">
                                <div class="sepH_c tac"><strong>Are you sure you want to delete this message(s)?</strong></div>
                                <div class="tac">
                                    <a href="#" class="btn btn-gebo confirm_yes">Yes</a>
                                    <a href="#" class="btn confirm_no">No</a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                        
                </div>
            </div>
            
             <?php
			 @include("leftpanel.php");
			 ?>
          
        </div>
    </body>
</html>