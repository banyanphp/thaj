<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
@include("config.php");
@include('common.php');
@include("user_sessioncheck.php");
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$viewemail=$_SESSION['pstemail'];
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
        <title>Dashboard</title>
		
		<style>
			.table tbody tr.rowlink:hover td {background-color: #efefef}
			
		</style>
    </head>
    <body>
        <div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>       
        
        <div id="maincontainer" class="clearfix">
		
            <!-- header -->
				<?php 
			include("header.php");
			?>
			<!-- header -->
			
          <div id="contentwrapper">
                <div class="main_content">
                    <div class="row-fluid">
                        <div class="span12">
						  <div id="response"style="margin-left:60%"></div>
							<h3 class="heading">View Doctors List</h3>
							<form id="form1" name="form1" method="post">	
								<div id="prods" style="float:left" class="span6">
									<div class="row-fluid">
										<div class="span12" style="width:206%;">										
											<table style="border:1px solid;" class="table table-striped table-bordered table-hover">
												<thead >
													<tr style="pading:10px;">
														<th>Supplier</th> 
														<th>Product</th>
														<th>Brand Name</th>
														<th>Price</th>
														<!-- <th>Size/Grade</th>
														 <th>Edit</th> -->
														<th>View</th>
														<th>Delete</th>
													</tr>
												</thead>
												<tbody>
											<?php
											$refinesubminicatproduct1 = "SELECT distinct fld_level3name,fld_tablename FROM tbl_level3 where fld_delstatus=0";
											$refinesubminicatproduct11 = mysql_query($refinesubminicatproduct1);
											while($row=mysql_fetch_array($refinesubminicatproduct11,MYSQL_ASSOC))
											{
											//$rprodsubminicatid= $row['fld_level3id'];
											$rprodsubminicatname = $row['fld_level3name'];	
											$rprodsubminicatname1 = strtolower($rprodsubminicatname);
											$Caprprodsubminicatname1 = ucwords($rprodsubminicatname1);
											$tblname = $row['fld_tablename'];											
											?>   
											<?php
											if($tblname!=NULL)
											{
											?>
											<?php
											$prodcountqry = "SELECT distinct p.fld_prodid, p.fld_brandname, p.fld_price, p.fld_brandid, q.fld_nbrandid, q.fld_nsuppliername FROM $tblname p JOIN tbl_newproducts q ON p.fld_brandid=q.fld_nbrandid WHERE p.fld_delstatus=9 group by p.fld_prodid"; 
											$prodcountqryy1 = mysql_query($prodcountqry) or die(mysql_error());
											$viewcountprd = mysql_num_rows($prodcountqryy1);										
											
											/* $new_prod = "SELECT p.fld_nsupplierid, s.fld_fname FROM tbl_newproducts p 
											JOIN tbl_supplierregister s ON s.fld_sid = p.fld_nsupplierid 
											WHERE s.fld_sid = p.fld_nsupplierid";
											$new_query = mysql_query($new_prod);
											while($newprod_fetch = mysql_fetch_array($new_query,MYSQL_ASSOC))
											{
											$supply_name = $newprod_fetch['fld_fname'];		*/									
											?>
											<?php
											if($viewcountprd >0)
											{
											?>
											<?php
											while($rows = mysql_fetch_array($prodcountqryy1))
											{
											$supply_name = $rows['fld_nsuppliername'];
											$prodid = $rows['fld_prodid'];
											$brand = $rows['fld_brandname'];
											$brandid = $rows['fld_brandid'];
											$price = $rows['fld_price'];
											//$size = $rows['fld_size'];
											?>
													<tr>
														<td><?php echo $supply_name; ?></td>
														<td><?php echo $rprodsubminicatname; ?></td>
														<td><?php echo $brand; ?></td>
														<td><?php echo $price; ?></td>
														<!-- <td><?php echo $size; ?></td> -->
														<input type="hidden" id="tblname" name="tblname" value="<?php echo $tblname; ?>">
														<!-- <td align="center"><input type="button" id="btnedit" onclick="fn_editumcat('<?php echo $prodid;?>')" value="Edit"/></td> -->
														<!--<td align="center"><input type="button" id="btnedit" onclick="fn_updcat('<?php echo $prodid, $tblname; ?>')" value="View"/></td>-->
														<td align="center"><a class="btn btn-inverse" href="approveproducts.php?tablename=<?php echo $tblname ?>&prodid=<?php echo $prodid?>&brandid=<?php echo $brandid; ?>">View</a></td>
														<td align="center">
														<input class="btn btn-inverse" type="button" id="btnedit" onclick="fn_deleteprodsss('<?php echo $prodid, $tblname; ?>')" value="Delete"/>
														</td>
													</tr>
											<?php
											// }
											 }
											?>
											<?php
											}
											?>
											<?php
											}
											?>
											<?php
											}
											?>
													<?php /*
														
														$query = "SELECT * FROM tbl_level3 WHERE fld_delstatus=0";
														$queryyy1 = mysql_query($query);
														while ($rows = mysql_fetch_array($queryyy1))
														{														
														$subminicat = $rows['fld_level3name'];
														$table = $rows['fld_tablename'];
													?>
													<?php														
														$query1 = "SELECT * FROM $table WHERE fld_delstatus=9";
														$query11 = mysql_query($query1);
														echo $viewcountprd = mysql_num_rows($query11);
														while($rows = mysql_fetch_array($query11))
														{
														$brandname = $rows['fld_brandname'];
														//$prodname = $row[s'fld_prodname'];
														$prodprice = $rows['fld_price'];
														//$prodsize = $rows['fld_size'];														
														?>
														<?php
														if($viewcountprd >1)
														{
														?>
													<tr>
														<td><?php echo "A.H. Dhruva & Co"; ?></td>
														<td><?php echo $subminicat; ?></td>
														<td><?php echo $brandname; ?></td>
														<td><?php echo $prodprice; ?></td>														
													</tr>
													<?php
													}
													?>
													<?php														
														}
													?>
													<?php
														}
														*/
													?>
												</tbody>
												</table>
												<!-- <label>Category Name<span class="f_req">*</span></label>											
											<select id="categoriesSelect" name="categoriesSelect" class="span8">
												<option value="0">Select</option>
												<?php												
												$catiqry = "SELECT distinct fld_level1id,fld_level1name FROM tbl_level1 where fld_delstatus in(0, 1)";
												$catiqry1 = mysql_query($catiqry);
												
													while($row=mysql_fetch_array($catiqry1,MYSQL_ASSOC))
													{
													$catid = $row['fld_level1id'];
													$catname = $row['fld_level1name'];																		
													?>
													
													<option value="<?php echo $catid;?>"><?php echo $catname; ?></option>
													<?php                                          
													}
												?>   
											</select> 
											<div id="divmsg" style="margin-left: 70%; margin-top: -35px;"><img src="details_open.png"/></div> -->
										</div>
									</div>
									<!-- <div class="row-fluid">
										<div class="span12">
											<label>Sub Category Name<span class="f_req" >*</span></label>											
											<select id="subcatSelect" name="subcatSelect" class="span8">												
											<option value="0">Select</option>
											</select>
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<label>Sub Mini Category Name<span class="f_req">*</span></label>											
											<select id='subminicatSelect' name="subminicatSelect" class="span8">
												<option value="0">Select</option>
											</select>												
										</div>
									</div>
									<div class="row-fluid">
										<div class="span12">
											<label>Brand Name<span class="f_req">*</span></label>										
											<select id='brandSelect' name="brandSelect" class="span8">
												<option value="0">Select</option>
											</select>												
										</div>
									</div>									
									<div class="row-fluid">
										<div class="span12">											
											<label>Product Name<span class="f_req">*</span></label>
											<textarea name="prodname" id="prodname" cols="10" rows="2" class="span8"></textarea>										
										</div>
									</div>		
										<div class="row-fluid">
											<div class="span12">
											<form id="formimage" name="formimage" method="post">
  												<label>Product Image<span class="f_req"></span></label>
												<div class="controls">
												<div data-provides="fileupload" class="fileupload fileupload-new">
												<!-- <input type="text" id="supplier" name="supplier" value="<?php echo $uname; ?>"/>
												<input type="text" id="txttblname1" name="txttblname1"/> 
												<div style="width: 80px; height: 80px;" class="fileupload-new thumbnail"><img src="http://www.placehold.it/80x80/EFEFEF/AAAAAA" alt="" /></div>
												<div style="width: 80px; height: 80px; line-height: 80px;" class="fileupload-preview fileupload-exists thumbnail"></div>
												<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" id="fileinput" name="fileinput" /></span>
												<a data-dismiss="fileupload" class="btn fileupload-exists" href="#">Remove</a>
											</div> 
										</div>									
											</form>
											   </div>
										</div>
								<div class="form-actions">
									<input class="btn btn-inverse" type="button" id="btnsavesuppprod" name="btnsavesuppprod" value="Save Changes">
									<!--<input type="submit" value="Submit" class="btnSubmit" /> 
									<!--<input id="button" type="submit" value="Upload"> 
									<button class="btn">Cancel</button>
								</div>										
								</div>
								<div class="span1">
								</div>
								<div id="prodspecs" style="float:right" class="span6">
								</div>
							</form> -->
                        </div>
                    </div>                   
                </div>
            </div>            
			<?php
			 @include("leftpanel.php");
			 ?>
      <script type="text/javascript">
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

</script>
<script type="text/javascript">
	$(document).ready(function() {
	$("#brandSelect").change(function(){		
		var brandid = $(this).val();
		var subminicatid = $("#subminicatSelect").val();			
		var subcatid = $("#subcatSelect").val();
		var catid = $("#categoriesSelect").val();	
		$.ajax({
		type: "POST",
		url: "productspecs.php?op=productspecs&subcatid="+subcatid+"&catid="+catid+"&subminicatid="+subminicatid+"&brandid="+brandid,
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
		var fuploads = $("#fileinput").val();
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
        $.ajax({				
				type:"POST",                                                	  				
				url	:"supplier_inner.php?subminicategory="+subminicategory+"&brand="+brand+"&productname="+productname+"&prodimage="+fuploads,
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
				}	
			 });
					
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
   
	<script type="text/javascript" src="js/jquery.form.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	
<script>
function fn_error()
{
	alert('Size is too large. Choose another one');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="aadmin.php";

}
function fn_errorimgaa()
{
	alert('Invalid Image Extension');
	document.getElementById('divmsgbox').innerHTML='';
	window.location="aadmin.php";
	
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

<script>

	function fn_deleteprodsss(prdid,tblname)
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


<!--<script type="text/javascript" >   
    function fn_updcat(prdid,tblname)
    {
		//alert(prdid,tblname);
		//var tblname=document.getElementById("tblname").value;
		//alert(tblname);		
	var url="approve_product.php";
    url=url+"?approdid="+prdid+"&op=updcat"	
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
    var res1 = res.split("~");
    var	usrdash='';
    if(res1[0]=="Successful")
    {
    alert("Product Approved");
    location.href= "new_products.php";
    }
    else
    {
    alert("Product Approval Failed");
    usrdash = "new_products.php";
    location.href="new_products.php";
    }
    }
    } 
	
	function fn_delcat(prdid,tblname)
    {
		//alert(prdid,tblname);
		//var tblname=document.getElementById("tblname").value;
		//alert(tblname);
		
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
    alert("Product Deleted");
    location.href= "new_products.php";
    }
    else
    {
    alert("Product Delete Failed");
    usrdash = "new_products.php";
    location.href="new_products.php";
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
	
    </script>-->



</div>

    </body>
</html>