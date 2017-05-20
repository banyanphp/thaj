<?php
error_reporting(E_ALL ^ E_NOTICE);
include('config.php');
include('common.php');
include('user_sessioncheck.php');
$uname = $_SESSION['uname'];
$email = $_SESSION['email'];
$username = $_REQUEST['username'];
$catid  = $_REQUEST['category'];
$_SESSION["catid"] = $catid;
//$subcatid = $_REQUEST['subcategory'];
//$_SESSION["subcatid"] = $subcatid;
//$brndid = $_REQUEST['brand'];
//$_SESSION["brandid"] = $brndid;
$pdfuserid = $_REQUEST['mail'];
$_SESSION['matrixmailid'] = $_REQUEST['mail'];
?>
<?php
echo $counter = mysql_query("SELECT COUNT(*) AS id FROM tbl_postrequirement pst
						Join tbl_supplierregister supplier on pst.fld_category = supplier.fld_level1name						
						and pst.fld_city = supplier.fld_city where supplier.fld_category = $catid and supplier.fld_fname like '%$uname%' Group by pst.fld_postid");
$num = mysql_fetch_array($counter);
$count = $num["id"];
?>
<?php /*?><?php echo $userid; ?><?php */?>
<title>Matrix Format Results</title>

        
		<script src="//code.jquery.com/jquery-1.10.2.js"></script> 
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script> 
        <script type="text/javascript"> 		
	
		   $(document).ready(function() {
			   
			$('#chktable').delegate(':checkbox', 'change', function() {
			$(this).closest('td').find('input:text').attr('disabled', !this.checked);
			});
			$(':checkbox').change();
			});			
			$(document).ready(function(){
			  $('#btngenpdf').click( function(){	
			  if(confirm("Are You Sure to Generate PDF ?"))
			  {
			   //alert("Hello");
			   window.location ="tamil.php";
			  }
			   });
			});
			
		<!--	Pass checked checkbox and textbox values through URL Start-->
		
		$(document).ready(function()
			{	
			$("input[id*=txtprodqty]").attr("disabled", true);					
			$("td input[id*='txtprodqty']").focusout(function(){				
			var chkId = '';
			var textVal ='';
			var textVals='';
			$("input[type='checkbox']:checked").each(function() {  				       																	
				chkId += $(this).val();													
				});						
				$("input[id*='txtprodqty']").each(function() {
				textVal = $(this).val().length > 0;
				if(textVal== true)
				{
					textVals += $(this).val();							
				}	
			 
			});
			var chkId = chkId+'!'+textVals;
			alert(chkId);
			
			$.ajax({
			type: "POST",           
			url: "matrix_insert.php?op=insert&chkIdds="+chkId, //change your post location URL				
			dataType: "html",			
			beforeSend: function() {
				//alert(chkId);
			//alert("Before Send");
			},
				success: function(data) {	
				alert("Added Succuessfully");
				location.reload();

			$("#flash").hide();
			//window.location="matrix.php?username=$username&category=$catid&brand=$brndid&product=$prodid";											
			}
		}); 				               
	});			
	
});			
	<!--	Pass checked checkbox and textbox values through URL End-->
	
	 function isNumberKey(evt)
		 {
		var charCode = (evt.which) ? evt.which : event.keyCode
		
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		return false;
		
		return true;
		}								
		 
	 function fn_editcart(cartid)
		 {
			var url="editcart.php";
			url=url+"?cartid="+cartid+"&op=edit"			
			xmlhttp1_editcart=GetXmlHttpObject_show();
			if (xmlhttp1_editcart==null)
			{
			alert ("Your browser does not support XMLHTTP!");
			return;
			}
			xmlhttp1_editcart.onreadystatechange=showcartedit;
			try
			{
			xmlhttp1_editcart.open("GET",url,true)
			}
			catch(e1)
			{
			document.write("error1")
			}
			xmlhttp1_editcart.send()
    	}			
			
	 function showcartedit()
   		 {
		 if (xmlhttp1_editcart.readyState==4 || xmlhttp1_editcart.readyState=="complete")
			{		
				var res=xmlhttp1_editcart.responseText;    
				var res1 = xmlhttp1_editcart.responseText.split("~");	
				document.getElementById("divupdate").innerHTML=res1[0];
				document.getElementById("divupdate").style.display="block";	
			}
         }
		
	 function fn_updatecart()
		{
			var uptxtprodqty = document.getElementById("txteditprodqty").value;    
			if(uptxtprodqty == "" || uptxtprodqty == 0){
			alert("Enter the Product Quantity");
			$("uptxtprodqty").focus();
			return false;
		}
    var hidcartid = document.getElementById("hidcartid").value;
    var url="editcart.php";
    url=url+"?uptxtprodqty="+uptxtprodqty+"&hidcartid="+hidcartid+"&op=update"
    xmlhttp1_updcart=GetXmlHttpObject_show();
    if (xmlhttp1_updcart==null)
    {
    alert ("Your browser does not support XMLHTTP!");
    return;
    }
    xmlhttp1_updcart.onreadystatechange=showupdcart;
    try
    {
    xmlhttp1_updcart.open("GET",url,true)
    }
    catch(e1)
    {
    document.write("error1")
    }
    xmlhttp1_updcart.send()
    }
	
	 function showupdcart()
		{			
		if (xmlhttp1_updcart.readyState==4 || xmlhttp1_updcart.readyState=="complete")
		{
		var res=xmlhttp1_updcart.responseText.trim();
		var res1 = res.split("~");
		var	usrdash='';
		if(res1[0]=="Successful")
		{
		alert("Product Quantity is Updated Successfully");
		location.reload();
		}
		else
		{
		alert("Product Quantity is Updated Successfullly");
		usrdash = "matrix.php";
		location.reload();
		}
		}
		}    
		
	/*function fn_deletecart(cartid)
    {
    if(confirm("Are you sure to delete this category name"))
    {  
    var url="delete.php";
    url=url+"?delcart="+cartid+"&op=delete"
   // alert(url);
    }
    else
    {
    return false;
    }
    xmlhttp1_delumcat=GetXmlHttpObject_show();
    if (xmlhttp1_delumcat==null)
    {
    alert ("Your browser does not support XMLHTTP!");
    return;
    }
    xmlhttp1_delumcat.onreadystatechange=showdelumcat;
    try
    {
    xmlhttp1_delumcat.open("GET",url,true)
    }
    catch(e1)
    {
    document.write("error1")
    }
    xmlhttp1_delumcat.send()
    }
    function showdelumcat()
    {
    if (xmlhttp1_delumcat.readyState==4 || xmlhttp1_delumcat.readyState=="complete")
    {
    //alert(xmlhttp1_delumcat.responseText);
    var res=xmlhttp1_delumcat.responseText.trim();
    var res1 = res.split("~");
    var	usrdash='';
    if(res1[0]=="Successful")
    {
    alert("Category name is deleted successfully");
    location.reload();
    
    }
    else
    {
    alert("Category name is not deleted successfully");
      location.reload();
    }    
    }
    }	*/
	 
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


<!--delete function start--> 

<script type="text/javascript">
	$(function() 
	{	
	$(".delbutton").click(function(){
	
	var element = $(this);
	var del_id = element.attr("id");
	var info = 'id=' + del_id;
	 if(confirm("Are you sure delete this Item?"))
			  {
	 $.ajax({
	   type: "Post",
	   url: "delete.php",
	   data: info,
	   success: function(){   
	   alert("Deleted Successfully");	   
	   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

			  }

return false;

});});
</script>
 
<!--delete function end--> 

<!--Auto Complete Search function start-->

<script>
$(function() {
var availableTags = [
<?php

			$catqruyy= mysql_query("Select distinct category.fld_level0id,category.fld_level0,category.fld_tablename 
                                   from tbl_categoriess category 
                                   where category.fld_level1id in('$catid')");  	
			 while($row1=mysql_fetch_array($catqruyy))
			 {	
				 $cid=$row1['fld_level0id']; 		  
				 $cname = $row1['fld_level0'];
				 $ctablenamee = $row1['fld_tablename'];					 
		
					$sqll=mysql_query("Select distinct subcategory.fld_level2,subcategory.fld_level2id from $ctablenamee subcategory 
					join tbl_supplierregister supplier on subcategory.fld_brandid = supplier.fld_brand 
					where subcategory.fld_level0id in($catid)");
					
					while($sqlqry = mysql_fetch_array($sqll, MYSQL_ASSOC ))
						{
						$name = $sqlqry['fld_level2'];
						$colon = "\"";
						$comma = ",";
						echo $colon.$name.$colon.$comma;
						}	
		   }
?>					 
];
$("#tags").autocomplete({
source: availableTags
});});
</script> 



<!--Auto Complete Search function end-->

<script type="text/javascript">

function howUser(str2)
{
	if (str2=="")
		{
		alert ("Enter Search Value");		
		return false;
		}
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
		//alert("success");
		document.getElementById("full").innerHTML=xmlhttp.responseText;
		}
    }
	xmlhttp.open("GET","searchinner.php?name="+str2+"&catid="+<?php echo $catid; ?>+"&op=search",true);
	xmlhttp.send();
}
</script>
<body>
<div id="loading_layer" style="display:none"><img src="img/ajax_loader.gif" alt="" /></div>                
        <div id="maincontainer">
            <!-- header -->
           
		   <?php 
			include("header.php");
			?>           
            
             <div id="contentwrapper">
                <div class="main_content">
                    <nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                <a href="mailbox.php" title="Back"><i class="splashy-mail_light_left"></i></a>
                                    <!--<a href="dashboard.php"><i class="icon-home"></i></a>-->
                                </li>
                               
                            </ul>
                        </div>
                        
                    </nav>
                    
                     
  <form id="form1" name="form1" method="post">
            <div class="ui-widget">
            <input type="text" name="searchtxnid" id="tags" placeholder="Search for a Product" style="height:30px;Margin-bottom:-2px;margin-left:163px"/>
            <input type="button" id="viewall" value="Search" class="btn btn-success" onClick="howUser(searchtxnid.value)" />
 
   <div class="clearfix"></div>
   <br/>

  <div id="full" style="display:block;width:100%;">
  

					<?php	
						$level2iddds = array();
						$resltsubcat = mysql_query("Select distinct fld_level2id from tbl_level2 lvl2						
						where lvl2.fld_level1id in($catid)");  			 
						
						while($rowsubcat = mysql_fetch_array($resltsubcat))
						{					
							 $level2iddds[]= $rowsubcat['fld_level2id'];					
						}								
						?>
						<?php
							foreach(array_unique($level2iddds) as $levl2ids)
							{
							$levl2idss .= $levl2ids.',';
							} 
							$lvl2idss = rtrim($levl2idss,',');            
						?>  
						<?php
						$reslttable = mysql_query("Select distinct fld_tablename from tbl_level3 lvl3						
						where lvl3.fld_level2id in($lvl2idss) order by fld_tablename ASC");  			 
						
						$ctablename= array();
						
						while($rowsubcat = mysql_fetch_array($reslttable))
						{					
							$ctablename[]= $rowsubcat['fld_tablename'];					
						}
						?>
						<?php
							foreach(array_unique($ctablename) as $ctablenames)
							{
							$ctablenamess .= $ctablenames.',';
							} 
							 $ctablenamesss = rtrim($ctablenamess,',');
						
							$tblcount = count(explode(",",$ctablenamesss));
							$tblnam = explode(",",$ctablenamesss);
							//$tblnam[0];
				
					$exe[100] = "select distinct brnd.fld_prodid,brnd.fld_prodname,brnd.fld_brandid,brnd.fld_brandname from $tblnam[0] brnd join tbl_supplierregister supplier on brnd.fld_brandid = supplier.fld_brand where supplier.fld_fname like '%$uname%'";		

				for($i=0;$i<$tblcount;$i++)
				{
					$j = $i+1;
					if($j==$tblcount)
					{
				
					}else
					{
					 $exe[$j] = "select distinct brnd.fld_prodid,brnd.fld_prodname,brnd.fld_brandid,brnd.fld_brandname from $tblnam[$j] 	brnd join tbl_supplierregister supplier on brnd.fld_brandid = supplier.fld_brand 
						where supplier.fld_fname like '%$uname%'";
					}
					if($tblcount==1 and $i == 0)
					{
						$exe[$i] = "select dictinct brnd.fld_prodid,brnd.fld_prodname,brnd.fld_brandid,brnd.fld_brandname from $tblnam[$i] brnd join tbl_supplierregister supplier on brnd.fld_brandid = supplier.fld_brand 
										 where supplier.fld_fname like '%$uname%'";
						$final = $exe[$i];
					}else
					{
						if($j!=$tblcount)
						{
							$exe[100] = $exe[100]." "."union"." ".$exe[$j];
											
						}else
						{
				
						}
					}
				}
				
				//echo "<pre>";
				$final = $exe[100];
				//echo "</pre>";
				$brdnqry1 = mysql_query($final);				
				
						
						$brand = array();
						$products = array();

						while($rowbrnd = mysql_fetch_array($brdnqry1))
						{					
							$brand[]= $rowbrnd['fld_brandname'];
							$products[]= $rowbrnd['fld_prodname'];
						}
						?>			
						<?php 
							foreach(array_unique($brand) as $brands)
							{
							$brandss .= $brands.',';
							} 
							$brandsss = rtrim($brandss,',');
							
							$brandsss_array = explode(",", $brandsss);
							//echo $result = count($brandsss_array);
							
						?>  
						
						<?php
							 
							foreach(array_unique($products) as $productss)
							{
							$productsss .= $productss.',';
							} 
							$producttss = rtrim($productsss,',');            
							//$producttss_array = explode(",", $producttss);
						?>						
					
						<?php
						echo '<table cellpadding="6" cellspacing="6" border="1" rules="all" align="center" id="chktable">';
						$countproducts = count($producttss_array);
						$countbrnd = count($brandsss_array);
					  
						echo "<tr><td>Product/Brand</td>";
					
						foreach(array_unique($brand) as $key1=>$value1)
						{
							 echo "<td style='width:100px;'>" .$value1. "</td>"; 
						}
						echo '</tr>';
						//print_r($brand);
						foreach(array_unique($products) as $key2=>$value2)
						{
						
						$stringtocheck = $value2;

						$forbiddenword = $value1;
						
						echo "<tr><td> $value2 </td>";	
						
							for($i=0; $i<$countbrnd;$i++)
							{						
					echo '<td><input type="checkbox" class="test" id="chkprodid[]'.''.$i.'-'.$key2.'" class="test" name="chktextprod[]'.''.$i.'-'.$key.'" value="'.($brandsss_array[$i]).'!'.($value2).'">
						<input type="text" id="txtprodqty" class="test" name="chktextprod[]'.''.$i.'-'.$key.'" onKeyPress="return isNumberKey(event);" style="width:50px;height:25px;Margin-bottom:-2px;"/></td>';
				
							} 	
						
						}
						
						echo '</tr>';
						echo '</table>';					
	?> 
  </div>
  			
   </div>
 	<td>&nbsp;</td>
 	<td>&nbsp;</td>
    <td>&nbsp;</td>
      
  <div id="divupdate" style="display:block;margin-top:25px">
  
  <?php
  						$pdfid = "trxn".'_'.$pdfuserid;
						$chkvalue = "Select count(*) FROM $pdfid"; 
						if($chkvalue >'0')
						{	?>
  
                                <table class="table table-bordered" style="width:100%;" id="tblmatrixresult">
                                <thead>
                                <tr>
                                <th>Brand Name</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                <?php
                                
                                $select = "SELECT * FROM $pdfid";
                                $export = mysql_query($select) or die("Cart is Empty");
                                
                                // $result = mysql_query("SELECT * FROM tbl_insertdata");
                                while($row = mysql_fetch_array($export))
                                {
								$unitprce = $row['fld_unitprice'];
								$quantity = $row['fld_prodqty'];
								$totalprce = $unitprce * $quantity;
									
					
                             echo '<tr class="record">';
                             echo '<td style="width:25%"><div align="left">'.$row['fld_brand'].'</td>';
                             echo '<td style="width:30%"><div align="left">'.$row['fld_product'].'</div></td>';
                             echo '<td style="width:13%"><input type="text" name="hidprodqty'.$id.'" readonly id="hidprodqty" value="'.$row['fld_prodqty'].'" style="width:50px;height:25px;Margin-bottom:-2px;border-style:none;background:white">
							 <!--<img src="up_arrow.png" id="up" style="cursor:pointer"/>
							 <img src="down_arrow.png" id="down" style="cursor:pointer"/>-->
							 </td>';
							 echo '<td style="width:2%"><div align="left">'."<input type='text' id='txtunitprice' class='txtunitpricee' name='".$row['fld_id'].'-'.$row['fld_prodqty']."' value='".$row['fld_unitprice']."' onKeyPress='return isNumberKey(event);' style='width:100px;height:25px;Margin-bottom:-2px;background:white;border-top:1px solid #ddd'/>".'</td>';
								//echo '<td style="width:10%"><div align="left">'."".'</div></td>';
							 echo '<td><input type="text" name="hidtotlprice'.$id.'" readonly id=""hidtotlprice'.$id.'"" value="'.$totalprce.'" style="width:100px;height:25px;Margin-bottom:-2px;border-style:none;background:white;border-top:1px solid #ddd" readonly></td>';
                             echo'<td align="center" style="width:2%"><img src="edit.png" onclick="fn_editcart('.$row['fld_id'].')" alt="edit" style="cursor:pointer" /></td>';	
            echo '<td style="width:8%"><div align="center"><a href="#" id="'.$row['fld_id'].'" class="delbutton" title="Click To Delete"><img src="delete.png" disabled/></a></div></td>';
								//echo '<td><input type="hidden" class="txtunitpricee" name="hidprodqty" readonly="readonly" id="hidprodqty" value="'.$row['fld_prodqty'].'"></td>';
														
                                echo '</tr>';
								
                                }
                                
                                ?>
                                </tr>
                                
                                </tbody>
                                </table>     
                                    <?php
						}										
										?>
                                       
                                         <input type="button" name="btngenpdf" id="btngenpdf" value="PDF">
                                       
  </div>  
  
  </form>    

</div>
</div>
  </div>
  
                  
            <div class="sidebar">
                
                <div class="antiScroll">
                    <div class="antiscroll-inner">
                        <div class="antiscroll-content">
                    
                            <div class="sidebar_inner">
                                
                                <div id="side_accordion" class="accordion">
                                 
                                 <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-cog"></i> Mailbox
                                            </a>
                                        </div>
                                        
                                            
                                                <ul class="nav nav-list" style="padding-left:30px;">
                                                   <!-- <li><a href="#mbox_new" id="mbox_new1" data-toggle="tab">Compose Mail</a></li>
                                                    <li><a href="#mbox_inbox"id="mbox_inbox1" data-toggle="tab">Inbox</a></li>
                                                    <li><a href="#mbox_outbox" id="mbox_outbox1" data-toggle="tab">Outbox</a></li>
                                                    <li><a href="#mbox_trash" id="mbox_trash1" data-toggle="tab">Trash</a></li><br>-->
													
                                                    <li><a id="tab1" href="mailbox.php?id=1">Compose Mail</a></li>
													<li><a id="tab2" href="mailbox.php?id=2">Inbox</a></li>
                                                    <li><a id="tab3" href="mailbox.php?id=3">Outbox</a></li>
                                                    <!--<li><a id="tab4" href="mailbox.php?id=4">Trash</a></li>-->

                                                </ul>
                                           
                                    </div>
                                    
                                 
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
                                                <i class="icon-th"></i> Dashboard
                                            </a>
                                        </div>
                                        <div class="accordion-body collapse" id="collapseTwo">
                                            <div class="accordion-inner">
                                                <ul class="nav nav-list">
                                                    <li><a href="dashboard.php">Dashboard</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                 <!--   <div class="accordion-group">
                                       <div class="accordion-heading">
                                          <i class="icon-th"></i> Mailbox
                                    <div class="accordion-group">
                                    
                                      <ul class="nav nav-list">
                                                    <li><a href="#mbox_new" data-toggle="tab">Compose Mail</a></li>
                                                    <li><a href="#mbox_inbox" data-toggle="tab">Inbox</a></li>
                                                    <li><a href="#mbox_outbox" data-toggle="tab">Outbox</a></li>
                                                    <li><a href="#mbox_trash" data-toggle="tab">Trash</a></li>
                                                </ul>
                                    </div>
                                    
                                    </div>
                                    </div>-->
                                    
                                </div>
                                
                                <div class="push"></div>
                            </div>
                               
                             
                        
                        </div>
                    </div>
                </div>
            
            </div>



            <script type="text/javascript" src="jquery/jquery.js"></script>
            <script type="text/javascript" src="jquery/jquery.form.js"></script>          
            
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery-migrate.min.js"></script>
            <!-- smart resize event -->
            <script src="js/jquery.debouncedresize.min.js"></script>
            <!-- hidden elements width/height -->
            <script src="js/jquery.actual.min.js"></script>
            <!-- js cookie plugin -->
            <script src="js/jquery_cookie.min.js"></script>
            <!-- main bootstrap js -->
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <!-- bootstrap plugins -->
            <script src="js/bootstrap.plugins.min.js"></script>
            <!-- tooltips -->
            <script src="lib/qtip2/jquery.qtip.min.js"></script>
            <!-- jBreadcrumbs -->
            <script src="lib/jBreadcrumbs/js/jquery.jBreadCrumb.1.1.min.js"></script>
            <!-- fix for ios orientation change -->
            <script src="js/ios-orientationchange-fix.js"></script>
            <!-- scroll -->
            <script src="lib/antiscroll/antiscroll.js"></script>
            <script src="lib/antiscroll/jquery-mousewheel.js"></script>
            <!-- mobile nav -->
            <script src="js/selectNav.js"></script>
            <!-- sticky messages -->
            <script src="lib/sticky/sticky.min.js"></script>
            <!-- common functions -->
            <script src="js/gebo_common.js"></script>
            
            <script src="lib/jquery-ui/jquery-ui-1.10.0.custom.min.js"></script>
            <!-- touch events for jquery ui-->
            <script src="js/forms/jquery.ui.touch-punch.min.js"></script>
            <!-- colorbox -->
            <script src="lib/colorbox/jquery.colorbox.min.js"></script>
            <!-- datatable (inbox,outbox) -->
            <script src="lib/datatables/jquery.dataTables.min.js"></script>
            <!-- additional sorting for datatables -->
            <script src="lib/datatables/jquery.dataTables.sorting.js"></script>
            <!-- datatables bootstrap integration -->
            <script src="lib/datatables/jquery.dataTables.bootstrap.min.js"></script>
            <!-- plupload and all it's runtimes and the jQuery queue widget (attachments) -->
            <script type="text/javascript" src="lib/plupload/js/plupload.full.js"></script>
            <script type="text/javascript" src="lib/plupload/js/jquery.plupload.queue/jquery.plupload.queue.full.js"></script>
            <!-- autosize textareas (new message) -->
            <script src="js/forms/jquery.autosize.min.js"></script>
            <!-- tag handler (recipients) -->
            <script src="lib/tag_handler/jquery.taghandler.min.js"></script>
            <!-- mailbox functions -->
            <script src="js/gebo_mailbox.js"></script>
            
            <script>
            $(document).ready(function() {
            //* show all elements & remove preloader
            setTimeout('$("html").removeClass("js")',1000);
            });
            </script>
  
  <script>
  	$(document).ready(function()
			{			
				$('.txtunitpricee').blur(function()
				{			
				var unitpricee = $(this).val();
				//alert(unitpricee);
				var prodqty = $(this).attr("name");
				//alert(prodqty);
				
				var totalpricee = unitpricee+'-'+prodqty;
				//alert(totalpricee);
			
				$.ajax({
				type: "POST",           
				url: "matrix_insert.php?op=insertprice&totalpriceeee="+totalpricee, //change your post location URL				
				dataType: "html",			
				beforeSend: function() {
					//alert(totalpricee);
				//alert("Before Send");
				},
				success: function(data) {	
				alert("Price Updated Succuessfully");
				location.reload();

				$("#flash").hide();
				//window.location="matrix.php?username=$username&category=$catid&brand=$brndid&product=$prodid";											
				}
			}); 
				});			
		
			});		
</script>
<script>
function isNumberKey(evt)
                {
                var charCode = (evt.which) ? evt.which : event.keyCode
                
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
                
                return true;
                }
                </script>
<script>
$(document).ready(function(){
    $("#up").on('click',function(){
	alert("up");
        $("#incdec input").val(parseInt($("#incdec input").val())+1);
    });

    $("#down").on('click',function(){
	alert("down");
        $("#incdec input").val(parseInt($("#incdec input").val())-1);
    });

});
</script>
</body>
