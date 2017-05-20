<?php
session_start();
@include("config.php");
@include('common.php');
error_reporting(E_ALL ^ E_NOTICE);
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$viewemail=$_SESSION['pstemail'];

$filds = $_GET['tablename'];
$splfilters = explode("&",$filds);
$aprvetblname = $splfilters[0];

$filds1 = $_GET['prodid'];
$splfilters1 = explode("&",$filds1);
$aprveprodid = $splfilters1[0];


$filds2 = $_GET['brandid'];
$splfilters2 = explode("&",$filds2);
$aprvebrandid = $splfilters2[0];



					$lvl3catiqry = "SELECT distinct fld_level3id,fld_level3name,fld_level2id FROM tbl_level3 where fld_delstatus in(0) and fld_tablename like '%$aprvetblname%'";
					$lvl3catiqry1 = mysql_query($lvl3catiqry);					
					while($row=mysql_fetch_array($lvl3catiqry1,MYSQL_ASSOC))
						{
						$catlevel3id = $row['fld_level3id'];
						$catlevel3name = $row['fld_level3name'];
						$catlevel2id = $row['fld_level2id'];
						}					
					$lvl2catiqry = "SELECT distinct fld_level2id,fld_level2name,fld_level1id FROM tbl_level2 where fld_delstatus in(0) and fld_level2id = '$catlevel2id'";
					$lvl2catiqry1 = mysql_query($lvl2catiqry);					
					while($row1=mysql_fetch_array($lvl2catiqry1,MYSQL_ASSOC))
						{
						$catlevel1id = $row1['fld_level1id'];
						$catlevel2name = $row1['fld_level2name'];
						$catlevel2id = $row1['fld_level2id'];
						}

					$lvlcatiqry = "SELECT distinct fld_brandid,fld_brandname FROM $aprvetblname where fld_delstatus in(9) and fld_prodid = '$aprveprodid'";
					$lvlcatiqry1 = mysql_query($lvlcatiqry);					
					while($row11=mysql_fetch_array($lvlcatiqry1,MYSQL_ASSOC))
						{
						$catbrndid = $row11['fld_brandid'];
						$catbrndname = $row11['fld_brandname'];						
						}
?>

