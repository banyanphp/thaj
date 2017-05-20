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
$subcatid = $_REQUEST['subcategory'];
$_SESSION["subcatid"] = $subcatid;
$brndid = $_REQUEST['brand'];
$_SESSION["brandid"] = $brndid;
$pdfuserid = $_REQUEST['mail'];
$_SESSION['matrixmailid'] = $_REQUEST['mail'];

?>
<?php
$counter = mysql_query("SELECT COUNT(*) AS id FROM tbl_postrequirement pst
						Join tbl_supplierregister user on pst.fld_category = user.fld_category
						and pst.fld_subcategory = user.fld_subcategory
						and pst.fld_brand = user.fld_brand
						and pst.fld_city = user.fld_city");
$num = mysql_fetch_array($counter);
$count = $num["id"];
?>
<?php /*?><?php echo $userid; ?><?php */?>
<title>Matrix Format Results</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
            <link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.min.css" />
        <!-- jQuery UI theme-->
            <link rel="stylesheet" href="lib/jquery-ui/css/Aristo/Aristo.css" />
        <!-- breadcrumbs-->
            <link rel="stylesheet" href="lib/jBreadcrumbs/css/BreadCrumb.css" />
        <!-- tooltips-->
            <link rel="stylesheet" href="lib/qtip2/jquery.qtip.min.css" />
        <!-- notifications -->
            <link rel="stylesheet" href="lib/sticky/sticky.css" />    
        <!-- splashy icons -->
            <link rel="stylesheet" href="img/splashy/splashy.css" />
        <!-- upload -->
            <link rel="stylesheet" href="lib/plupload/js/jquery.plupload.queue/css/plupload-gebo.css" />
        <!-- tag handler -->
            <link rel="stylesheet" href="lib/tag_handler/css/jquery.taghandler.css" />
        <!-- colorbox -->
            <link rel="stylesheet" href="lib/colorbox/colorbox.css" />
            
        <!-- gebo color theme-->
            <link rel="stylesheet" href="css/blue.css" id="link_theme" />
        <!-- main styles -->
            <link rel="stylesheet" href="css/style.css" />
            
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
    
    
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
          <!--  <script src="js/gebo_common.js"></script>-->
            
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
<!--            <script src="js/gebo_mailbox.js"></script>-->

            <link rel="shortcut icon" href="favicon.ico" />
        
		<script src="//code.jquery.com/jquery-1.10.2.js"></script> 
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
			$("input[type=text][id*=txtprodqty]").attr("disabled", true);					
			$("td input[type='text']").focusout(function(){				
			var chkId = '';
			var textVal ='';
			var textVals='';
			$("input[type='checkbox']:checked").each(function() {  				       																	
				chkId += $(this).val();													
				});						
				$("input[type='text']").each(function() {
				textVal = $(this).val().length > 0;
				if(textVal== true)
				{
					textVals += $(this).val();							
				}	
			 
			});
			var chkId = chkId+'-'+textVals;
			alert(chkId);
			
			$.ajax({
			type: "POST",           
			url: "matrix_insert.php?op=insert&chkId="+chkId, //change your post location URL				
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
                                   where category.fld_level0id in('$catid')");  	
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
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid">
                            <a class="brand" href="dashboard.php" style="width:500px"><i class="icon-home icon-white"></i> Build99 <?php echo $uname; ?></a>
                            <ul class="nav user_menu pull-right">
                              <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                   <a class="label ttip_b" href="mailbox.php" title="New messages"><i class="splashy-mail_light"></i> <?php echo $count;?></a>                                     </div>
                                </li>
                            
                               <?php
							   if($uname!="")							   
							   {
								   ?>
                                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $uname; ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                    <li><a href="user_profile.php">My Profile</a></li>                                
                                    <li class="divider"></li>
                                    <li><a href="login.php">Log Out</a></li>
                                    </ul>
                                </li>
                                <?php
							   }
							   ?>
                            </ul>                            
                        </div>
                    </div>
                </div>
                                
            </header>
            
            
            
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

  <div id="full" style="display:block;width:100%;float:left">
  

		<?php
        			$catqry= mysql_query("Select distinct category.fld_level0id,category.fld_level0,category.fld_tablename 
                                           from tbl_categoriess category 
                                           where category.fld_level0id in('$catid')");  	
                	 while($row=mysql_fetch_array($catqry))
                     {	
						$cid=$row['fld_level0id']; 		  
						$cname = $row['fld_level0'];
						$ctablename = $row['fld_tablename'];				
     	  
						$brand = array();						
						$resltbrnd = mysql_query("Select distinct brnd.fld_brandname from $ctablename brnd 
						join tbl_supplierregister supplier on brnd.fld_brandid = supplier.fld_brand 
						where brnd.fld_level0id in($catid)");  			 
						
						while($rowbrnd = mysql_fetch_array($resltbrnd))
						{					
							$brand[]= $rowbrnd['fld_brandname'];					
						}						
						
						$products = array();
						$sql=mysql_query("Select distinct subcategory.fld_level2,subcategory.fld_level2id from $ctablename subcategory 
						join tbl_supplierregister supplier on subcategory.fld_brandid = supplier.fld_brand 
						where subcategory.fld_level0id in($catid)");
						
						while($rowprod = mysql_fetch_array($sql))
						{					
							$products[]= $rowprod['fld_level2'];					
						}
				
					echo '<table cellpadding="6" cellspacing="6" border="1" rules="all" align="center" id="chktable">';
					  $countproducts = count($products);
					  $countbrnd = count($brand);
					  
					echo "<tr><td>Product/Brand</td>";
					
					foreach($brand as $key1=>$value1)
					{
						 echo "<td style='width:100px;'>" .$value1. "</td>"; 
					}
					echo '</tr>';
					
					foreach($products as $key=>$value2)
						{
							echo "<tr><td> $value2 </td>";		
							for($i=1; $i<=$countbrnd;$i++)
							{
	echo '<td><input type="checkbox" class="test" id="chkprodid[]'.''.$i.'-'.$key.'" class="test" name="chktextprod[]'.''.$i.'-'.$key.'" value="'.($value2).'-'.($value1).'">
	<input type="text" id="txtprodqty" class="test" name="chktextprod[]'.''.$i.'-'.$key.'" style="width:50px;height:25px;Margin-bottom:-2px;" maxlength="5"/></td>';'</tr>';
							} 		
						}

					echo '</table>';
	?> 
  </div>
  			<?php
			 }
			 ?>
   </div>
 	<td>&nbsp;</td>
 	<td>&nbsp;</td>
    <td>&nbsp;</td>
      
  <div id="divupdate" style="display:block;width:50%;margin-top:25px">
  
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
                                echo '<tr class="record">';
                                echo '<td><div align="left">'.$row['fld_brand'].'</td>';
                                echo '<td><div align="left">'.$row['fld_product'].'</div></td>';
                                echo '<td><div align="left">'.$row['fld_prodqty'].'</div></td>';
                                echo'<td align="center"><img src="edit.png" onclick="fn_editcart('.$row['fld_id'].')" alt="edit" style="cursor:pointer" /></td>';	
            echo '<td><div align="center"><a href="#" id="'.$row['fld_id'].'" class="delbutton" title="Click To Delete"><img src="delete.png" disabled/></a></div></td>';
																
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
</body>