<?php /*
$counter = mysql_query("SELECT COUNT(*) AS id FROM tbl_postrequirement pst
						join tbl_supplierregister supplier on pst.fld_category =supplier.fld_category                                                
                                                where pst.fld_quotstatus=0");
$num = mysql_fetch_array($counter);
$count = $num["id"];

*/ ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Update New Products</title>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       
        
        <div id="maincontainer" class="clearfix">
		
            <!-- header -->
				<?php 
			include("header.php");
			?>
			<!-- header -->
			
            <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">X</button>
                        <h3>New Mail(s)</h3>
                    </div>
                    <div class="modal-body">
                    
                    <?php
					if($count!=0)
					{
					?>
                    
                        <div class="alert alert-info">You Have <?php echo $count; ?> Mail(s)</div>
                        <?php
					}
					else
					{
						?>
                        <div class="alert alert-info">You Have No New Mail(s)</div>
                        <?php
					}
					?>
                        <?php 
						if($count>0)
						{
						?>
                        
                        <table class="table table-condensed table-striped" data-provides="rowlink">
                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Sender</th>
                                    <th>Link</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                             <?php
		                                                // $sql="SELECT * FROM tbl_postrequirement order by fld_createddate ASC";	
													
$sql = mysql_query("SELECT distinct user.fld_name,user.fld_email,suppplier.fld_fname,post.fld_postid,
post.fld_category,post.fld_subcategory,post.fld_brand,post.fld_createddate FROM `tbl_postrequirement` post
join `tbl_supplierregister` suppplier on post.fld_city = suppplier.fld_cityid
and suppplier.fld_category = post.fld_category
and suppplier.fld_subcategory = post.fld_subcategory
and suppplier.fld_brand = post.fld_brand
join `tbl_user` user on post.fld_userid = user.fld_userid
where post.fld_quotstatus=0 and suppplier.fld_userstatus=1");				

                                                        while($rows=mysql_fetch_array($sql))
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
														$newDateTime = date('jS \of F Y h:i:s A', strtotime($postdate));
														$_SESSION['createddate'] =$rows['fld_createddate'];
														$crddate = $_SESSION['createddate'];								
														$link="<a href='matrix.php?username=$postname&category=$postcat&subcategory=$postsubcat&subminicategory=$postsubminicat&brand=$postbrnd'>Click here</a>";                                                        
								?>
														<tr class="unread">
															<td>Quotation</td>
															<td><a href="javascript:void(0)"><?php  echo $postemaail;?></a></td>
															<td><?php echo $link; ?></td>
															<td><?php echo $newDateTime; ?></td>
														</tr>
								<?php														
								}														
								?>  
                                
                            </tbody>
                        </table>
                        
                        <?php
						}
						?>						
                    </div>
                    <div class="modal-footer">
                        <a href="mailbox.php" class="btn">Go to mailbox</a>
                    </div>
                </div>                
            </header>            
            <!-- main content -->
            <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
						  <div id="response"style="margin-left:60%"></div>
							<h3 class="heading">Update New Products</h3>
							<form id="form1" name="form1" method="post" enctype="multipart/form-data">	
							<div id="preview" style="display:none;"></div>
								<div id="prods" style="float:left" class="span6">
									<div class="row-fluid">
										<div class="span12">
											<label>Category Name<span class="f_req">*</span></label>											
											<select id="categoriesSelect" name="categoriesSelect" class="span8">												
												<?php												
												$catiqry = "SELECT distinct fld_level1id,fld_level1name FROM tbl_level1 where fld_delstatus in(0, 1)";
												$catiqry1 = mysql_query($catiqry);
												
												while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
													{
													$catid = $row['fld_level1id'];
													$catname = $row['fld_level1name'];																		
													?>
													<option value="<?php echo $catid;?>" <?php if($catlevel1id == $catid) echo 'selected'; ?>><?php echo $catname; ?></option>
													<!--<option value="<?php echo $catid;?>"><?php echo $catname; ?></option>-->
													<?php                                          
													}
												?>   
											</select>
											<!--<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div>-->
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<label>Sub Category Name<span class="f_req" >*</span></label>											
											<select id="subcatSelect" name="subcatSelect" class="span8">
											<?php											
											$subcatqry = "SELECT Distinct fld_level2id,fld_level2name FROM tbl_level2 where fld_level1id='$catlevel1id' Order by fld_level2name ASC";
											$subcatqry1 = mysql_query($subcatqry);
											?>											
											<?php
											while($row=mysql_fetch_array($subcatqry1,MYSQL_ASSOC))
											{
												$subcatid = $row['fld_level2id'];
												$subcatname = $row['fld_level2name'];
												$subcatname1 = ucwords($subcatname); 	
											?>
											<!--<option value="<?php echo $subcatid; ?>"><?php echo $subcatname1; ?></option>    -->
												<option value="<?php echo $subcatid;?>" <?php if($catlevel2id == $subcatid) echo 'selected'; ?>><?php echo $subcatname1; ?></option>
											<?php	
											}
											?>
											
											</select>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<label>Sub Mini Category Name<span class="f_req">*</span></label>											
											<select id='subminicatSelect' name="subminicatSelect" class="span8">											
											<?php											
											$subcatqry = "SELECT distinct fld_level3id,fld_level3name,fld_tablename FROM tbl_level3 where fld_level2id='$catlevel2id'";
											$subcatqry1 = mysql_query($subcatqry);
											?>											
											<?php
											while($row=mysql_fetch_array($subcatqry1,MYSQL_ASSOC))
											{
												$subminicatid = $row['fld_level3id'];
												$subminicatname = $row['fld_level3name'];
												$subminicatname1 = ucwords($subminicatname);							
											?>
										<!--<option value="<?php echo $subminicatid; ?>"><?php echo $subminicatname1; ?></option>-->
										<option value="<?php echo $subminicatid;?>" <?php if($catlevel3id == $subminicatid) echo 'selected'; ?>><?php echo $subminicatname1; ?></option>											<?php											
											}
											?>												
											
											</select>												
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<label>Brand Name<span class="f_req">*</span></label>										
											<select id='brandSelect' name="brandSelect" class="span8">											
											<?php											
											$brndqry = "SELECT distinct fld_brandid,fld_brandname FROM $aprvetblname where fld_delstatus=9 ORDER BY fld_brandname ASC";
											$brndqry1 = mysql_query($brndqry);
											
											while($row=mysql_fetch_array($brndqry1,MYSQL_ASSOC))
											{
											$brandid = $row['fld_brandid'];
											$brandname = $row['fld_brandname'];
											$brandname1 = ucwords($brandname);
											?>											
											<option value="<?php echo $brandid;?>" <?php if($aprvebrandid == $brandid) echo 'selected'; ?>><?php echo $brandname1; ?></option>
											<?php
											}
											?>											
											</select>												
										</div>
									</div>									
									<div class="row-fluid">
										<div class="span12">											
											<label>Product Name<span class="f_req">*</span></label>
											<?php											
											$prodqry = "SELECT distinct fld_prodid,fld_prodname,fld_prodimage FROM $aprvetblname where fld_delstatus=9 and fld_prodid ='$aprveprodid'";
											$prodqry1 = mysql_query($prodqry);
											
											while($row=mysql_fetch_array($prodqry1,MYSQL_ASSOC))
											{
											$prodid = $row['fld_prodid'];
											$prodname = $row['fld_prodname'];
											$prodimage = $row['fld_prodimage'];
											$thumbpath = '../product_images/';
											$productimages = $thumbpath.$prodimage;										
											}
											?>
											<textarea name="prodname" id="prodname" cols="10" rows="2" class="span8"><?php echo $prodname;?></textarea>										
										</div>
									</div>		
									<!--<div class="row-fluid">
											<div class="span12">
									<input type="file" name="fupload" id="fupload" multiple onkeydown="if (event.keyCode == 13) document.getElementById('btnab').click()" />
									</div>
									</div>-->
										<div class="row-fluid">
											<div class="span12">											
  												<label>Product Image<span class="f_req"></span></label>
												<div class="controls">
												<div data-provides="fileupload" class="fileupload fileupload-new">
												
												<?php
												 if(file_exists($productimages))
												 {
												 ?>
												 <div style="width: 80px; height: 80px;" class="fileupload-new thumbnail">
												 <img src="<?php echo $productimages;?>" alt="<?php echo $prodname;?>"/>
												 </div>
												 <?php
												 }
												 else
												 {
												 ?>
												<div style="width: 80px; height: 80px;" class="fileupload-new thumbnail">
												<img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="" />
												</div>
												 <?php
												 }
												 ?>												
												
												<div style="width: 80px; height: 80px; line-height: 80px;" class="fileupload-preview fileupload-exists thumbnail"></div>
												<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="fupload" name="fupload" /></span>
												<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
											</div> 
										</div>
									</div>
								</div>
								
								
								<div class="form-actions">									
								<input class="btn btn-inverse" type="button" id="btnedit" onclick="fn_approveprods('<?php echo $aprveprodid, $aprvetblname; ?>')" value="Approve"/>
								<input class="btn btn-inverse" type="button" id="btnedit" onclick="fn_deleteprods('<?php echo $aprveprodid, $aprvetblname; ?>')" value="Delete"/>
								<a class="btn btn-inverse" href="new_products.php">Cancel</a>								
								</div>										
								<div id="divmsgbox"></div>
								</div>
								<div class="span1">
								</div>
								<div id="prodspecs" style="float:right" class="span5">
								</div>
							</form>
                        </div>
                    </div>                   
                </div>
            </div>            
			<?php
			 @include("leftpanel.php");
			 ?>
      <!--<script type="text/javascript">
		$(document).ready(function() {	
		$("#categoriesSelect").change(function(){		
		var catid = $(this).val();			
		$.ajax({
		type: "POST",
		url:"cascadedropdown.php?op=subcat&catid="+catid,
		dataType: "html",
		//data: "data="+data,
		beforeSend: function() {
		//alert("Before send");
		//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
		// $('#response').html('<div class="msgboxinfo"><img src='ajax-loaderdrop.gif'/></div>');
		$("#response").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		},
		success: function(data) {
		$('#response').html('');
		$("#subcatSelect").html(data);		
		//$("#submakeSelect").html("<option value='0'>Select Model</option>");
		}
		});
		});
		
		$("#subcatSelect").change(function(){		
		var subcatid = $(this).val();			
		var catid = $("#categoriesSelect").val();	
		$.ajax({
		type: "POST",
		url: "cascadedropdown.php?op=subminicat&subcatid="+subcatid+"&catid="+catid,
		dataType: "html",
		//data: "data="+data,
		beforeSend: function() {
			//alert("Before send");
		//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
		// $('#response').html('<div class="msgboxinfo"><img src='ajax-loaderdrop.gif'/></div>');
		$("#response").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		},
		success: function(data) {
		$('#response').html('');
		$("#subminicatSelect").html(data);		
		//$("#submakeSelect").html("<option value='0'>Select Model</option>");
		}
		});
		});		
		
		$("#subminicatSelect").change(function(){		
		var subminicatid = $(this).val();			
		var subcatid = $("#subcatSelect").val();
		var catid = $("#categoriesSelect").val();	
		$.ajax({
		type: "POST",
		url: "cascadedropdown.php?op=brand&subcatid="+subcatid+"&catid="+catid+"&subminicatid="+subminicatid,
		dataType: "html",
		//data: "data="+data,
		beforeSend: function() {
			//alert("Before send");
		//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
		// $('#response').html('<div class="msgboxinfo"><img src='ajax-loaderdrop.gif'/></div>');
		$("#response").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		},
		success: function(data) {
		$('#response').html('');
		$("#brandSelect").html(data);		
		//$("#submakeSelect").html("<option value='0'>Select Model</option>");
		}
		});
		});		
		
		$("#brandSelect1").change(function(){		
		var brandid = $(this).val();
		var subminicatid = $("#subminicatSelect").val();			
		var subcatid = $("#subcatSelect").val();
		var catid = $("#categoriesSelect").val();	
		$.ajax({
		type: "POST",
		url: "cascadedropdown.php?op=product&subcatid="+subcatid+"&catid="+catid+"&subminicatid="+subminicatid+"&brandid="+brandid,
		dataType: "html",
		//data: "data="+data,
		beforeSend: function() {
			//alert("Before send");
		//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
		// $('#response').html('<div class="msgboxinfo"><img src='ajax-loaderdrop.gif'/></div>');
		$("#response").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		},
		success: function(data) {
		$('#response').html('');
		$("#productSelect").html(data);		
		//$("#submakeSelect").html("<option value='0'>Select Model</option>");
		}
		});
		});	
				
});

</script>-->


<script type="text/javascript" >   
    function fn_approveprods(prdid,tblname)
    {
	var x = confirm("Are you sure you want to Approve?");
	if (x)
	{
	var url="approve_product.php";
    url=url+"?approdid="+prdid+"&op=updcat"	
	xmlhttp1_updcat=GetXmlHttpObject_show();
    if (xmlhttp1_updcat==null)
    {
    alert ("Your browser does not support XMLHTTP!");
    return;
    }
    xmlhttp1_updcat.onreadystatechange=showgroupsss1;
    try
    {
    xmlhttp1_updcat.open("GET",url,true)
    }
    catch(e1)
    {
    document.write("error1")
    }
    xmlhttp1_updcat.send()
    }
	
    function showgroupsss1()
    {
    if (xmlhttp1_updcat.readyState==4 || xmlhttp1_updcat.readyState=="complete")
    {
    var res=xmlhttp1_updcat.responseText.trim();    
    if(res=="Successful")
    {
    alert("Product Approved");
    location.href= "new_products.php";
    }
    else
    {
    alert("Product Approval Failed");    
    location.href="new_products.php";
    }
    }
    } 
	
	}
	function fn_deleteprods(prdid,tblname)
    {	
	
	var x = confirm("Are you sure you want to Delete?");
	if (x)
	{
	var url="approve_product.php";
    url=url+"?approdid="+prdid+"&op=delcat"	
	xmlhttp1_updcat=GetXmlHttpObject_show();
    if (xmlhttp1_updcat==null)
    {
    alert ("Your browser does not support XMLHTTP!");
    return;
    }
    xmlhttp1_updcat.onreadystatechange=showgroups1;
    try
    {
    xmlhttp1_updcat.open("GET",url,true)
    }
    catch(e1)
    {
    document.write("error1")
    }
    xmlhttp1_updcat.send()
    }
	
    function showgroups1()
    {
    if (xmlhttp1_updcat.readyState==4 || xmlhttp1_updcat.readyState=="complete")
    {
    var res=xmlhttp1_updcat.responseText.trim();    
    if(res=="Successful")
    {
    alert("Product is Deleted");
    location.href= "new_products.php";
    }
    else
    {
    alert("Failed");    
    location.href="new_products.php";
    }
    }
    }	
	}
	
	function GetXmlHttpObject_show()
    {
    var objXMLHttp_show2=null
    if(window.XMLHttpRequest)
    {
    objXMLHttp_show2=new XMLHttpRequest()
    }
    else if(window.ActiveXObject)
    {
    objXMLHttp_show2=new ActiveXObject("Microsoft.XMLHTTP")
    }
    return objXMLHttp_show2;
    }	
    </script>

<script type="text/javascript">
	$(document).ready(function() {	
		var brandid = $(this).val();
		var subminicatid = $("#subminicatSelect").val();			
		var subcatid = $("#subcatSelect").val();
		var catid = $("#categoriesSelect").val();	
		$.ajax({
		type: "POST",
		url: "aprveproductspecs.php?op=productspecs&subcatid="+subcatid+"&catid="+catid+"&subminicatid="+subminicatid+"&brandid="+brandid+"&prodid="+<?php echo $prodid; ?>,
		dataType: "html",
		//data: "data="+data,
		beforeSend: function() {
			//alert("Before send");
		//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
		// $('#response').html('<div class="msgboxinfo"><img src='ajax-loaderdrop.gif'/></div>');
		$("#response").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		},
		success: function(data) {
		$('#response').html('');
		//alert(data);
		$("#prodspecs").html(data);
		//$("#submakeSelect").html("<option value='0'>Select Model</option>");
		}
		});
		});	

	</script>	
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	
<!--<script>
	function fn_suppprodsave()
	{
		var category = $("#categoriesSelect").val();
		var subcategory = $("#subcatSelect").val();
		var subminicategory = $("#subminicatSelect").val();
		var brand = $("#brandSelect").val();
		var productname = $("#prodname").val();
		var price = $("#txtprice").val();		
		var proddesc = $("#proddesc").val();		
		var prodspecs = $("#prodspecifications").val();			
		if(category == "0"){
		alert("Select Category Name");
		$("#categoriesSelect").focus();
		return false;
		}
		if(subcategory == "0"){
		alert("Select SubCategory Name");
		$("#subcatSelect").focus();
		return false;
		}
		if(subminicategory == "0"){
		alert("Select SubminiCategory Name");
		$("#subminicatSelect").focus();
		return false;
		}
		if(brand == "0"){
		alert("Select Brand Name");
		$("#brandSelect").focus();
		return false;
		}
		if(productname == ""){
			alert("Enter Product Name");
			$("#prodname").focus();
			return false;
		}
		if(prodspecs == "0"){
		alert("Select Atleast One!");
		$("#prodspecifications").focus();
		return false;
		}
		if(price == ""){
			alert("Enter Product Price");
			$("#txtprice").focus();
			return false;
		}		
		if(proddesc == ""){
			alert("Enter Product Description");
			$("#proddesc").focus();
			return false;
		}		
		var str = $("#form3").serialize();
		$("#form1").ajaxForm({		
				type:"POST",                                                	  				
				url:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+'productname'+"&prodimage="+fileinput,
				data: {		
				"formData" : str
				},
				datatype : 'html',
				success: function(data)
				{			
				alert(data);
				$('#rightpanel').html(data);        
				}		
		}).submit();
	}
</script>-->

 <script type="text/javascript" language="javascript">
	$(document).ready(function (e) {
	$("#btnsavesuppprod").on('click',(function(e) {
		e.preventDefault();				
		var category = $("#categoriesSelect").val();
		var catname = $("#categoriesSelect option:selected").text();
		var subcategory = $("#subcatSelect").val();
		var subcatname = $("#subcatSelect option:selected").text();
		var subminicategory = $("#subminicatSelect").val();
		var subminicatname = $("#subminicatSelect option:selected").text();
		var brand = $("#brandSelect").val();		
		var productname = $("#prodname").val();
		var price = $("#txtprice").val();		
		var proddesc = $("#proddesc").val();		
		var prodspecs = $("#prodspecifications").val();
		//var fuploads = $("#fileinput").val();
		//var imagname = catname.concat(subcatname,subminicatname,fuploads); 
		if(category == "0"){
		alert("Select Category Name");
		$("#categoriesSelect").focus();
		return false;
		}
		if(subcategory == "0"){
		alert("Select SubCategory Name");
		$("#subcatSelect").focus();
		return false;
		}
		if(subminicategory == "0"){
		alert("Select SubminiCategory Name");
		$("#subminicatSelect").focus();
		return false;
		}
		if(brand == "0"){
		alert("Select Brand Name");
		$("#brandSelect").focus();
		return false;
		}
		if(productname == ""){
			alert("Enter Product Name");
			$("#prodname").focus();
			return false;
		}
		if(prodspecs == "0"){
		alert("Select Atleast One!");
		$("#prodspecifications").focus();
		return false;
		}
		if(price == ""){
			alert("Enter Product Price");
			$("#txtprice").focus();
			return false;
		}		
		if(proddesc == ""){
			alert("Enter Product Description");
			$("#proddesc").focus();
			return false;
		}
		
		var fupload = $("#fupload").val();	
		if(fupload == ""){
			alert("Please choose the image");
			$("#fupload").focus();
			return false;
		}		
			
			var Data = $("#form3").serialize();
		
			$("#divmsgbox").html("<div class='msgboxinfo'><img src='ajax-loaderdrop.gif'/></div>");
		
			$("#form1").ajaxForm({
			url:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+productname,
			    data: 
				{		
				"formData" : Data,				
				},				
				datatype : 'html',
				success: function(data)
				{			
				//alert(data);
				alert("Product is added Successfully");				
				$('#rightpanel').html(data);        
				location.reload();
				},
				target: '#preview'
			}).submit();
		
			// $.ajax({				
			//	type:"POST",                                                	  				
			//	url	:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+productname+"&prodimage="+fuploads,
			//	data: 
			//	{		
			//	"formData" : Data,				
			//	},				
			//	datatype : 'html',
			//	success: function(data)
			//	{			
			//	alert(data);
			//	alert("Product is added Successfully");				
			//	$('#rightpanel').html(data);        
			//	location.reload();
			//	}	
			// });
					
	}));
});
 </script>
 <!--<script>
  $(document).ready(function (e) {  	
		$("#form1").on('submit',(function(e) {
		var category = $("#categoriesSelect").val();
		var catname = $("#categoriesSelect option:selected").text();
		var subcategory = $("#subcatSelect").val();
		var subcatname = $("#subcatSelect option:selected").text();
		var subminicategory = $("#subminicatSelect").val();
		var subminicatname = $("#subminicatSelect option:selected").text();
		var brand = $("#brandSelect").val();
		var productname = $("#prodname").val();
		var price = $("#txtprice").val();		
		var proddesc = $("#proddesc").val();		
		var prodspecs = $("#prodspecifications").val();	

		//var imagname = catname.concat(subcatname,subminicatname,fuploads); 
		if(category == "0"){
		alert("Select Category Name");
		$("#categoriesSelect").focus();
		return false;
		}
		if(subcategory == "0"){
		alert("Select SubCategory Name");
		$("#subcatSelect").focus();
		return false;
		}
		if(subminicategory == "0"){
		alert("Select SubminiCategory Name");
		$("#subminicatSelect").focus();
		return false;
		}
		if(brand == "0"){
		alert("Select Brand Name");
		$("#brandSelect").focus();
		return false;
		}
		if(productname == ""){
			alert("Enter Product Name");
			$("#prodname").focus();
			return false;
		}
		if(prodspecs == "0"){
		alert("Select Atleast One!");
		$("#prodspecifications").focus();
		return false;
		}
		if(price == ""){
			alert("Enter Product Price");
			$("#txtprice").focus();
			return false;
		}		
		if(proddesc == ""){
			alert("Enter Product Description");
			$("#proddesc").focus();
			return false;
		}		
		var Data = $("#form3").serialize();		
		var fuploads = document.getElementById("uploadImage");
		file = fuploads.files[0];
		Data.append("image", file);				
		$("#form1").ajaxForm({
                        type : "POST",                                                	  				
						url	:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+'productname'+"&prodimage="+fuploads,					
						data	: {
                        "formData" : Data
                        },
                        datatype : 'html',						
						beforeSend: function() {
						//$("#divbottommsg").html('<div class="msgboxinfo" style="width:300px;">Loading Please wait... </div>');
						 $("#response").html("<div class='msgboxinfo'><img src='ajax-loader.gif'/></div>");
						},
						success: function(data) {
							alert(data);
							alert("Product is added Successfully");
							location.reload();
						}
                     }).submit();
		e.preventDefault();
      });
   });
   </script>-->	
   
       <script type="text/javascript" src="jquery/jquery.form.js"></script>
       <script type="text/javascript" src="jquery/jquery.min.js"></script>	   
	   
<script>
function fn_yes()
{
	 alert('Photo Is Uploaded Successfully');
		$('#divmsgbox').html('');
		window.location="dashboard.php";
		
}
function fn_error()
{
	alert('Size is too large. Choose another one');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="dashboard.php";
}
function fn_errorimgaa()
{
	alert('Invalid Image Extension');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="dashboard.php";
	
}


</script>

<!--<script type="text/javascript">
   
        $(document).ready(function()
        {
            function compress(data)
            {
            data = data.replace(/([^&=]+=)([^&]*)(.*?)&\1([^&]*)/g, "$1$2,$4$3");
            return /([^&=]+=).*?&\1/.test(data) ? compress(data) : data;
            }       
        
            function showValues()
            {   
                var str = $("#specform").serialize(); 
				alert(str);              
                $.ajax({
                        type	: "POST",                                                	  				
						url	:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+'productname'+"&prodimage="+fileinput,
						data	: {		
                        "formData" : str
                        },
                        datatype : 'html',
                        success: function(data)
                        {			
						alert(data);
                        $('#rightpanel').html(data);        
                        }
                     });
            }           
            showValues();
        });
</script>-->


</div>

    </body>
	   
       <script type="text/javascript" src="jquery/jquery.form.js"></script>
       <script type="text/javascript" src="jquery/jquery.min.js"></script>
</html>